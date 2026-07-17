<?php

use App\Models\Country;
use App\Models\Industry;
use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public bool $showModal = false;

    public ?Job $selectedJob = null;

    public int $perPage = 6;

    public string $search = '';

    public string $country = '';

    public string $industry = '';

    public function updatedPerPage(): void
    {
        $this->resetPage();
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedCountry(): void
    {
        $this->resetPage();
    }

    public function updatedIndustry(): void
    {
        $this->resetPage();
    }

    public function resetFilters(): void
    {
        $this->reset(['search', 'country', 'industry']);
        $this->resetPage();
    }

    public function openModal(string $jobId): void
    {
        $this->selectedJob = Job::query()
            ->with(['countryData', 'jobBenefits.benefit'])
            ->find($jobId);

        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->selectedJob = null;
    }

    public function render(): \Illuminate\View\View
    {
        $query = Job::query()
            ->with('countryData')
            ->where(function ($subQuery) {
                $subQuery->whereNull('closing_date')
                    ->orWhereDate('closing_date', '>=', now());
            });

        if ($this->search !== '') {
            $query->where(function ($subQuery) {
                $subQuery->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('company', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->country !== '') {
            $query->where('country', $this->country);
        }

        if ($this->industry !== '') {
            $query->where('industry', $this->industry);
        }

        return view('livewire.⚡testing-modal', [
            'jobs' => $query->latest()->paginate($this->perPage),
            'countries' => Country::orderBy('name')->get(),
            'industries' => Industry::orderBy('name')->get(),
        ]);
    }
};
?>
<div>

{{-- Search Bar --}}
<div class="jb-search-bar">
    <div class="jb-container">
        <div class="jb-search-inner">
            <div class="jb-search-field">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search jobs, companies...">
            </div>
            <div class="jb-search-field">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                    <circle cx="12" cy="10" r="3" />
                </svg>
                <select wire:model.live="country">
                    <option value="">All Countries</option>
                    @foreach ($countries as $countryOption)
                        <option value="{{ $countryOption->name }}">{{ $countryOption->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="jb-search-field">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                </svg>
                <select wire:model.live="industry">
                    <option value="">All Categories</option>
                    @foreach ($industries as $industryOption)
                        <option value="{{ $industryOption->name }}">{{ $industryOption->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="jb-search-btn" wire:click="$refresh">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M7 12h10M10 18h4" />
                </svg>
                Filter
            </button>
        </div>
    </div>
</div>

<div class ="jb-listing-container">
    <div class="jb-listing">
        <div class="jb-container">
             <div class="jb-listing-header">
            <p class="jb-count"><span id="jb-count-num">{{ $jobs->total() }}</span> jobs found</p>
            <div class="jb-per-page-selector">
                <label for="perPage" class="jb-per-page-label">Show per page:</label>
                <select id="perPage" wire:model.live="perPage" class="jb-per-page-select">
                    <option value="6" @selected($perPage === 6)>06</option>
                    <option value="10" @selected($perPage === 10)>10</option>
                    <option value="20" @selected($perPage === 20)>20</option>
                    <option value="50" @selected($perPage === 50)>50</option>
                </select>
            </div>
        </div>
            <div class="jb-grid" id="jb-grid">
                @forelse ($jobs as $index => $job)
                <div class="jb-card">
                    <div class="jb-card-header">
                        <div class="jb-card-flag">
                            <img src="{{ $job->countryData?->flagimg ? asset($job->countryData->flagimg) : 'https://flagcdn.com/un.svg' }}" alt="{{ $job->country }} flag">
                        </div>
                        <div>
                            <h2 class="jb-card-title">{{ $job->title }}</h2>
                            <p class="jb-card-company">{{ $job->company }}</p>
                        </div>
                    </div>
                    <div class="jb-card-body">
                        <div class="jb-tags">
                            <span class="jb-tag jb-tag-blue">📍 {{ $job->location ?? 'Location' }}</span>
                            <span class="jb-tag jb-tag-purple">💰 {{ $job->currency }} @if ($job->salary_max){{ number_format($job->salary_min) }} - {{ number_format($job->salary_max) }}@else{{ number_format($job->salary_min) }}+@endif</span>
                            <span class="jb-tag {{ $job->type === 'Full-time' ? 'jb-tag-green' : ($job->type === 'Part-time' ? 'jb-tag-red' : 'jb-tag-yellow') }}">⏰ {{ $job->type }}</span>
                        </div>
                        <div class="jb-details">
                            <div class="jb-detail"><span>🌎</span>
                                <div><strong>Country:</strong> {{ $job->country }}</div>
                            </div>
                            <div class="jb-detail"><span>🛂</span>
                                <div><strong>Visa:</strong> {{ $job->visa_category }}</div>
                            </div>
                            <div class="jb-detail"><span>🎂</span>
                                <div><strong>Age:</strong> {{ $job->age_min ?? 'N/A' }}–{{ $job->age_max ?? 'N/A' }}</div>
                            </div>
                            <div class="jb-detail"><span>🚻</span>
                                <div><strong>Gender:</strong> {{ $job->gender ?? 'Any' }}</div>
                            </div>
                            <div class="jb-detail jb-detail-full"><span>💰</span>
                                <div><strong>Salary:</strong> {{ $job->currency }} @if ($job->salary_max){{ number_format($job->salary_min) }} – {{ number_format($job->salary_max) }}@else{{ number_format($job->salary_min) }}+@endif</div>
                            </div>
                        </div>
                    </div>
                    <div class="jb-card-actions">
                        <button
                        wire:click="openModal('{{ $job->id }}')"
                        wire:loading.attr="disabled"
                        class=" jb-btn-primary disabled:opacity-50 disabled:cursor-not-allowed relative"
                        >
                        <span wire:loading.remove wire:target="openModal('{{ $job->id }}')">View Job</span>
                        <span wire:loading wire:target="openModal('{{ $job->id }}')">Loading...</span>
                        </button>
                        <button class="jb-btn-outline" onclick="document.getElementById('jb-contact-modal-overlay').style.display='flex'">Contact to Apply</button>
                    </div>
                    <div class="jb-card-footer">
                        <span>Deadline {{ $job->closing_date?->format('M d, Y') ?? 'TBD' }}</span>
                        <span>{{ $job->vacancies ?? 1 }} {{ ($job->vacancies ?? 1) == 1 ? 'Vacancy' : 'Vacancies' }}</span>
                    </div>
                </div>
            
                @empty
                    <div class="rounded-lg border border-dashed border-gray-300 bg-white px-4 py-3 text-sm text-gray-600">
                        No jobs available.
                    </div>
                @endforelse
            </div>

            <div class="jb-pagination">
                {{ $jobs->links() }}
            </div>
            
            <div wire:loading wire:target="openModal" class="fixed inset-0 z-50 grid place-items-center bg-black/30 backdrop-blur-sm p-4" aria-live="polite" aria-busy="true">
                <div class="bg-white rounded-lg shadow-lg max-w-3xl w-auto p-5 max-h-[90vh] overflow-y-auto" style="overflow:auto; scrollbar-width:none; -ms-overflow-style:none;">
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-8 rounded bg-gray-200 animate-pulse"></div>
                            <div class="space-y-2">
                                <div class="h-7 bg-gray-200 rounded w-56 animate-pulse"></div>
                                <div class="h-4 bg-gray-200 rounded w-36 animate-pulse"></div>
                            </div>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-gray-200 animate-pulse"></div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-green-50 p-4 rounded-lg space-y-3">
                            <div class="h-8 bg-gray-200 rounded w-72 animate-pulse"></div>
                            <div class="h-4 bg-gray-200 rounded w-24 animate-pulse"></div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <div class="h-4 bg-gray-200 rounded w-20 animate-pulse"></div>
                                <div class="h-5 bg-gray-200 rounded w-32 animate-pulse"></div>
                            </div>
                            <div class="space-y-2">
                                <div class="h-4 bg-gray-200 rounded w-28 animate-pulse"></div>
                                <div class="h-5 bg-gray-200 rounded w-36 animate-pulse"></div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <div class="h-4 bg-gray-200 rounded w-28 animate-pulse"></div>
                                <div class="h-5 bg-gray-200 rounded w-40 animate-pulse"></div>
                            </div>
                            <div class="space-y-2">
                                <div class="h-4 bg-gray-200 rounded w-20 animate-pulse"></div>
                                <div class="h-5 bg-gray-200 rounded w-28 animate-pulse"></div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <div class="h-4 bg-gray-200 rounded w-32 animate-pulse"></div>
                                <div class="h-5 bg-gray-200 rounded w-36 animate-pulse"></div>
                            </div>
                            <div class="space-y-2">
                                <div class="h-4 bg-gray-200 rounded w-20 animate-pulse"></div>
                                <div class="h-5 bg-gray-200 rounded w-24 animate-pulse"></div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <div class="h-4 bg-gray-200 rounded w-24 animate-pulse"></div>
                                <div class="h-5 bg-gray-200 rounded w-32 animate-pulse"></div>
                            </div>
                            <div class="space-y-2">
                                <div class="h-4 bg-gray-200 rounded w-20 animate-pulse"></div>
                                <div class="h-5 bg-gray-200 rounded w-28 animate-pulse"></div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div class="h-4 bg-gray-200 rounded w-36 animate-pulse"></div>
                            <div class="space-y-2">
                                <div class="h-4 bg-gray-200 rounded w-full animate-pulse"></div>
                                <div class="h-4 bg-gray-200 rounded w-11/12 animate-pulse"></div>
                                <div class="h-4 bg-gray-200 rounded w-10/12 animate-pulse"></div>
                            </div>
                        </div>

                        <div class="mt-8 flex gap-3">
                            <div class="flex-1 h-12 bg-gray-200 rounded-lg animate-pulse"></div>
                            <div class="flex-1 h-12 bg-gray-200 rounded-lg animate-pulse"></div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($showModal && $selectedJob)
                <div
                    x-data="{ open: true }"
                    x-show="open"
                    x-cloak
                    @click.self="open = false; $wire.closeModal()"
                    class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center p-4 z-40"
                >
                    @if ($selectedJob)
                <div class="bg-white rounded-lg shadow-lg max-w-3xl w-auto p-5 max-h-[90vh] overflow-y-auto" style="overflow:auto; scrollbar-width:none; -ms-overflow-style:none;">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-3">
                                @if ($selectedJob->country && $selectedJob->countryData)
                                <img src="{{ asset($selectedJob->countryData->flagimg) }}" alt="{{ $selectedJob->country }} flag" style="width: 48px; height: 32px; border-radius: 4px; object-fit: cover;">
                                @endif
                                <div>
                                    <h2 class="text-3xl font-bold text-gray-900">{{ $selectedJob->title }}</h2>
                                    <p class="text-gray-600 mt-1">🏢 {{ $selectedJob->company }}</p>
                                </div>
                            </div>
                            <button
                                @click="open = false; $wire.closeModal()"
                                class="text-gray-500 hover:text-gray-700 text-3xl font-bold"
                            >
                                &times;
                            </button>
                        </div>

                        <div class="space-y-6">
                            <!-- Salary and Basic Info -->
                            <div class="bg-green-50 p-4 rounded-lg">
                                <p class="text-3xl font-bold text-green-600">
                                    💰 {{ $selectedJob->currency }} 
                                    @if ($selectedJob->salary_max)
                                        {{ number_format($selectedJob->salary_min) }} - {{ number_format($selectedJob->salary_max) }}
                                    @else
                                        {{ number_format($selectedJob->salary_min) }}+
                                    @endif
                                </p>
                                <p class="text-gray-600 mt-1">Salary</p>
                            </div>

                            <!-- Location and Visa -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 uppercase">📍 Country</p>
                                    <p class="text-lg text-gray-900">{{ $selectedJob->country }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 uppercase">🛂 Visa Category</p>
                                    <p class="text-lg text-gray-900">{{ $selectedJob->visa_category }}</p>
                                </div>
                            </div>

                            <!-- Job Details -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 uppercase">💼 Job Category</p>
                                    <p class="text-lg text-gray-900">{{ $selectedJob->industry }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 uppercase">⏰ Job Type</p>
                                    <p class="text-lg text-gray-900">{{ $selectedJob->type }}</p>
                                </div>
                            </div>

                            <!-- Employment Details -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 uppercase">🎓 Experience Required</p>
                                    <p class="text-lg text-gray-900">{{ $selectedJob->experience }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 uppercase">📅 Contract Period</p>
                                    <p class="text-lg text-gray-900">{{ $selectedJob->contract_period }}</p>
                                </div>
                            </div>

                            <!-- Work Benefits -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 uppercase">🕐 Work Schedule</p>
                                    <p class="text-lg text-gray-900">{{ $selectedJob->work_time }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 uppercase">🏖️ Holidays</p>
                                    <p class="text-lg text-gray-900">{{ $selectedJob->holidays }}</p>
                                </div>
                            </div>

                            <!-- Age Range and Gender -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 uppercase">🎂 Age Range</p>
                                    <p class="text-lg text-gray-900">{{ $selectedJob->age_min }} - {{ $selectedJob->age_max }} years</p>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 uppercase">🚻 Gender</p>
                                    <p class="text-lg text-gray-900">{{ $selectedJob->gender }}</p>
                                </div>
                            </div>

                        

                            <!-- Benefits -->
                            @if ($selectedJob->jobBenefits && $selectedJob->jobBenefits->isNotEmpty())
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 uppercase mb-2">🎁 Benefits</p>
                                    <ul class="space-y-2 text-gray-700">
                                        @foreach ($selectedJob->jobBenefits as $jobBenefit)
                                            @if ($jobBenefit->benefit)
                                                <li class="flex items-start gap-2">
                                                    <span class="text-green-600 font-bold">✓</span>
                                                    <span>{{ $jobBenefit->benefit->name }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <!-- Description -->
                            <div>
                                <p class="text-sm font-semibold text-gray-600 uppercase mb-2">📝 Job Description</p>
                                <p class="text-gray-700 leading-relaxed">{{ $selectedJob->description }}</p>
                            </div>
                            <!-- Requirements -->
                            @if ($selectedJob->requirements && count($selectedJob->requirements) > 0)
                                <div>
                                    <p class="text-sm font-semibold text-gray-600 uppercase mb-2">✅ Requirements</p>
                                    <ul class="list-disc list-inside space-y-1 text-gray-700">
                                        @foreach ($selectedJob->requirements as $requirement)
                                            <li>{{ $requirement }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="mt-8 flex gap-3">
                                            <button
                                type="button"
                                @click="open = false; $wire.closeModal()"
                                class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-900 font-semibold py-3 px-4 rounded-lg transition"
                            >
                                Close
                            </button>
                            <button
                                onclick="document.getElementById('jb-contact-modal-overlay').style.display='flex'; @this.call('closeModal')"
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition"
                            >
                                Apply Now 🚀
                            </button>
                        </div>
                    </div>
                @endif

                    
                    </div>
                </div>
            @endif
        </div>   
        {{-- Contact Apply Modal --}}
            <div id="jb-contact-modal-overlay" class="jb-modal-overlay" style="display: none;" onclick="if(event.target === this) this.style.display='none'">
                <div class="jb-modal-box jb-contact-modal-box">
                    <button class="jb-modal-close" onclick="document.getElementById('jb-contact-modal-overlay').style.display='none'" aria-label="Close contact modal">×</button>
                    <h3 class="jb-contact-modal-title">Contact to Apply</h3>
                    <p class="jb-contact-modal-desc">Please contact via phone or WhatsApp to apply for this job.</p>
                    <div class="jb-contact-modal-actions">
                        <a href="tel:+94334200240" class="jb-contact-btn jb-contact-btn-call">
                            <i class="fas fa-phone"></i>
                            Call +94 334 200 240
                        </a>
                        <a href="https://wa.me/94761418949" target="_blank" rel="noopener noreferrer" class="jb-contact-btn jb-contact-btn-wa">
                            <i class="fab fa-whatsapp"></i>
                            WhatsApp +94 761 418 949
                        </a>
                    </div>
                </div>
            </div>
    </div>         
        {{-- CTA Section --}}
            <section class="jb-cta">
                <div class="jb-container">
                    <h2>Can't Find the Right Job?</h2>
                    <p>Send us your CV and we'll match you with the best opportunities available.</p>
                    <div class="jb-cta-buttons">
                        <button  class="jb-cta-btn-outline" onclick="document.getElementById('jb-contact-modal-overlay').style.display='flex'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z" />
                                <path d="m21.854 2.147-10.94 10.939" />
                            </svg>
                            Submit Your CV
                        </button>
                        <a href="/contact" class="jb-cta-btn-outline">Contact Our Team</a>
                    </div>
                </div>
            </section>
  
  
</div>
</div>
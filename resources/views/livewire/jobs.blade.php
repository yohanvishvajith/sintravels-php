<?php

use App\Models\Job;
use App\Models\Country;
use App\Models\Industry;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $perPage = 10;
    public $search = '';
    public $country = '';
    public $industry = '';

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCountry()
    {
        $this->resetPage();
    }

    public function updatedIndustry()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'country', 'industry']);
        $this->resetPage();
    }

    public function render()
    {
        $query = Job::with('countryData')
            ->where(function($q) {
                $q->whereNull('closing_date')
                  ->orWhereDate('closing_date', '>=', now());
            });

        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('company', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->country) {
            $query->where('country', $this->country);
        }

        if ($this->industry) {
            $query->where('industry', $this->industry);
        }

        return view('livewire.jobs', [
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
                    @foreach($countries as $c)
                        <option value="{{ $c->name }}">{{ $c->name }}</option>
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
                    @foreach($industries as $i)
                        <option value="{{ $i->name }}">{{ $i->name }}</option>
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

{{-- Jobs Listing --}}
<div class="jb-listing">
    <div class="jb-container">
        <div class="jb-listing-header">
            <p class="jb-count"><span id="jb-count-num">{{ $jobs->count() }}</span> jobs found</p>
            <div class="jb-per-page-selector">
                <label for="perPage" class="jb-per-page-label">Show per page:</label>
                <select id="perPage" wire:model.live="perPage" class="jb-per-page-select">
                    <option value="6" @selected($perPage == 6)>06</option>
                    <option value="10" @selected($perPage == 10)>10</option>
                    <option value="20" @selected($perPage == 20)>20</option>
                    <option value="50" @selected($perPage == 50)>50</option>
                </select>
            </div>
        </div>

        <div class="jb-grid" id="jb-grid">
            @forelse($jobs as $job)
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
                    <button class="jb-btn-primary" wire:click="$dispatch('openJobModal', { jobId: '{{ $job->id }}' })">View Job</button>
                    <button class="jb-btn-outline" onclick="document.getElementById('jb-contact-modal-overlay').style.display='flex'">Contact to Apply</button>
                </div>
                <div class="jb-card-footer">
                    <span>Deadline {{ $job->closing_date?->format('M d, Y') ?? 'TBD' }}</span>
                    <span>{{ $job->vacancies ?? 1 }} {{ ($job->vacancies ?? 1) == 1 ? 'Vacancy' : 'Vacancies' }}</span>
                </div>
            </div>
            @empty
            <div class="jb-no-results">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
                <h3>No jobs found</h3>
                <p>Try adjusting your search or filter criteria.</p>
                <button wire:click="resetFilters">Clear Filters</button>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="jb-pagination">
            {{ $jobs->links() }}
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

{{-- Job Detail Modal Component --}}
<livewire:job-detail-modal />
</div>

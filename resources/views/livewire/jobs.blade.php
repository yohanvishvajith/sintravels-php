<?php

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $perPage = 10;

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.jobs', [
            'jobs' => Job::with('countryData')
                ->where(function($q) {
                    $q->whereNull('closing_date')
                      ->orWhereDate('closing_date', '>=', now());
                })->paginate($this->perPage),
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
                <input type="text" id="jb-search-input" placeholder="Search jobs, companies...">
            </div>
            <div class="jb-search-field">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                    <circle cx="12" cy="10" r="3" />
                </svg>
                <select id="jb-country-filter">
                    <option value="">All Countries</option>
                    <option value="UAE">UAE / Dubai</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Oman">Oman</option>
                    <option value="Bahrain">Bahrain</option>
                </select>
            </div>
            <div class="jb-search-field">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <polyline points="12 6 12 12 16 14" />
                </svg>
                <select id="jb-type-filter">
                    <option value="">All Job Types</option>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Contract">Contract</option>
                </select>
            </div>
            <button class="jb-search-btn" onclick="filterJobs()">
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
            <div class="jb-card" data-country="{{ $job->country }}" data-type="{{ $job->type }}">
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
                <button onclick="resetFilters()">Clear Filters</button>
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

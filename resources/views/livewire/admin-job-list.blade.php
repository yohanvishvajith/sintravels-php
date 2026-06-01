<div>
   

    {{-- Delete Confirmation Modal --}}
    <div class="modal-overlay" @if ($confirmingDeleteId) style="display: flex;" @endif>
        <div class="modal-content" style="max-width: 360px; padding: 1.5rem;">
            <p style="margin: 0 0 1rem; font-size: 0.95rem; color: #4a5568;">
                <i class="fas fa-exclamation-triangle" style="color:#e53e3e;"></i>
                Are you sure you want to delete <strong>"{{ $confirmingDeleteTitle }}"</strong>?
            </p>
            <div style="display:flex; gap:0.75rem; justify-content:flex-end;">
                <button type="button" class="btn btn-secondary btn-sm" wire:click="cancelDelete">Cancel</button>
                <button type="button" class="btn btn-sm" wire:click="deleteJob('{{ $confirmingDeleteId }}')" style="background:#e53e3e; color:#fff; border:none;">
                    Delete
                </button>
            </div>
        </div>
    </div>

    {{-- View Job Details Modal --}}
    @if ($viewingJob)
    <div class="modal-overlay" style="display: flex;">
        <div class="modal-content" style="max-width: 680px; max-height: 90vh; overflow-y: auto;">
            <div class="modal-header">
                <div style="display:flex; align-items:center; gap:0.75rem;">
                    <img src="{{ asset($flagCodes[$viewingJob->country] ?? 'https://flagcdn.com/un.svg') }}"  loading="lazy" alt="{{ $viewingJob->country }}" style="width:32px; border-radius:3px;">
                    <div>
                        <h3 style="margin:0;">{{ $viewingJob->title }}</h3>
                        <p style="margin:0; font-size:0.85rem; color:#718096;">{{ $viewingJob->company ?: 'Unknown Company' }}</p>
                    </div>
                </div>
                <button type="button" class="modal-close" wire:click="closeView">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div style="padding: 1.5rem 2rem;">
                {{-- Tags --}}
                <div class="jb-tags" style="margin-bottom:1.25rem;">
                    <span class="jb-tag jb-tag-blue"><i class="fas fa-map-marker-alt"></i> {{ $viewingJob->country }}</span>
                    <span class="jb-tag jb-tag-purple"><i class="fas fa-dollar-sign"></i> {{ $viewingJob->currency }} {{ number_format($viewingJob->salary_min) }} – {{ number_format($viewingJob->salary_max) }}</span>
                    <span class="jb-tag {{ $typeColors[$viewingJob->type] ?? 'jb-tag-blue' }}"><i class="fas fa-clock"></i> {{ $viewingJob->type }}</span>
                    @php $isExpired = $viewingJob->closing_date && $viewingJob->closing_date->isBefore(today()); @endphp
                    <span class="job-status {{ $isExpired ? 'status-expired' : 'status-active' }}">{{ $isExpired ? 'Expired' : 'Active' }}</span>
                </div>

                {{-- Details Grid --}}
                <div class="jb-details" style="margin-bottom:1.25rem;">
                    <div class="jb-detail"><span>🌎</span>
                        <div><strong>Country:</strong> {{ $viewingJob->country }}</div>
                    </div>
                    <div class="jb-detail"><span>🏭</span>
                        <div><strong>Industry:</strong> {{ $viewingJob->industry ?: 'N/A' }}</div>
                    </div>
                    <div class="jb-detail"><span>🛂</span>
                        <div><strong>Visa:</strong> {{ $viewingJob->visa_category ?: 'N/A' }}</div>
                    </div>
                    <div class="jb-detail"><span>📋</span>
                        <div><strong>Contract:</strong> {{ $viewingJob->contract_period ?: 'N/A' }}</div>
                    </div>
                    <div class="jb-detail"><span>🎂</span>
                        <div><strong>Age:</strong> {{ $viewingJob->age_min }}–{{ $viewingJob->age_max }} years</div>
                    </div>
                    <div class="jb-detail"><span>🚻</span>
                        <div><strong>Gender:</strong> {{ $viewingJob->gender }}</div>
                    </div>
                    <div class="jb-detail"><span>🎓</span>
                        <div><strong>Experience:</strong> {{ $viewingJob->experience ?: 'N/A' }}</div>
                    </div>
                    <div class="jb-detail"><span>⏰</span>
                        <div><strong>Working Hours:</strong> {{ $viewingJob->work_time ?: 'N/A' }}</div>
                    </div>
                    <div class="jb-detail"><span>🏖️</span>
                        <div><strong>Holidays:</strong> {{ $viewingJob->holidays ?: 'N/A' }}</div>
                    </div> 
                    <div class="jb-detail"><span>💰</span>
                        <div><strong>Salary:</strong> {{ $viewingJob->currency }} {{ number_format($viewingJob->salary_min) }} – {{ $viewingJob->currency }} {{ number_format($viewingJob->salary_max) }}</div>
                    </div>
                    <div class="jb-detail"><span>👥</span>
                        <div><strong>Vacancies:</strong> {{ $viewingJob->vacancies }}</div>
                    </div>
                    <div class="jb-detail"><span>📅</span>
                        <div><strong>Closing Date:</strong> {{ $viewingJob->closing_date ? $viewingJob->closing_date->format('M d, Y') : 'N/A' }}</div>
                    </div>
                    <div class="jb-detail"><span>📊</span>
                        <div><strong>Views:</strong> {{ $viewingJob->view_count }}</div>
                    </div>
                    <div class="jb-detail"><span>👤</span>
                        <div><strong>Admin ID:</strong> {{ $viewingJob->user_id ?: 'N/A' }} {{ $viewingJob->user ? '(' . $viewingJob->user->name . ')' : '' }}</div>
                    </div>
                   
                </div>

                {{-- Benefits --}}
                @if ($viewingJob->jobBenefits && $viewingJob->jobBenefits->isNotEmpty())
                <div style="margin-bottom:1rem;">
                    <strong>Benefits</strong>
                    <div style="margin-top:0.5rem; display:flex; flex-wrap:wrap; gap:0.5rem;">
                        @foreach ($viewingJob->jobBenefits as $jobBenefit)
                            @if ($jobBenefit->benefit)
                                <span class="jb-tag" style="background:#edf2f7; color:#4a5568; padding:0.25rem 0.5rem; border-radius:0.25rem; font-size:0.8rem;">
                                    <i class="fas fa-check-circle" style="color:#48bb78; margin-right:0.25rem;"></i> {{ $jobBenefit->benefit->name }}
                                </span>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Description --}}
                @if ($viewingJob->description && $viewingJob->description !== 'N/A')
                <div style="margin-bottom:1rem;">
                    <strong>Description</strong>
                    <p style="margin-top:0.5rem; color:#4a5568; line-height:1.6; white-space:pre-line;">{{ $viewingJob->description }}</p>
                </div>
                @endif
            </div>

            <div class="modal-footer" style="padding: 0 1.5rem 1.5rem 1.5rem; gap: 0.75rem;">
                <button type="button" class="btn btn-secondary" wire:click="closeView">Close</button>
                <button type="button" class="btn btn-sm" wire:click="confirmDelete('{{ $viewingJob->id }}')" style="background:#e53e3e; color:#fff; border:none; padding:0.5rem 1rem; border-radius:6px;">
                    <i class="fas fa-trash-alt"></i> Delete Job
                </button>
            </div>
        </div>
    </div>
    @endif

    <div class="jb-grid">
        @forelse ($jobs as $job)
        @php
        $country = $job->country ?? '';
        $flagImg = $flagCodes[$country] ?? 'https://flagcdn.com/un.svg';
        $typeColor = $typeColors[$job->type] ?? 'jb-tag-blue';
        $isExpired = $job->closing_date && $job->closing_date->isBefore(today());
        @endphp

        <div class="jb-card" data-country="{{ $country }}" data-type="{{ $job->type }}">
            <div class="jb-card-header">
                <div class="jb-card-flag">
                    <img src="{{ asset($flagImg) }}"  loading="lazy"alt="{{ $country }} flag">
                </div>
                <div>
                    <h2 class="jb-card-title">{{ $job->title }}</h2>
                    <p class="jb-card-company">{{ $job->company ?: 'Unknown Company' }}</p>
                </div>
                <span class="job-status {{ $isExpired ? 'status-expired' : 'status-active' }}" style="margin-left:auto; white-space:nowrap;">
                    {{ $isExpired ? 'Expired' : 'Active' }}
                </span>
            </div>

            <div class="jb-card-body">
                <div class="jb-tags">
                    <span class="jb-tag jb-tag-blue"><i class="fas fa-map-marker-alt"></i> {{ $country }}</span>
                    <span class="jb-tag jb-tag-purple">
                        <i class="fas fa-dollar-sign"></i>
                        {{ $job->currency }} {{ number_format($job->salary_min) }} – {{ number_format($job->salary_max) }}
                    </span>
                    <span class="jb-tag {{ $typeColor }}"><i class="fas fa-clock"></i> {{ $job->type }}</span>
                </div>

                <div class="jb-details">
                    <div class="jb-detail">
                        <span>🌎</span>
                        <div><strong>Country:</strong> {{ $country }}</div>
                    </div>
                    <div class="jb-detail">
                        <span>🛂</span>
                        <div><strong>Visa:</strong> {{ $job->visa_category ?: 'N/A' }}</div>
                    </div>
                    <div class="jb-detail">
                        <span>🎂</span>
                        <div><strong>Age:</strong> {{ $job->age_min }}–{{ $job->age_max }} years</div>
                    </div>
                    <div class="jb-detail">
                        <span>🚻</span>
                        <div><strong>Gender:</strong> {{ $job->gender }}</div>
                    </div>
                    <div class="jb-detail jb-detail-full">
                        <span>💰</span>
                        <div><strong>Salary:</strong>    💰 {{ $job->currency }} 
                            @if ($job->salary_max)
                                {{ number_format($job->salary_min) }} - {{ number_format($job->salary_max) }}
                            @else
                                {{ number_format($job->salary_min) }}+
                            @endif</div>
                    </div>
                </div>
            </div>

            <div class="jb-card-actions">
                <button class="jb-btn-primary" wire:click="viewJob('{{ $job->id }}')">
                    <i class="fas fa-eye"></i> View Job
                </button>
                <button class="jb-btn-outline" wire:click="editJob('{{ $job->id }}')" style="border-color: #10b981; color: #10b981;">
                    <i class="fas fa-edit"></i> Edit Job
                </button>
            </div>

            <div class="jb-card-footer">
                <span>Deadline {{ $job->closing_date ? $job->closing_date->format('M d, Y') : 'N/A' }}</span>
                <span>{{ $job->vacancies }} {{ $job->vacancies === 1 ? 'Vacancy' : 'Vacancies' }}</span>
                <span><i class="fas fa-eye"></i> {{ $job->view_count ?? 0 }} {{ ($job->view_count ?? 0) === 1 ? 'View' : 'Views' }}</span>
            </div>
        </div>
        @empty
        <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; color: #718096;">
            <i class="fas fa-briefcase" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
            <p>No jobs found. Use the form above to add your first job.</p>
        </div>
        @endforelse
    </div>
</div>
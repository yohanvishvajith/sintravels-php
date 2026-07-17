<?php

use App\Models\Job;
use App\Models\JobView;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public $jobId = null;

    public $selectedJob = null;

    public $isModalOpen = false;

    #[On('openJobModal')]
    public function openModal($jobId): void
    {
        $this->jobId = $jobId;
        $this->selectedJob = Job::with('jobBenefits.benefit', 'countryData')->find($jobId);
        $this->isModalOpen = true;
        
        // Log the view
        if ($this->selectedJob) {
            JobView::create([
                'job_id' => $jobId,
                'created_at' => now(),
            ]);
        }
    }

    public function closeModal(): void
    {
        $this->isModalOpen = false;
        $this->selectedJob = null;
        $this->jobId = null;
    }

    public function render()
    {
        return view('livewire.job-detail-modal');
    }
};

?>

<div x-data="{ modalOpen: $wire.entangle('isModalOpen') }">
    <div
        wire:loading.flex
        wire:target="openModal"
        class="fixed inset-0 z-50 items-center justify-center bg-black/30 backdrop-blur-sm"
    >
        <div class="flex flex-col items-center gap-3 rounded-2xl bg-white px-6 py-5 shadow-xl">
            <div class="h-10 w-10 animate-spin rounded-full border-4 border-gray-200 border-t-blue-600"></div>
            <p class="text-sm font-medium text-gray-600">Loading job details...</p>
        </div>
    </div>

    <!-- Modal -->
    <div
        x-show="modalOpen"
        x-transition
        class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50"
        @click.self="$wire.closeModal()"
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
                        wire:click="closeModal"
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
                        wire:click="closeModal"
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

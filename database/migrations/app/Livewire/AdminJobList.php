<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Attributes\On;
use Livewire\Component;

class AdminJobList extends Component
{
    public ?string $confirmingDeleteId = null;

    public ?string $confirmingDeleteTitle = null;

    public ?string $viewingJobId = null;

    public ?string $previousViewingJobId = null;

    public function viewJob(string $id): void
    {
        $this->viewingJobId = $id;
    }

    public function editJob(string $id): void
    {
        $this->dispatch('edit-job', id: $id)->to(AdminJobForm::class);
    }

    public function closeView(): void
    {
        $this->viewingJobId = null;
    }

    /** @var array<string, string> */
    protected array $flagCodes = [
        'UAE' => 'ae',
        'Dubai' => 'ae',
        'Kuwait' => 'kw',
        'Saudi Arabia' => 'sa',
        'Qatar' => 'qa',
        'Oman' => 'om',
        'Bahrain' => 'bh',
        'Singapore' => 'sg',
        'Thailand' => 'th',
        'Malaysia' => 'my',
        'Japan' => 'jp',
        'Philippines' => 'ph',
        'India' => 'in',
        'Sri Lanka' => 'lk',
        'Nepal' => 'np',
        'Bangladesh' => 'bd',
    ];

    /** @var array<string, string> */
    protected array $typeColors = [
        'Full-time' => 'jb-tag-green',
        'Part-time' => 'jb-tag-yellow',
        'Contract' => 'jb-tag-yellow',
        'Temporary' => 'jb-tag-blue',
    ];

    public function confirmDelete(string $id): void
    {
        $job = Job::query()->find($id);
        $this->previousViewingJobId = $this->viewingJobId;
        $this->confirmingDeleteId = $id;
        $this->confirmingDeleteTitle = $job?->title;
        $this->viewingJobId = null;
    }

    public function cancelDelete(): void
    {
        $this->confirmingDeleteId = null;
        $this->confirmingDeleteTitle = null;
        $this->viewingJobId = $this->previousViewingJobId;
        $this->previousViewingJobId = null;
    }

    public function deleteJob(string $id): void
    {
        Job::query()->findOrFail($id)->delete();
        $this->confirmingDeleteId = null;
        $this->confirmingDeleteTitle = null;
        $this->previousViewingJobId = null;
        $this->dispatch('toast', type: 'success', message: 'Job deleted successfully.', position: 'bottom-right');
    }

    #[On('job-created')]
    public function refreshList(): void
    {
        // Re-render is triggered automatically by Livewire
    }

    public function flagCode(string $country): string
    {
        return $this->flagCodes[$country] ?? 'un';
    }

    public function typeColor(string $type): string
    {
        return $this->typeColors[$type] ?? 'jb-tag-blue';
    }

    public function render(): \Illuminate\View\View
    {
        $jobs = Job::query()
            ->where(function ($query) {
                $query->whereNull('closing_date')
                    ->orWhere('closing_date', '>=', today());
            })
            ->latest()
            ->get();
        $viewingJob = $this->viewingJobId ? Job::query()->with(['applicants', 'user', 'jobBenefits.benefit'])->find($this->viewingJobId) : null;

        return view('livewire.admin-job-list', [
            'jobs' => $jobs,
            'flagCodes' => \App\Models\Country::pluck('flagimg', 'name')->toArray(),
            'typeColors' => $this->typeColors,
            'viewingJob' => $viewingJob,
        ]);
    }
}

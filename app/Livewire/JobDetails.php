<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Attributes\On;
use Livewire\Component;

class JobDetails extends Component
{
    public $jobId;
    public $isOpen = false;
    public $justOpened = false;

    #[On('show-job')]
    public function showJob($id)
    {
        $this->jobId = $id;
        $this->isOpen = true;
        $this->justOpened = true;
    }

    #[On('reset-just-opened-flag')]
    public function resetJustOpenedFlag(): void
    {
        $this->justOpened = false;
    }

    public function closeJobModal()
    {
        // Don't close if modal was just opened (prevents instant close on open)
        if ($this->justOpened) {
            return;
        }
        
        $this->isOpen = false;
        $this->jobId = null;
    }

    public function render()
    {
        $job = $this->jobId ? Job::with(['jobBenefits.benefit', 'countryData'])->find($this->jobId) : null;
        
        return view('livewire.job-details', [
            'job' => $job,
        ]);
    }
}

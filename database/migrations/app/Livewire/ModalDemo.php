<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ModalDemo extends Component
{
    public bool $showModal = false;
    public array $testValue = [];

    public function openModal(string $id): void
    {
        // $job = DB::table('job_listings')->where('id', $id)->first();

        // $this->testValue = $job ? (array) $job : [];
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->testValue = [];
    }

    public function render()
    {
        $jobs = DB::table('job_listings')
            ->select('id', 'title', 'company', 'location', 'country')
            ->orderByDesc('id')
            ->get();

        return view('livewire.modal-demo', [
            'jobs' => $jobs,
        ]);
    }
}

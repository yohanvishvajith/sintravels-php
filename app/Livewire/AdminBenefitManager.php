<?php

namespace App\Livewire;

use App\Models\Benefit;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBenefitManager extends Component
{
    use WithPagination;

    public bool $showModal = false;

    public bool $showDeleteModal = false;

    public ?int $editingId = null;

    public ?int $deletingId = null;

    public ?string $deletingName = null;

    public string $name = '';

    public function openModal(): void
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
    }

    public function resetForm(): void
    {
        $this->editingId = null;
        $this->name = '';
    }

    public function edit(Benefit $benefit): void
    {
        $this->editingId = $benefit->id;
        $this->name = $benefit->name;
        $this->showModal = true;
    }

    public function save(): void
    {
        $this->validate(['name' => 'required|string|max:255']);

        if ($this->editingId) {
            $benefit = Benefit::find($this->editingId);
            $benefit->update(['name' => $this->name]);
        } else {
            Benefit::create(['name' => $this->name]);
        }

        $this->resetForm();
        $this->showModal = false;
    }

    public function delete(Benefit $benefit): void
    {
        $this->deletingId = $benefit->id;
        $this->deletingName = $benefit->name;
        $this->showDeleteModal = true;
    }

    public function confirmDelete(): void
    {
        if ($this->deletingId) {
            Benefit::find($this->deletingId)->delete();
            $this->showDeleteModal = false;
            $this->deletingId = null;
            $this->deletingName = null;
        }
    }

    public function cancelDelete(): void
    {
        $this->showDeleteModal = false;
        $this->deletingId = null;
        $this->deletingName = null;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin-benefit-manager', [
            'benefits' => Benefit::paginate(10),
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Industry;
use Livewire\Component;
use Livewire\WithPagination;

class AdminIndustryManager extends Component
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

    public function edit(Industry $industry): void
    {
        $this->editingId = $industry->id;
        $this->name = $industry->name;
        $this->showModal = true;
    }

    public function save(): void
    {
        $this->validate(['name' => 'required|string|max:255']);

        if ($this->editingId) {
            $industry = Industry::find($this->editingId);
            $industry->update(['name' => $this->name]);
            $message = 'Industry updated successfully!';
        } else {
            Industry::create(['name' => $this->name]);
            $message = 'Industry created successfully!';
        }

        $this->dispatch('toast', type: 'success', message: $message, position: 'bottom-right');
        $this->resetForm();
        $this->showModal = false;
    }

    public function delete(Industry $industry): void
    {
        $this->deletingId = $industry->id;
        $this->deletingName = $industry->name;
        $this->showDeleteModal = true;
    }

    public function confirmDelete(): void
    {
        if ($this->deletingId) {
            Industry::find($this->deletingId)->delete();
            $this->dispatch('toast', type: 'success', message: 'Industry deleted successfully!', position: 'bottom-right');
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
        return view('livewire.admin-industry-manager', [
            'industries' => Industry::paginate(10),
        ]);
    }
}

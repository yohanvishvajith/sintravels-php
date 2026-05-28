<?php

namespace App\Livewire;

use App\Models\VisaCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminVisaCategoryManager extends Component
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

    public function edit(VisaCategory $visaCategory): void
    {
        $this->editingId = $visaCategory->id;
        $this->name = $visaCategory->name;
        $this->showModal = true;
    }

    public function save(): void
    {
        $this->validate(['name' => 'required|string|max:255']);

        if ($this->editingId) {
            $visaCategory = VisaCategory::find($this->editingId);
            $visaCategory->update(['name' => $this->name]);
        } else {
            VisaCategory::create(['name' => $this->name]);
        }

        $this->resetForm();
        $this->showModal = false;
    }

    public function delete(VisaCategory $visaCategory): void
    {
        $this->deletingId = $visaCategory->id;
        $this->deletingName = $visaCategory->name;
        $this->showDeleteModal = true;
    }

    public function confirmDelete(): void
    {
        if ($this->deletingId) {
            VisaCategory::find($this->deletingId)->delete();
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
        return view('livewire.admin-visa-category-manager', [
            'visaCategories' => VisaCategory::paginate(10),
        ]);
    }
}

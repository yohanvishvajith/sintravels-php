<?php

namespace App\Livewire;

use App\Models\Country;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminCountryManager extends Component
{
    use WithFileUploads, WithPagination;

    public bool $showModal = false;

    public bool $showDeleteModal = false;

    public ?int $editingId = null;

    public ?int $deletingId = null;

    public ?string $deletingName = null;

    public string $name = '';

    public mixed $flagimg = null;

    public ?string $originalFlagimg = null;

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
        $this->flagimg = null;
        $this->originalFlagimg = null;
    }

    public function edit(Country $country): void
    {
        $this->editingId = $country->id;
        $this->name = $country->name;
        $this->flagimg = $country->flagimg;
        $this->originalFlagimg = $country->flagimg;
        $this->showModal = true;
    }

    public function save(): void
    {
        // Only validate flagimg as an image file if it's a new upload (not a string)
        $rules = [
            'name' => 'required|string|max:255',
        ];

        // Only add image validation if flagimg is actually a file upload
        if ($this->flagimg && !is_string($this->flagimg)) {
            $rules['flagimg'] = 'image|mimes:jpeg,png,gif,svg|max:2048';
        }

        $this->validate($rules);

        $flagPath = null;
        if ($this->flagimg && !is_string($this->flagimg)) {
            $flagPath = $this->flagimg->store('countries', 'public');
        }

        if ($this->editingId) {
            $country = Country::find($this->editingId);
            $updateData = ['name' => $this->name];

            // Check if image was modified (different from original)
            if ($this->flagimg !== $this->originalFlagimg) {
                if ($flagPath) {
                    // New image was uploaded
                    $updateData['flagimg'] = '/storage/' . $flagPath;
                } else {
                    // Image was cleared (flagimg is null)
                    $updateData['flagimg'] = null;
                }
            }

            $country->update($updateData);
            $message = 'Country updated successfully!';
        } else {
            Country::create([
                'name' => $this->name,
                'flagimg' => $flagPath ? '/storage/' . $flagPath : null,
            ]);
            $message = 'Country created successfully!';
        }

        $this->dispatch('toast', type: 'success', message: $message, position: 'bottom-right');
        $this->resetForm();
        $this->showModal = false;
    }

    public function clearImage(): void
    {
        $this->flagimg = null;
    }

    public function delete(Country $country): void
    {
        $this->deletingId = $country->id;
        $this->deletingName = $country->name;
        $this->showDeleteModal = true;
    }

    public function confirmDelete(): void
    {
        if ($this->deletingId) {
            Country::find($this->deletingId)->delete();
            $this->dispatch('toast', type: 'success', message: 'Country deleted successfully!', position: 'bottom-right');
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
        return view('livewire.admin-country-manager', [
            'countries' => Country::paginate(10),
        ]);
    }
}

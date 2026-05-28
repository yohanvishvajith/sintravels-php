<?php

namespace App\Livewire;

use App\Models\Currency;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCurrencyManager extends Component
{
    use WithPagination;

    public bool $showModal = false;

    public bool $showDeleteModal = false;

    public ?int $editingId = null;

    public ?int $deletingId = null;

    public ?string $deletingName = null;

    public string $code = '';

    public string $name = '';

    public string $symbol = '';

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
        $this->code = '';
        $this->name = '';
        $this->symbol = '';
    }

    public function edit(Currency $currency): void
    {
        $this->editingId = $currency->id;
        $this->code = $currency->code;
        $this->name = $currency->name;
        $this->symbol = $currency->symbol;
        $this->showModal = true;
    }

    public function save(): void
    {
        $this->validate([
            'code' => 'required|string|max:3',
            'name' => 'required|string|max:255',
            'symbol' => 'nullable|string|max:10',
        ]);

        if ($this->editingId) {
            $currency = Currency::find($this->editingId);
            $currency->update([
                'code' => $this->code,
                'name' => $this->name,
                'symbol' => $this->symbol,
            ]);
        } else {
            Currency::create([
                'code' => $this->code,
                'name' => $this->name,
                'symbol' => $this->symbol,
            ]);
        }

        $this->resetForm();
        $this->showModal = false;
    }

    public function delete(Currency $currency): void
    {
        $this->deletingId = $currency->id;
        $this->deletingName = $currency->code . ' - ' . $currency->name;
        $this->showDeleteModal = true;
    }

    public function confirmDelete(): void
    {
        if ($this->deletingId) {
            Currency::find($this->deletingId)->delete();
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
        return view('livewire.admin-currency-manager', [
            'currencies' => Currency::paginate(10),
        ]);
    }
}

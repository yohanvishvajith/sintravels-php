<div>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h3>Currency Management</h3>
        <button class="btn btn-primary" wire:click="openModal">
            <i class="fas fa-plus"></i>
            Add Currency
        </button>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Currencies Table -->
    <div style="overflow-x: auto; background: white; border-radius: 8px; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
        @if ($currencies->count() > 0)
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f7fafc; border-bottom: 2px solid #e2e8f0;">
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #2d3748;">ID</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #2d3748;">Code</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #2d3748;">Name</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #2d3748;">Symbol</th>
                    <th style="padding: 1rem; text-align: right; font-weight: 600; color: #2d3748;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($currencies as $currency)
                <tr style="border-bottom: 1px solid #e2e8f0; transition: background 0.2s;">
                    <td style="padding: 1rem;">
                        <span style="color: #718096; font-size: 0.9rem;">#{{ $currency->id }}</span>
                    </td>
                    <td style="padding: 1rem;">
                        <span style="font-weight: 600; color: #2d3748; background: #edf2f7; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.9rem;">{{ $currency->code }}</span>
                    </td>
                    <td style="padding: 1rem;">
                        <span style="font-weight: 500; color: #2d3748;">{{ $currency->name }}</span>
                    </td>
                    <td style="padding: 1rem;">
                        <span style="font-size: 1.2rem;">{{ $currency->symbol }}</span>
                    </td>
                    <td style="padding: 1rem; text-align: right;">
                        <button wire:click="edit({{ $currency->id }})" style="background: #edf2f7; color: #2d3748; border: 1px solid #cbd5e0; padding: 0.5rem 0.75rem; border-radius: 4px; cursor: pointer; margin-right: 0.5rem; font-size: 0.9rem;">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button wire:click="delete({{ $currency->id }})" style="background: #fed7d7; color: #c53030; border: 1px solid #fc8181; padding: 0.5rem 0.75rem; border-radius: 4px; cursor: pointer; font-size: 0.9rem;">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div style="padding: 1rem; border-top: 1px solid #e2e8f0; display: flex; justify-content: center;">
            {{ $currencies->links() }}
        </div>
        @else
        <div style="padding: 2rem; text-align: center; color: #718096;">
            <i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 0.5rem; display: block;"></i>
            <p>No currencies found. Add one to get started!</p>
        </div>
        @endif
    </div>

    <!-- Add/Edit Modal -->
    <div class="modal-overlay" @if ($showModal) style="display: flex;" @endif>
        <div class="modal-content" style="max-width: 450px;">
            <div class="modal-header">
                <h3>{{ $editingId ? 'Edit Currency' : 'Add New Currency' }}</h3>
                <button type="button" class="modal-close" wire:click="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form wire:submit="save" class="modal-form">
                <div class="form-group">
                    <label for="code">Currency Code <span class="required">*</span></label>
                    <input
                        type="text"
                        id="code"
                        wire:model="code"
                        class="form-input"
                        placeholder="e.g., USD"
                        maxlength="3">
                    @error('code') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="name">Currency Name <span class="required">*</span></label>
                    <input
                        type="text"
                        id="name"
                        wire:model="name"
                        class="form-input"
                        placeholder="e.g., United States Dollar">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="symbol">Symbol</label>
                    <input
                        type="text"
                        id="symbol"
                        wire:model="symbol"
                        class="form-input"
                        placeholder="e.g., $"
                        maxlength="10">
                    @error('symbol') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        {{ $editingId ? 'Update' : 'Add' }} Currency
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal-overlay" @if ($showDeleteModal) style="display: flex;" @endif>
        <div class="modal-content" style="max-width: 400px;">
            <div class="modal-header">
                <h3>Delete Currency</h3>
                <button type="button" class="modal-close" wire:click="cancelDelete">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div style="padding: 1.5rem 2rem; text-align: center;">
                <div style="margin-bottom: 1.5rem;">
                    <i class="fas fa-exclamation-triangle" style="font-size: 2.5rem; color: #e53e3e;"></i>
                </div>
                <h4 style="margin: 0 0 1rem; color: #2d3748;">Delete {{ $deletingName }}?</h4>
                <p style="margin: 0 0 1.5rem; color: #718096; font-size: 0.95rem;">
                    This action cannot be undone. The currency will be permanently removed.
                </p>
            </div>

            <div class="modal-footer" style="justify-content: flex-end; gap: 0.75rem; padding: 1rem 2rem; border-top: 1px solid #e2e8f0;">
                <button type="button" class="btn btn-secondary" wire:click="cancelDelete">Cancel</button>
                <button type="button" class="btn" style="background: #e53e3e; color: white; border: none;" wire:click="confirmDelete">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </div>
        </div>
    </div>
</div>
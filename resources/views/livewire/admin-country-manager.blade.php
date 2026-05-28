<div>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h3>Countries Management</h3>
        <button class="btn btn-primary" wire:click="openModal">
            <i class="fas fa-plus"></i>
            Add Country
        </button>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Countries Table -->
    <div style="overflow-x: auto; background: white; border-radius: 8px; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
        @if ($countries->count() > 0)
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f7fafc; border-bottom: 2px solid #e2e8f0;">
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #2d3748;">ID</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #2d3748;">Country Name</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #2d3748;">Flag Image</th>
                    <th style="padding: 1rem; text-align: right; font-weight: 600; color: #2d3748;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)
                <tr style="border-bottom: 1px solid #e2e8f0; transition: background 0.2s;">
                    <td style="padding: 1rem;">
                        <span style="color: #718096; font-size: 0.9rem;">#{{ $country->id }}</span>
                    </td>
                    <td style="padding: 1rem;">
                        <span style="font-weight: 500; color: #2d3748;">{{ $country->name }}</span>
                    </td>
                    <td style="padding: 1rem;">
                        @if ($country->flagimg)
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <img src="{{ $country->flagimg }}" alt="{{ $country->name }}"  loading="lazy" style="width: 32px; height: 20px; border-radius: 3px; object-fit: cover;">
                       </div>
                        @else
                        <span style="color: #a0aec0; font-style: italic;">No image</span>
                        @endif
                    </td>
                    <td style="padding: 1rem; text-align: right;">
                        <button wire:click="edit({{ $country->id }})" style="background: #edf2f7; color: #2d3748; border: 1px solid #cbd5e0; padding: 0.5rem 0.75rem; border-radius: 4px; cursor: pointer; margin-right: 0.5rem; font-size: 0.9rem;">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button wire:click="delete({{ $country->id }})" style="background: #fed7d7; color: #c53030; border: 1px solid #fc8181; padding: 0.5rem 0.75rem; border-radius: 4px; cursor: pointer; font-size: 0.9rem;">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div style="padding: 1rem; border-top: 1px solid #e2e8f0; display: flex; justify-content: center;">
            {{ $countries->links() }}
        </div>
        @else
        <div style="padding: 2rem; text-align: center; color: #718096;">
            <i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 0.5rem; display: block;"></i>
            <p>No countries found. Add one to get started!</p>
        </div>
        @endif
    </div>

    <!-- Add/Edit Modal -->
    <div class="modal-overlay" @if ($showModal) style="display: flex;" @endif>
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header">
                <h3>{{ $editingId ? 'Edit Country' : 'Add New Country' }}</h3>
                <button type="button" class="modal-close" wire:click="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form wire:submit="save" class="modal-form">
                <div class="form-group">
                    <label for="name">Country Name <span class="required">*</span></label>
                    <input
                        type="text"
                        id="name"
                        wire:model="name"
                        class="form-input"
                        placeholder="e.g., United States">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="flagimg">Flag Image</label>
                    <div style="position: relative; display: inline-block; width: 100%;">
                        <input
                            type="file"
                            id="flagimg"
                            wire:model.live="flagimg"
                            class="form-input"
                            accept="image/*"
                            style="position: relative; z-index: 1; opacity: 0; cursor: pointer; height: 44px; width: 100%;">
                        <div style="position: absolute; top: 0; left: 0; right: 0; height: 44px; background: white; border: 1px solid #cbd5e0; border-radius: 4px; display: flex; align-items: center; padding: 0 0.75rem; pointer-events: none; color: #718096;">
                            <i class="fas fa-cloud-upload-alt" style="margin-right: 0.5rem;"></i>
                            <span>{{ $flagimg ? 'Change image' : 'Choose image' }}</span>
                        </div>
                    </div>
                    @error('flagimg') <span class="error">{{ $message }}</span> @enderror
                    @if ($flagimg)
                    <div style="margin-top: 0.75rem;">
                        <p style="font-size: 0.85rem; color: #718096; margin: 0 0 0.5rem;">Preview:</p>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            @if (is_string($flagimg))
                            <img src="{{ $flagimg }}" alt="Flag preview" loading="lazy" style="width: 64px; height: 40px; border-radius: 4px; object-fit: cover; border: 1px solid #e2e8f0;">
                            @else
                            <img src="{{ $flagimg->temporaryUrl() }}" alt="Flag preview" loading="lazy" style="width: 64px; height: 40px; border-radius: 4px; object-fit: cover; border: 1px solid #e2e8f0;">
                            @endif
                            <button type="button" wire:click="clearImage" style="background: #fed7d7; color: #c53030; border: 1px solid #fc8181; padding: 0.4rem 0.7rem; border-radius: 4px; cursor: pointer; font-size: 0.85rem;">
                                <i class="fas fa-trash"></i> Clear
                            </button>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        {{ $editingId ? 'Update' : 'Add' }} Country
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal-overlay" @if ($showDeleteModal) style="display: flex;" @endif>
        <div class="modal-content" style="max-width: 400px;">
            <div class="modal-header">
                <h3>Delete Country</h3>
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
                    This action cannot be undone. The country and any associated data will be permanently removed.
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
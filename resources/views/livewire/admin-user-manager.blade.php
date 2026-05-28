<div>
    @if (session()->has('success'))
    <div style="padding: 0.75rem; margin-bottom: 1rem; background: #d1fae5; border: 1px solid #6ee7b7; border-radius: 6px; color: #065f46;">
        {{ session('success') }}
    </div>
    @endif

    <div style="margin-bottom: 1.5rem;">
        <button wire:click="openModal" style="padding: 0.5rem 1rem; background: #0ea5e9; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
            <i class="fas fa-plus"></i> Add User
        </button>
    </div>

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f3f4f6; border-bottom: 2px solid #e5e7eb;">
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #374151;">Name</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #374151;">Username</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #374151;">Email</th>
                    <th style="padding: 1rem; text-align: center; font-weight: 600; color: #374151;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr style="border-bottom: 1px solid #e5e7eb; hover:background: #f9fafb;">
                    <td style="padding: 1rem; color: #1f2937;">{{ $user->name }}</td>
                    <td style="padding: 1rem; color: #1f2937;">{{ $user->username }}</td>
                    <td style="padding: 1rem; color: #1f2937;">{{ $user->email }}</td>
                    <td style="padding: 1rem; text-align: center;">
                        <button wire:click="edit({{ $user->id }})" style="padding: 0.25rem 0.75rem; background: #3b82f6; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.875rem; margin-right: 0.5rem;">
                            Edit
                        </button>
                        <button wire:click="delete({{ $user->id }})" style="padding: 0.25rem 0.75rem; background: #ef4444; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.875rem;">
                            Delete
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding: 2rem; text-align: center; color: #9ca3af;">
                        No users found. Create one to get started.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 1.5rem;">
        {{ $users->links() }}
    </div>

    <!-- Add/Edit Modal -->
    @if ($showModal)
    <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: flex; align-items: center; justify-content: center; z-index: 50;">
        <div style="background: white; border-radius: 8px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); width: 90%; max-width: 500px; padding: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #1f2937;">
                    {{ $editingId ? 'Edit User' : 'Add New User' }}
                </h3>
                <button wire:click="closeModal" style="background: none; border: none; font-size: 1.5rem; color: #6b7280; cursor: pointer;">
                    ×
                </button>
            </div>

            <form wire:submit="save">
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #374151;">Name <span style="color: #ef4444;">*</span></label>
                    <input type="text" wire:model="name" placeholder="Full name" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; box-sizing: border-box;">
                    @error('name') <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span> @enderror
                </div>

                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #374151;">Username <span style="color: #ef4444;">*</span></label>
                    <input type="text" wire:model="username" placeholder="Username" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; box-sizing: border-box;">
                    @error('username') <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span> @enderror
                </div>

                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #374151;">Email <span style="color: #ef4444;">*</span></label>
                    <input type="email" wire:model="email" placeholder="Email address" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; box-sizing: border-box;">
                    @error('email') <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span> @enderror
                </div>

                @if (!$editingId)
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #374151;">Password <span style="color: #ef4444;">*</span></label>
                    <input type="password" wire:model="password" placeholder="Password" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; box-sizing: border-box;">
                    @error('password') <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span> @enderror
                </div>
                @else
                <div style="margin-bottom: 1.5rem;">
                    <button type="button" wire:click="openChangePasswordModal({{ $editingId }})" style="width: 100%; padding: 0.75rem 1.5rem; background: #f59e0b; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                        Change Password
                    </button>
                </div>
                @endif

                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <button type="button" wire:click="closeModal" style="padding: 0.75rem 1.5rem; background: #e5e7eb; color: #374151; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                        Cancel
                    </button>
                    <button type="submit" style="padding: 0.75rem 1.5rem; background: #0ea5e9; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                        {{ $editingId ? 'Update User' : 'Create User' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <!-- Delete Confirmation Modal -->
    @if ($showDeleteConfirm)
    <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: flex; align-items: center; justify-content: center; z-index: 50;">
        <div style="background: white; border-radius: 8px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); width: 90%; max-width: 400px; padding: 2rem;">
            <h3 style="font-size: 1.125rem; font-weight: 600; color: #1f2937; margin-bottom: 1rem;">
                Are you sure?
            </h3>
            <p style="color: #6b7280; margin-bottom: 1.5rem;">
                This action cannot be undone. The user will be permanently deleted.
            </p>

            <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                <button wire:click="cancelDelete" style="padding: 0.75rem 1.5rem; background: #e5e7eb; color: #374151; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                    Cancel
                </button>
                <button wire:click="confirmDelete" style="padding: 0.75rem 1.5rem; background: #ef4444; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                    Delete User
                </button>
            </div>
        </div>
    </div>
    @endif

    <!-- Change Password Modal -->
    @if ($showChangePasswordModal)
    <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: flex; align-items: center; justify-content: center; z-index: 50;">
        <div style="background: white; border-radius: 8px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); width: 90%; max-width: 500px; padding: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #1f2937;">
                    Change Password
                </h3>
                <button wire:click="closeChangePasswordModal" style="background: none; border: none; font-size: 1.5rem; color: #6b7280; cursor: pointer;">
                    ×
                </button>
            </div>

            <form wire:submit="changePassword">
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #374151;">Current Password <span style="color: #ef4444;">*</span></label>
                    <div style="position: relative; display: flex; align-items: center;">
                        <input type="{{ $showCurrentPassword ? 'text' : 'password' }}" wire:model="currentPassword" placeholder="Enter current password" style="width: 100%; padding: 0.75rem; padding-right: 2.5rem; border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; box-sizing: border-box;">
                        <button type="button" wire:click="toggleCurrentPasswordVisibility" style="position: absolute; right: 0.75rem; background: none; border: none; cursor: pointer; color: #6b7280; font-size: 1.25rem;">
                            <i class="fas fa-{{ $showCurrentPassword ? 'eye-slash' : 'eye' }}"></i>
                        </button>
                    </div>
                    @error('currentPassword') <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span> @enderror
                </div>

                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #374151;">New Password <span style="color: #ef4444;">*</span></label>
                    <div style="position: relative; display: flex; align-items: center;">
                        <input type="{{ $showNewPassword ? 'text' : 'password' }}" wire:model.live="newPassword" wire:input="validateConfirmPassword" placeholder="Enter new password" style="width: 100%; padding: 0.75rem; padding-right: 2.5rem; border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; box-sizing: border-box;">
                        <button type="button" wire:click="toggleNewPasswordVisibility" style="position: absolute; right: 0.75rem; background: none; border: none; cursor: pointer; color: #6b7280; font-size: 1.25rem;">
                            <i class="fas fa-{{ $showNewPassword ? 'eye-slash' : 'eye' }}"></i>
                        </button>
                    </div>
                    @error('newPassword') <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span> @enderror
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #374151;">Confirm New Password <span style="color: #ef4444;">*</span></label>
                    <div style="position: relative; display: flex; align-items: center;">
                        <input type="{{ $showConfirmPassword ? 'text' : 'password' }}" wire:model.live="newPassword_confirmation" wire:input="validateConfirmPassword" placeholder="Confirm new password" style="width: 100%; padding: 0.75rem; padding-right: 2.5rem; border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; box-sizing: border-box;">
                        <button type="button" wire:click="toggleConfirmPasswordVisibility" style="position: absolute; right: 0.75rem; background: none; border: none; cursor: pointer; color: #6b7280; font-size: 1.25rem;">
                            <i class="fas fa-{{ $showConfirmPassword ? 'eye-slash' : 'eye' }}"></i>
                        </button>
                    </div>
                    @if ($newPassword !== '' || $newPassword_confirmation !== '')
                    @if ($passwordsMatch)
                    <span style="color: #10b981; font-size: 0.875rem; font-weight: 500; display: flex; align-items: center; gap: 0.5rem; margin-top: 0.5rem;"><i class="fas fa-check"></i> Passwords match</span>
                    @else
                    <span style="color: #ef4444; font-size: 0.875rem; display: flex; align-items: center; gap: 0.5rem; margin-top: 0.5rem;"><i class="fas fa-times"></i> Passwords do not match</span>
                    @endif
                    @endif
                    @error('newPassword_confirmation') <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span> @enderror
                </div>

                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <button type="button" wire:click="closeChangePasswordModal" style="padding: 0.75rem 1.5rem; background: #e5e7eb; color: #374151; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                        Cancel
                    </button>
                    <button type="submit" style="padding: 0.75rem 1.5rem; background: #10b981; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                        Change Password
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
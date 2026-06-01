<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUserManager extends Component
{
    use WithPagination;

    public bool $showModal = false;

    public bool $showDeleteConfirm = false;

    public bool $showChangePasswordModal = false;

    public ?int $editingId = null;

    public ?int $changePasswordUserId = null;

    public string $name = '';

    public string $username = '';

    public string $email = '';

    public string $password = '';

    public string $address = '';

    public ?int $deleteId = null;

    public string $currentPassword = '';

    public string $newPassword = '';

    public string $newPassword_confirmation = '';

    public bool $showCurrentPassword = false;

    public bool $showNewPassword = false;

    public bool $showConfirmPassword = false;

    public bool $passwordsMatch = true;

    public function render()
    {
        $users = User::paginate(10);

        return view('livewire.admin-user-manager', [
            'users' => $users,
        ]);
    }

    public function openModal(): void
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm(): void
    {
        $this->name = '';
        $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->address = '';
        $this->editingId = null;
    }

    public function edit(User $user): void
    {
        $this->editingId = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->address = $user->address ?? '';
        $this->password = '';
        $this->showModal = true;
    }

    public function save(): void
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username' . ($this->editingId ? ',' . $this->editingId : ''),
            'email' => 'required|email|unique:users,email' . ($this->editingId ? ',' . $this->editingId : ''),
            'address' => 'nullable|string|max:255',
        ]);

        if ($this->editingId) {
            $user = User::findOrFail($this->editingId);
            $data = [
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'address' => $this->address,
            ];
            // Only update password if provided
            if ($this->password) {
                $data['password'] = Hash::make($this->password);
            }
            $user->update($data);
            $this->dispatch('toast', type: 'success', message: 'User updated successfully!', position: 'bottom-right');
        } else {
            $this->validate([
                'password' => 'required|string|min:8',
            ]);

            User::create([
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'address' => $this->address,
            ]);
            $this->dispatch('toast', type: 'success', message: 'User created successfully!', position: 'bottom-right');
        }

        $this->closeModal();
    }

    public function delete(User $user): void
    {
        if (User::count() <= 1) {
            $this->dispatch('toast', type: 'error', message: 'Cannot delete the only user account in the system.', position: 'bottom-right');
            return;
        }

        $this->deleteId = $user->id;
        $this->showDeleteConfirm = true;
    }

    public function confirmDelete(): void
    {
        if (User::count() <= 1) {
            $this->cancelDelete();
            $this->dispatch('toast', type: 'error', message: 'Cannot delete the only user account in the system.', position: 'bottom-right');
            return;
        }

        $this->validate([
            'currentPassword' => 'required|string',
        ], [
            'currentPassword.required' => 'Your password is required to delete a user',
        ]);

        if (! Hash::check($this->currentPassword, auth()->user()->password)) {
            $this->addError('currentPassword', 'Password is incorrect');
            return;
        }

        if ($this->deleteId) {
            User::destroy($this->deleteId);
            $this->dispatch('toast', type: 'success', message: 'User deleted successfully!', position: 'bottom-right');
        }
        $this->cancelDelete();
    }

    public function cancelDelete(): void
    {
        $this->showDeleteConfirm = false;
        $this->deleteId = null;
        $this->currentPassword = '';
    }

    public function openChangePasswordModal(User $user): void
    {
        $this->changePasswordUserId = $user->id;
        $this->currentPassword = '';
        $this->newPassword = '';
        $this->newPassword_confirmation = '';
        $this->passwordsMatch = true;
        $this->resetValidation();
        $this->showChangePasswordModal = true;
    }

    public function closeChangePasswordModal(): void
    {
        $this->showChangePasswordModal = false;
        $this->changePasswordUserId = null;
        $this->currentPassword = '';
        $this->newPassword = '';
        $this->newPassword_confirmation = '';
        $this->passwordsMatch = true;
        $this->resetValidation();
    }

    public function changePassword(): void
    {
        $this->validate([
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string|min:8|confirmed',
        ], [
            'currentPassword.required' => 'Current password is required',
            'newPassword.required' => 'New password is required',
            'newPassword.min' => 'New password must be at least 8 characters',
            'newPassword.confirmed' => 'New passwords do not match',
        ]);

        $user = User::findOrFail($this->changePasswordUserId);

        if (! Hash::check($this->currentPassword, $user->password)) {
            $this->addError('currentPassword', 'Current password is incorrect');

            return;
        }

        $user->update(['password' => Hash::make($this->newPassword)]);
        $this->dispatch('toast', type: 'success', message: 'Password changed successfully!', position: 'bottom-right');
        $this->closeChangePasswordModal();
    }

    public function toggleCurrentPasswordVisibility(): void
    {
        $this->showCurrentPassword = ! $this->showCurrentPassword;
    }

    public function toggleNewPasswordVisibility(): void
    {
        $this->showNewPassword = ! $this->showNewPassword;
    }

    public function toggleConfirmPasswordVisibility(): void
    {
        $this->showConfirmPassword = ! $this->showConfirmPassword;
    }

    public function validateConfirmPassword(): void
    {
        $newPass = trim($this->newPassword);
        $confirmPass = trim($this->newPassword_confirmation);
        $this->passwordsMatch = $newPass === $confirmPass && $newPass !== '' && $confirmPass !== '';
    }

    public function updatedNewPassword(): void
    {
        $this->validateConfirmPassword();
    }

    public function updatedNewPasswordConfirmation(): void
    {
        $this->validateConfirmPassword();
    }
}

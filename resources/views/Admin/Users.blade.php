@extends('Layouts.Dashboard')
@section('title', 'Users Management')

@section('content')
<div class="dashboard-header">
    <h1>Users Management</h1>
    <p>Manage all user accounts and permissions</p>
</div>

<div class="users-actions">
    <button class="btn btn-primary">
        <i class="fas fa-plus"></i>
        Add New User
    </button>
    <button class="btn btn-secondary">
        <i class="fas fa-download"></i>
        Export Users
    </button>
</div>

<div class="users-table-container">
    <table class="users-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Joined</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Admin</td>
                <td><span class="status-active">Active</span></td>
                <td>2024-01-15</td>
                <td>
                    <button class="btn-sm btn-edit">Edit</button>
                    <button class="btn-sm btn-delete">Delete</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>jane@example.com</td>
                <td>User</td>
                <td><span class="status-active">Active</span></td>
                <td>2024-01-20</td>
                <td>
                    <button class="btn-sm btn-edit">Edit</button>
                    <button class="btn-sm btn-delete">Delete</button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Mike Johnson</td>
                <td>mike@example.com</td>
                <td>User</td>
                <td><span class="status-inactive">Inactive</span></td>
                <td>2024-02-01</td>
                <td>
                    <button class="btn-sm btn-edit">Edit</button>
                    <button class="btn-sm btn-delete">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="pagination">
    <span>Showing 1-3 of 3 results</span>
</div>
@endsection
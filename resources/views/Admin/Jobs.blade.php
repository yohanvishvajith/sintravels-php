@extends('Layouts.Dashboard')
@section('title', 'Jobs Management')

@push('styles')
@vite(['resources/css/jobs.css'])
@endpush

@section('content')
<div class="dashboard-header">
    <h1>Jobs Management</h1>
    <p>Manage job listings and applications</p>
</div>

@livewire('admin-job-form')

@livewire('admin-job-list')

@endsection
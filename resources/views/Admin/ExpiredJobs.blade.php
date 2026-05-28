@extends('Layouts.Dashboard')
@section('title', 'Expired Jobs')

@push('styles')
@vite(['resources/css/jobs.css'])
@endpush

@section('content')
<div class="dashboard-header">
    <h1>Expired Jobs</h1>
    <p>View and manage archived job listings</p>
</div>

@livewire('admin-expired-job-list')

{{-- Include job form so edit events can open the modal on this page --}}
@livewire('admin-job-form', ['showAddButton' => false])

@endsection
@extends('Layouts.main')
@section('content')
<div class="container-home">
    @include('Partials.home.Landing')

    @include('Partials.home.TrackRecord')

    @include('Partials.home.CareerSolution')

    @include('Partials.home.Gallery')

    <x-google-review />

    @include('Partials.home.Map')
    @include('Partials.home.JobLocations')

    @include('Partials.home.YoutubeVideo')

    @include('Partials.home.Testimonial')

    @include('Partials.home.Cta')

</div>
@endsection
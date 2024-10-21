@extends('layouts.main')
@section('header-section')
    @include('layouts.subheader')
@endsection
@section('title', 'Table ')
@section('content')
    <!-- BREADCRUMB AREA START -->
        @include('partials.breadcrumb')
    <!-- BREADCRUMB AREA END -->
   
    <section>
        <!-- Include the Livewire component -->
        <livewire:project-report />
    </section>

   
@endsection
@push('scripts')

@endpush
@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('alert:status'))
        <x-alert title="{{ session('alert:title') }}" content="{{ session('alert:content') }}" status="{{ session('alert:status') }}"></x-alert>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-dashboard header="Dashboard">
                <x-slot:title>
                    <a href="{{ route('project.create') }}" class="btn btn-primary">Tambah Project</a>
                </x-slot>
            </x-dashboard>
            <!-- Overviews -->
            <section class="d-flex justify-content-between gap-1 mt-4">
              <x-cards.overview icon="fas fa-tasks text-primary" number="{{ count($projects) }}" content="Proyek anda menunggu"></x-cards.overview>
            </section>
            <!-- Projects table -->
            <x-tables.project :projects="$projects"></x-tables.project>
        </div>
    </div>
</div>
@endsection

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
            <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Progress</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $projects as $project)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->owner }}</td>
                        <td>{{ $project->progress }}%</td>                            
                        <td>
                            <a href="{{ route('project.show', $project->id) }}" class="btn btn-primary">
                                Lihat
                            </a>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    
<div class="container">
    @if (session()->has('alert:status'))
        <x-alert title="{{ session('alert:title') }}" content="{{ session('alert:content') }}" status="{{ session('alert:status') }}"></x-alert>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-dashboard header="Project: {{ $project->name }} - {{ $project->owner }}">
                <x-slot:title>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                </x-slot>
            </x-dashboard>
            <!-- Overviews -->
            <section class="d-flex gap-2 mt-3">
                <x-cards.overview icon="fas fa-tasks" number="{{ count($tasks) }}" content="Task yang tersedia"></x-cards.overview>
                <x-cards.overview icon="fas fa-tasks" number="{{ $tasks_done }}" content="Task yang selesai"></x-cards.overview>
                <x-cards.overview icon="fas fa-tasks" number="{{ $tasks_on_progress }}" content="Task yang dalam proses"></x-cards.overview>
                <x-cards.overview icon="fas fa-tasks" number="{{ $tasks_pending }}" content="Task yang ditunda"></x-cards.overview>
            </section>
            <!-- Button add nnew task -->
            <section class="mt-3">
                <button type="button" data-bs-toggle="modal" data-bs-target="#createNewTask:modal" class="btn btn-primary">Tanbahkan Task baru</button>
            </section>
            <table class="table mt-3">
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tasks as $task)
                        <tr data-role="recorder" data-filtered="{{ $task->status }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td
                                @class([
                                "fw-normal",
                                "text-success" => $task->status == "DONE",
                                "text-primary" => $task->status == "ON PROGRESS",
                                "text-danger" => $task->status == "PENDING"
                                ])>
                                {{ $task->status }}
                            </td>
                            <td>
                                <section class="d-flex gap-1">
                                    <!-- Button trigger modal -->
                                    <button data-role="triggerButton" 
                                        data-status="{{ $task->status }}" 
                                        data-key="{{ $task->id }}"
                                        data-name="{{ $task->name }}" 
                                        data-description="{{ $task->description }}" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <!-- Button destroy --->
                                    <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="parent_id" value="{{ $project->id }}">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </section>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Update  -->
<x-modal id="staticBackdrop" title="Perbaharui Progress Task">
    <x-slot:body>
        <form method="POST" action="{{ route('task.update', $project->id) }}">
            @csrf
            @method('PUT')
            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" type="text" class="form-control" placeholder="Your task name">
            </div>
            <!-- Description -->
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" type="text" class="form-control" placeholder="Your task description"></textarea>
            </div>
            <select name="status" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option disabled value="0">--Progress sekarang</option>
                <option value="PENDING">PENDING</option>
                <option value="ON PROGRESS">ON PROGRESS</option>
                <option value="DONE">DONE</option>
            </select>
            <input type="hidden" value="" name="key">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </x-slot>
</x-modal>


<script type="text/javascript">

window.addEventListener('DOMContentLoaded', () => {

    const triggerButtons = document.querySelectorAll('[data-role=triggerButton]')
    const fields = {
        statusOptions: document.querySelectorAll('[name=status] option'),
        key: document.querySelector('[name=key]'),
        name: document.querySelector('[name=name]'),
        description: document.querySelector('[name=description]')
    }

    const setSelectedOption = opt => {
        fields.statusOptions.forEach(option => {
            if ( option.value.toLowerCase() === opt.toLowerCase() ) option.setAttribute('selected', true)
        })
    }

    triggerButtons.forEach(btn => {
      btn.addEventListener('click', e => {
        const data = btn.dataset
        console.log(data)
        fields.key.value = data.key
        fields.name.value = data.name 
        fields.description.value = data.description
        setSelectedOption(data.status)
      })  
    })
})


</script>
@endsection
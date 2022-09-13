@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-dashboard header="Form Tambah Project">
                <x-slot:title>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                </x-slot>
            </x-dashboard>

            <form class="mt-3" action="{{ route('project.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Project Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Type your project here" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Owner</label>
                    <input type="text" name="owner" class="form-control" placeholder="Type your owner name here" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Leader ID</label>
                    <input type="number" value="{{ $leader_id }}" readonly name="leader_id" class="form-control" placeholder="Type your leader ID here" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Progress</label>
                    <input type="number" name="progress" class="form-control" placeholder="Type your progress here" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deadline</label>
                    <input type="date" name="deadline" class="form-control" placeholder="Choose your deadline here" required>
                </div>
                <div class="form-floating">
                    <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                    <label for="floatingTextarea2">Description</label>
                </div>
                <section class="mt-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn">Reset</button>
                </section>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

<section class="container">
    <section class="row justify-content-center">
        <section class="col-md-8">
            <x-dashboard header="Daftar Seluruh Project">
                <x-slot:title>
                </x-slot>
            </x-dashboard>
            <!-- Project Table -->
            <x-tables.project :projects="$projects"></x-tables.project>
        </section>
    </section>
</section>

@endsection

<div class="card">
    <div class="card-header">{{ $header }}</div>

    <div class="card-body d-flex justify-content-between items-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ 'Selamat datang, '.$username }}
        {{ $slot }} {{ $title }}
    </div>
</div>
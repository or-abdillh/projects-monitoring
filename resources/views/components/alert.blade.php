<div {{ $attributes->merge(['class' => 'alert alert-dismissible fade show alert-'.$status]) }} role="alert">
    <strong>{{ $title }}</strong> {{ $content}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
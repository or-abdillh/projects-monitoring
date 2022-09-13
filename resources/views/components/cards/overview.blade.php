<section class="flex-fill">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title d-flex align-items-center gap-2 mb-2 fs-2">
            <i {{ $attributes->merge(["class" => 'text-primary '.$icon]) }}></i>
            <p class="mb-0 fw-semibold text-primary">{{ $number }}</p>
          </h5>
          <p class="card-text">{{ $content }}</p>
        </div>
    </div>
</section>
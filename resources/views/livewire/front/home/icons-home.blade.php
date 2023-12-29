<div class="row mt-5">
    <div class="col">
        <div class="d-flex justify-content-between">
            @foreach ($icons as $icon)
                <div class="col-md-2 d-flex flex-column justify-content-start  align-items-center">
                    <a href="{{ $icon->link }}" class=" d-flex justify-content-center align-items-center mb-3 icons-menu">
                        <i class="fas fa-{{ $icon->icon }}"></i>
                    </a>
                    <p class="text-center">{{ $icon->title }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

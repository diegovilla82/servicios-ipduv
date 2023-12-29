<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $page->title }}</h2>
            @if ($page->image)
                <img src="{{ asset($page->image) }}" alt="" class="w-100">
            @endif
            <hr>
            <p>
                {!! $page->content  !!}
            </p>
        </div>
    </div>
</div>

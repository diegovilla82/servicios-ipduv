<div class="container py-4">
    <div class="row">
        <div class="col col-md-8">
            <h1>{{ $article->title }}</h1>
            <small class="text-muted"><i class="far fa-calendar-alt"></i> {{ $article->created_at->format('d-m-Y') }} - {{ $article->resumen }}</small>
            <img src="{{ asset($article->photo) }}" class="w-100 my-3">
            <p>{!! $article->content !!}</p>
        </div>
        <div class="col col-md-4">
            <h4>Más Noticias</h4>
            <hr>
            @foreach ($more_articles as $article)
            <a href="{{ route('articles.show', $article->id) }}">
                <div class="d-flex align-items-start">
                    <img src="{{ asset($article->photo )}}" class="more-article-thumbail mr-2">
                    <strong>{{ $article->title }}</strong>
                </div>
            </a>
            <hr>
            @endforeach
        </div>
    </div>
</div>

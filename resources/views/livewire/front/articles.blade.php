<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Noticias <hr></h3>
        </div>
    </div>
    @foreach ($articles as $article)
    <div class="row">
        <div class="col-md-12 d-flex ">
            <img src="{{ $article->photo }}" class="article-photo-thumbail">
            <div class="d-flex flex-column justify-content-between pl-3 pb-3 w-100">
                <div>
                    <h4>{{ $article->title }}</h4>
                    <small>{{ $article->resumen }}</small>
                </div>
                <div class="d-flex justify-content-between">
                    <small class="text-muted"><i class="far fa-calendar-alt"></i> {{ $article->created_at->format('d-m-Y') }}</small>
                    <a href="{{ route('articles.show', $article->id) }}">ver noticia <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            
        </div>
    </div>
    @if (!$loop->last)
        <hr>
    @endif
    @endforeach
    <div class="row">
        <div class="col-md-12 mt-3">
            {{ $articles->links() }}
        </div>
    </div>
</div>

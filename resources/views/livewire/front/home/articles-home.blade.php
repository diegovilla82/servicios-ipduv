<div class="mt-5">
    <h2>Ultimas Noticias <hr></h2>
    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-3">
                <img src="{{ asset($article->photo) }}" class="article-thumbail mb-3">
                <h4>{{ $article->title }}</h4>
                <p class="text-muted">{{ $article->resumen }}</p>
                <a href="" class="text-muted text-right">Ver mas</a>
            </div>
        @endforeach
    </div>
</div>

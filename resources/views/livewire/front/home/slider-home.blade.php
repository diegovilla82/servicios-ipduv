<div id="sliders-{{ $sliders->count() }}" class="carousel slide mt-5" data-ride="carousel">
  <div class="carousel-inner">
    @foreach ($sliders as $slider) 
    <div class="carousel-item @if($loop->first) active @endif">
        <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="{{ $slider->title }}">
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#sliders-{{ $sliders->count() }}" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#sliders-{{ $sliders->count() }}" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>

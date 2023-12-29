<ul class="navbar-nav">
    @foreach ($menus as $menu )

        @if ($menu->pages->count() > 0)
            <x-front.menu-dropdown 
                :title="$menu->title" 
                :key="$loop->index"
                :pages="$menu->pages"
                active="pagina"
            />
        @else
            @if ($menu->link)
                <x-front.menu-item
                    :title="$menu->title"
                    :link="$menu->link"
                    :target="$menu->target"
                />
            @endif
        @endif
    @endforeach
</ul>

<!-- resources/views/components/frontend/navbar.blade.php -->
<nav class="navbar">
    <ul class="navbar-nav">
        @foreach($menus as $menu)
        <li class="nav-item">
            <a href="{{ $menu->link }}" class="nav-link">
                @if($menu->icon_svg)
                {!! $menu->icon_svg !!}
                @endif
                <span>{{ $menu->name }}</span>
            </a>

            @if($menu->children->count())
            <ul class="submenu">
                @foreach($menu->children as $child)
                <li>
                    <a href="{{ $child->link }}">
                        @if($child->icon_svg)
                        {!! $child->icon_svg !!}
                        @endif
                        {{ $child->name }}
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach
    </ul>
</nav>
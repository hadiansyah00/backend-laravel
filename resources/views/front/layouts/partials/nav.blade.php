<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="/" class="flex items-center">
                <x-application-logo class="h-10" />
            </a>

            <!-- Menu Items -->
            <div class="hidden md:flex space-x-8">
                @foreach($menus as $menu)
                @if($menu->children->count())
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="nav-link">
                        {{ $menu->name }} ▼
                    </button>
                    <div x-show="open" class="absolute z-10 mt-2 w-48">
                        @foreach($menu->children as $child)
                        <a href="{{ $child->url }}" class="dropdown-item">
                            {{ $child->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
                @else
                <a href="{{ $menu->url }}" class="nav-link">
                    {{ $menu->name }}
                </a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</nav>
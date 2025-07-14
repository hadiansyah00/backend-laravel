<nav class="bg-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <!-- Logo -->
            <div class="flex items-center py-4">
                <x-application-logo class="h-8 w-auto" />
            </div>

            <!-- Dynamic Menu -->
            <div class="hidden md:flex items-center space-x-1">
                @foreach($menus->whereNull('parent_id') as $menu)
                @if($menu->children->count())
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="px-3 py-2 hover:text-blue-600 flex items-center">
                        {{ $menu->name }}
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false"
                        class="absolute z-10 mt-2 w-48 bg-white shadow-lg rounded-md py-1">
                        @foreach($menu->children as $child)
                        <a href="{{ $child->url ?? route('page.show', $child->slug) }}"
                            class="block px-4 py-2 hover:bg-gray-100">
                            {{ $child->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
                @else
                <a href="{{ $menu->url ?? route('page.show', $menu->slug) }}" class="px-3 py-2 hover:text-blue-600">
                    {{ $menu->name }}
                </a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</nav>
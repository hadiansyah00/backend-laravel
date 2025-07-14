<!-- resources/views/front/layouts/partials/header.blade.php -->
<header class="bg-white shadow-sm">
    <div class="container flex items-center justify-between px-4 py-4 mx-auto">
        <div class="logo">
            <a href="/" class="text-2xl font-bold">{{ config('app.name') }}</a>
        </div>

        <!-- Desktop Menu -->
        <nav class="hidden md:block">
            <ul class="flex space-x-8">
                @foreach($menus as $menu)
                <li class="relative group">
                    <a href="{{ $menu->link }}"
                        class="flex items-center px-1 py-2 text-gray-700 transition hover:text-primary-500">
                        @if($menu->icon_svg)
                        <span class="mr-2">{!! $menu->icon_svg !!}</span>
                        @endif
                        {{ $menu->name }}
                    </a>

                    @if($menu->children->count())
                    <ul
                        class="absolute left-0 z-10 hidden w-48 py-1 mt-2 bg-white rounded-md shadow-lg group-hover:block">
                        @foreach($menu->children as $child)
                        <li>
                            <a href="{{ $child->link }}"
                                class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                                @if($child->icon_svg)
                                <span class="mr-2">{!! $child->icon_svg !!}</span>
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

        <!-- Mobile Menu Button -->
        <button class="md:hidden focus:outline-none" id="mobile-menu-button">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="hidden bg-white shadow-md md:hidden" id="mobile-menu">
        <ul class="px-2 pt-2 pb-4 space-y-1">
            @foreach($menus as $menu)
            <li class="relative">
                <a href="{{ $menu->link }}"
                    class="flex items-center px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:bg-gray-100">
                    @if($menu->icon_svg)
                    <span class="mr-2">{!! $menu->icon_svg !!}</span>
                    @endif
                    {{ $menu->name }}
                </a>

                @if($menu->children->count())
                <ul class="pl-4 mt-1 space-y-1">
                    @foreach($menu->children as $child)
                    <li>
                        <a href="{{ $child->link }}"
                            class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-50">
                            @if($child->icon_svg)
                            <span class="mr-2">{!! $child->icon_svg !!}</span>
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
    </div>
</header>
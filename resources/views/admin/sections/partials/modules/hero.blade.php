<section class="relative bg-cover bg-center h-96"
    style="background-image: url('{{ $data['image_url'] ?? '/default-hero.jpg' }}')">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="container mx-auto relative z-10 h-full flex items-center">
        <div class="max-w-2xl text-white">
            <h1 class="text-5xl font-bold mb-4">{{ $data['title'] ?? 'Welcome' }}</h1>
            <p class="text-xl mb-6">{{ $data['subtitle'] ?? '' }}</p>
            @if($data['button_text'] ?? false)
            <a href="{{ $data['button_url'] ?? '#' }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg inline-block">
                {{ $data['button_text'] }}
            </a>
            @endif
        </div>
    </div>
</section>
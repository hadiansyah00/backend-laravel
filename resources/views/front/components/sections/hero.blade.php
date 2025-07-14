<section class="relative h-[500px] bg-cover bg-center"
    style="background-image: url('{{ $data['image'] ?? '/default-hero.jpg' }}')">
    <div class="absolute inset-0 bg-black/30"></div>

    <div class="container mx-auto relative z-10 h-full flex items-center">
        <div class="max-w-2xl text-white">
            <h1 class="text-5xl font-bold mb-4">
                {{ $data['title'] ?? 'Default Title' }}
            </h1>

            @if($data['button_text'] ?? false)
            <a href="{{ $data['button_url'] ?? '#' }}" class="btn-primary">
                {{ $data['button_text'] }}
            </a>
            @endif
        </div>
    </div>
</section>
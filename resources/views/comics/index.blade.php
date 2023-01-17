<x-app-layout>
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="{{ url('storage/portada/image.jpg') }}" class="h-96 w-full object-center object-cover"
                    loading="lazy" />
            </div>
            <div class="swiper-slide">
                <img src="{{ url('storage/portada/image3.jpg') }}" class="h-96 w-full object-center object-cover"
                    loading="lazy" />
            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-scrollbar"></div>

    @livewire('comic.comic-index')

    <x-footer />
    @push('swiper')
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swiper', {
                direction: 'horizontal',
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },

                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        </script>
    @endpush
</x-app-layout>

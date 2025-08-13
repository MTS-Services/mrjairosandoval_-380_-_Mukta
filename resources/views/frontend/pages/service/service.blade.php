<x-frontend::layout>
    <x-slot name="title">About</x-slot>
    <x-slot name="page_slug">About</x-slot>

     <!-- Hero Section -->
    <section class="relative" id="hero-section">
        <img src="{{ asset('frontend/assetes/image/car2.png') }}" alt="Luxury Car" class="w-full h-[40vh] lg:h-[70vh]   object-cover">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4">
            <h1 class="lg:text-6xl sm:text-4xl text-2xl md:text-4xl font-bold leading-snug ">
                Services
            </h1>

            <p class="text-sm sm:text-base mt-2 text-[#E5E3E3] ">Omertà Applied..</p>
            <p class="text-sm sm:text-base mt-2 text-[#E5E3E3] ">Our services are designed not to impress the world —
                but to
                serve yours..</p>

        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section bg-black">
        <div class="container mx-auto pt-4 px-20 lg:py-16 flex flex-col justify-between ">
            <!-- 3 Column Info -->
            <section class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-8 mb-24">
                <div class="text-center rounded-xl p-16 bg-black/20 ring-1 ring-[#d4a75f]">
                    <img class="mx-auto mb-4" src="{{ asset('frontend/assetes/image/image 83.png') }}" alt="">
                    <h3 class="text-xl sm:text-2xl">TRAVEL</h3>
                    <p class="text-sm sm:text-base mt-2 text-[#E5E3E3] ">Private jets, untraceable..</p>
                </div>

                <div class="text-center rounded-xl p-16 bg-black/20 ring-1 ring-[#d4a75f]">
                    <img class="mx-auto mb-4" src="{{ asset('frontend/assetes/image/image 84.png') }}" alt="">
                    <h3 class="text-xl sm:text-2xl">DINING</h3>
                    <p class="text-sm sm:text-base mt-2 text-[#E5E3E3] ">Custom tasting menus without limits...</p>
                </div>

                <div class="text-center rounded-xl p-16 bg-black/20 ring-1 ring-[#d4a75f]">
                    <img class="mx-auto mb-4" src="{{ asset('frontend/assetes/image/image 85.png') }}" alt="">
                    <h3 class="lg:text-2xl sm:text-2xl">COMPANIONSHIP</h3>
                    <p class="text-sm sm:text-base mt-2 text-[#E5E3E3] ">Discreet, refined, unforgettable...</p>
                </div>


                <div class="text-center rounded-xl p-16 bg-black/20 ring-1 ring-[#d4a75f]">
                    <img class="mx-auto mb-4" src="{{ asset('frontend/assetes/image/image 86.png') }}" alt="">
                    <h3 class="text-xl sm:text-2xl">PROPERTY ACCESS</h3>
                    <p class="text-sm sm:text-base mt-2 text-[#E5E3E3] ">Historic villas, secret estates...</p>
                </div>

                <div class="text-center rounded-xl p-16 bg-black/20 ring-1 ring-[#d4a75f]">
                    <img class="mx-auto mb-4" src="{{ asset('frontend/assetes/image/image 87.png') }}" alt="">
                    <h3 class="text-xl sm:text-2xl">EVENTS</h3>
                    <p class="text-sm sm:text-base mt-2 text-[#E5E3E3] ">Masked affairs, tailored rituals...</p>
                </div>



            </section>

            <!-- CTA -->
            <section class="text-center lg:mb-24" id="cta-section">
                <h2 class="text-1xl sm:text-2xl mb-4 tracking-wide">"Taste is measured in refusals, not acquisitions."
                </h2>
            </section>

        </div>
    </section>

</x-frontend::layout>
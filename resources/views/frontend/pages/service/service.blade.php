<x-frontend::layout>
    <x-slot name="title">About</x-slot>
    <x-slot name="page_slug">About</x-slot>

    <!-- Hero Section -->
    <section class="relative h-[45vh] bg-black " id="hero-section">

        <div class="absolute inset-0 bg-black/50"></div>
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4">
            <h1 class="lg:text-6xl sm:text-4xl text-2xl md:text-4xl leading-snug ">
                Services
            </h1>

            <p class="text-sm sm:text-base my-4 text-[#E5E3E3] ">Omertà Applied..</p>
            <p class="text-sm sm:text-base mt-2 text-[#E5E3E3] ">Our services are designed not to impress the world —
                but to
                serve yours..</p>

        </div>
    </section>


    <!-- Content Section -->
    <section class="content-section bg-black lg:-mt-[60px]">
        <div class="container mx-auto pt-4 px-20 lg:py-16 flex flex-col justify-between">

            @php
                $firstThree = $services->take(3);
                $remaining = $services->skip(3);
            @endphp

            {{-- First 3 services --}}
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-10">
                @forelse($firstThree as $service)
                    <div class="text-center rounded-xl p-16 bg-black/20 ring-1 ring-[#d4a75f]">
                        <h3 class="text-xl sm:text-2xl ">{{ $service->title }}</h3>
                        <p class="text-sm sm:text-base mt-2 text-[#E5E3E3]">{{ $service->sub_title }}</p>
                    </div>
                @empty
                    <p class="text-white">No services available.</p>
                @endforelse
            </section>

            {{-- Remaining services --}}
            @if ($remaining->count() > 0)
                <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 pb-40">
                    @foreach ($remaining as $service)
                        <div class="text-center rounded-xl p-16 bg-black/20 ring-1 ring-[#d4a75f]">
                            <h3 class="text-xl sm:text-2xl">{{ strtoupper($service->title) }}</h3>
                            <p class="text-sm sm:text-base mt-2 text-[#E5E3E3]">{{ $service->sub_title }}</p>
                        </div>
                    @endforeach
                </section>
            @endif

            {{-- CTA --}}
            <section class="text-center lg:m-20" id="cta-section">
                <h2 class="text-1xl sm:text-2xl tracking-wide">
                    "Taste is measured in refusals, not acquisitions."
                </h2>
            </section>

        </div>
    </section>


</x-frontend::layout>

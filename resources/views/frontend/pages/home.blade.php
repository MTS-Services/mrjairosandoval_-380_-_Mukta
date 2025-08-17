<x-frontend::layout>
    <x-slot name="title">Home</x-slot>
    <x-slot name="page_slug">home</x-slot>

    <!-- Hero Section -->
    {{-- <section class="relative bg-black " id="hero-section">
        <img class="" src="{{ asset('frontend/assetes/image/car2.png') }}" alt="Luxury Car">
        <div class="absolute inset-0 bg-black/50 "></div>


        <div class="absolute inset-0 flex flex-col justify-center items-center text-center ">
            <h1 class="lg:text-6xl sm:text-4xl text-xl md:text-4xl font-bold leading-24! max-w-6xl mx-auto">
                CERTAIN DOORS DON’T APPEAR UNTIL YOU’RE READY TO KNOCK.
            </h1>

            <buttonF
                class="mt-6 bg-[#caa36b] text-[#7D0A0A] px-6 py-3 rounded-md hover:bg-[#b58d57] transition text-sm sm:text-base">
                Enter the Atrium
                </button>
        </div>
    </section> --}}

    <!-- Hero Section -->
    {{-- <section class="relative bg-black h-screen w-full" id="hero-section">
        <!-- Background image -->
        <img class="absolute inset-0 w-full h-full object-center" src="{{ asset('frontend/assetes/image/car2.png') }}"
            alt="Luxury Car">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-[#0000001f]"></div>

        <!-- Content -->
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center ">
            <h1 class="lg:text-6xl sm:text-4xl text-xl md:text-4xl font-bold leading-24! max-w-6xl mx-auto ">
                CERTAIN DOORS DON’T APPEAR UNTIL YOU’RE READY TO KNOCK.
            </h1>

            <button
                class="mt-1Hey, Cortana. Hey, Cortana. 6 bg-[#caa36b] text-[#7D0A0A] px-6 py-3 rounded-md hover:bg-[#b58d57] transition text-sm sm:text-base font-semibold">
                Enter the Atrium
            </button>
        </div>
    </section> --}}

    <!-- Hero Section -->
    <section class="relative bg-black h-screen w-full" id="hero-section">
        <!-- Background image -->
        <!--
      We added 'object-cover' to ensure the image always fills the entire container,
      preventing any empty space on different screen sizes and aspect ratios.
    -->
        {{-- <img class="absolute inset-0 w-full h-full object-cover object-center" src="{{ $home->modified_image }}"
            alt="Luxury Car"> --}}

        <img class="absolute inset-0 w-full h-full object-cover object-center"
            src="{{ asset('frontend/assetes/image/car2.png') }}" alt="Luxury Car">



        <!-- Overlay -->
        <!-- The semi-transparent overlay remains to ensure the text is readable. -->
        <div class="absolute inset-0 bg-[#0000001f]"></div>

        <!-- Content -->
        <!--
      We added 'p-4' for padding on all sides. This ensures the text and button
      don't touch the edges of the screen on smaller devices.
    -->
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center p-4 text-white">
            <!--
          The heading now uses a smoother responsive font size scale:
          text-3xl (mobile) -> sm:text-4xl (small screens) -> md:text-5xl (medium) -> lg:text-6xl (large)
          We also replaced 'leading-24!' with the standard 'leading-tight' for better readability.
        -->
            {{-- <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight max-w-7xl mx-auto">
                CERTAIN DOORS DON’T APPEAR UNTIL YOU’RE READY TO KNOCK.
            </h1> --}}

            @foreach ($home as $item)
                <h1
                    class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-[1.4] max-w-7xl mx-auto text-center">
                    {{ $item->title }}
                </h1>
            @endforeach ()

            <!--
          The button's top margin is now responsive. It's 'mt-8' on mobile and scales
          up to 'sm:mt-12' and 'lg:mt-16' on larger screens for better visual balance.
        -->
            <a href="#cta-section"
                class="mt-8 sm:mt-12 lg:mt-16 bg-[#caa36b] text-[#7D0A0A] px-6 py-3 rounded-md hover:bg-[#b58d57] transition text-sm sm:text-base font-semibold">
                Enter the Atrium
            </a>
        </div>
    </section>


    <!-- Content Section -->
    <section class="content-section bg-black pt-10" #cta-section>
        <div class="container mx-auto px-4 py-4 lg:py-[150px] flex flex-col justify-between">
            <!-- 3 Column Info -->
            <section class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-8 mb-24">
                <div class="text-center rounded-xl py-4 px-10 bg-black/20 ring-1 ring-[#d4a75f]">
                    <img class="mx-auto p-4" src="{{ asset('frontend/assetes/image/Line 1.png') }}" alt="">

                    <h3 class="text-xl sm:text-2xl p-4"></h3>

                    <p class="text-sm sm:text-base mt-2 text-white pb-6">A secret
                        society of elite tastes, where discernment
                        meets
                        discretion and excellence is the only currency.</p>
                </div>

                <div class="text-center rounded-xl py-4 px-10 bg-black/20 ring-1 ring-[#d4a75f]">
                    <img class="mx-auto p-4" src="{{ asset('frontend/assetes/image/Line 1.png') }}" alt="">
                    <h3 class="text-xl sm:text-2xl p-4">WHAT WE OFFER</h3>
                    <p class="text-sm sm:text-base mt-2 text-white pb-6">Privacy, pleasure, and legacy. An experience
                        curated
                        for those
                        who understand that true luxury lies in the unseen.</p>
                </div>

                <div class="text-center rounded-xl py-4 px-10 bg-black/20 ring-1 ring-[#d4a75f]">
                    <img class="mx-auto p-4" src="{{ asset('frontend/assetes/image/Line 1.png') }}" alt="">
                    <h3 class="text-xl sm:text-2xl p-4">THE PROMISE</h3>
                    <p class="text-sm sm:text-base mt-2 text-white pb-6">Access to a world where every detail is
                        considered,
                        every
                        moment is crafted, and every experience is extraordinary.</p>
                </div>

            </section>

            <!-- CTA -->
            <section class="text-center lg:mt-35" id="cta-section">
                <h2 class="text-2xl sm:text-4xl mb-4 tracking-wide">ARE YOU READY TO
                    STEP
                    THROUGH?
                </h2>

                <p class="m-8 text-sm sm:text-base">Membership is by invitation only. Submit your
                    consideration and await our response.</p>

                <a href="#hero-section"
                    class="btn-gold font-sans rounded-lg px-6 sm:px-10 py-3 sm:py-4 text-sm sm:text-base text-[#7D0A0A] bg-[#caa36b] hover:bg-[#b58d57] transition">
                    SUBMIT FOR CONSIDERATION
                </a>

            </section>
        </div>
    </section>



</x-frontend::layout>

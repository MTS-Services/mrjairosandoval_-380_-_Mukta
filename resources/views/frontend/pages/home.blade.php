<x-frontend::layout>
    <x-slot name="title">Home</x-slot>
    <x-slot name="page_slug">home</x-slot>
    <!-- Hero Section -->
    <section class="relative bg-black" id="hero-section">
        <img src="{{ asset('frontend/assetes/image/car2.png') }}" alt="Luxury Car" class="w-full h-[40vh] lg:h-[70vh]   object-cover">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4">
            <h1 class="lg:text-6xl sm:text-4xl text-2xl md:text-4xl font-bold leading-snug ">
                CERTAIN DOORS DON’T APPEAR <br class="hidden sm:block"> UNTIL YOU’RE READY TO KNOCK.
            </h1>
            <button
                class="mt-6 bg-[#caa36b] text-[#7D0A0A] px-6 py-3 rounded-md hover:bg-[#b58d57] transition text-sm sm:text-base">
                Enter the Atrium
            </button>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section bg-black">
        <div class="container mx-auto px-4 py-4 lg:py-16 flex flex-col justify-between">
            <!-- 3 Column Info -->
            <section class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-8 mb-24">
                <div class="text-center rounded-xl p-16 bg-black/20 ring-1 ring-[#d4a75f]">
                    <img class="mx-auto mb-4" src="{{ asset('frontend/assetes/image/Line 1.png') }}" alt="">
                    <h3 class="text-xl sm:text-2xl">WHO WE ARE</h3>
                    <p class="text-sm sm:text-base mt-2 text-white ">A secret
                        society of elite tastes, where discernment
                        meets
                        discretion and excellence is the only currency.</p>
                </div>

                <div class="text-center rounded-xl p-16 bg-black/20 ring-1 ring-[#d4a75f]">
                    <img class="mx-auto mb-4" src="{{ asset('frontend/assetes/image/Line 1.png') }}" alt="">
                    <h3 class="text-xl sm:text-2xl ">WHAT WE OFFER</h3>
                    <p class="text-sm sm:text-base mt-2 text-white">Privacy, pleasure, and legacy. An experience curated
                        for those
                        who understand that true luxury lies in the unseen.</p>
                </div>
                <div class="text-center rounded-xl p-16 bg-black/20 ring-1 ring-[#d4a75f]">
                    <img class="mx-auto mb-4" src="{{ asset('frontend/assetes/image/Line 1.png') }}" alt="">
                    <h3 class="text-xl sm:text-2xl ">THE PROMISE</h3>
                    <p class="text-sm sm:text-base mt-2 text-white">Access to a world where every detail is considered,
                        every
                        moment is crafted, and every experience is extraordinary.</p>
                </div>
            </section>

            <!-- CTA -->
            <section class="text-center lg:mb-24" id="cta-section">
                <h2 class="text-2xl sm:text-4xl mb-4 tracking-wide">ARE YOU READY TO
                    STEP
                    THROUGH?
                </h2>
                <p class=" mb-8 text-sm sm:text-base">Membership is by invitation only. Submit your
                    consideration and await our response.</p>
                <button
                    class="btn-gold font-sans rounded-lg px-6 sm:px-10 py-3 sm:py-4 text-sm sm:text-base bg-[#caa36b] hover:bg-[#b58d57] transition">
                    SUBMIT FOR CONSIDERATION
                </button>
            </section>

          
        </div>
    </section>



</x-frontend::layout>
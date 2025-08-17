<x-frontend::layout>
    <x-slot name="title">Membership</x-slot>
    <x-slot name="page_slug">Membership</x-slot>

    <!-- CTA -->
    <div class="bg-black">
        <!-- CTA -->
        <section class="text-center mt-44" id="cta-section ">
            <h2 class="text-2xl  pb-36 lg:pb-6 mb-20 sm:text-4xl tracking-wide text-[#d4a75f]"> Not all appetites are
                equal. Our
                tiers
                reflect this.
            </h2>
        </section>

        <!-- Content Section -->
        <section class="content-section ">
            <div class="container mx-auto flex flex-col justify-between">
                <!-- 3 Column Info -->

                <section class="  text-white  flex items-center justify-center ">

                    <div
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-7xl mx-auto p-10 lg:p-0">
                        @foreach ($memberShips as $memberShip)
                            <div
                                class="relative bg-[#0a0a0a] border border-[#caa36b] rounded-2xl p-8 flex flex-col justify-between shadow-lg transition-transform duration-300 sm:p-8 ">
                                <h2 class="text-[#caa36b] font-serif text-3xl uppercase tracking-wide mb-4 ">
                                    {{ $memberShip->name }}</h2>
                                @if ($memberShip->tag)
                                    <span
                                        class="lg:mr-60 top-4 p-2 right-2 bg-[#caa36b] text-[#7D0A0A] uppercase font-serif text-xs   rounded-full font-bold">{{ $memberShip->tag }}</span>
                                @endif
                                <hr class="border-gray-700 my-4">
                                <ul class="text-gray-300 font-light pt-8 space-y-4 text-left">
                                    <li class="pl-4 relative">
                                        <span class="absolute left-0 top-0 text-[#caa36b] text-xl">•</span>
                                        24/7 Shadow Concierge
                                    </li>
                                    <li class="pl-4 relative">
                                        <span class="absolute left-0 top-0 text-[#caa36b] text-xl">•</span>
                                        Use of Medici Villas
                                    </li>
                                    <li class="pl-4 relative">
                                        <span class="absolute left-0 top-0 text-[#caa36b] text-xl">•</span>
                                        Black Book Access
                                    </li>
                                </ul>
                                <a href="#cta-section"
                                    class="mt-8 w-full bg-[#caa36b] text-[#7D0A0A] py-3 rounded-xl transition hover:bg-[#b18e55] font-semibold text-lg uppercase tracking-wider shadow-md mb-[100px]">
                                    Get Stated
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>

                <section class="text-center -mt-40" id="cta-section">
                    <h2 class="text-1xl sm:text-2xl   tracking-wide">Submit for Consideration
                    </h2>
                    <p class="m-8 text-sm sm:text-base text-[#E5E3E3]">Auto-purge form. 12-hour expiry.</p>
                </section>


                <div class="text-center p-50" id="cta-section">
                    <h4 class="text-1xl text-[#C19A6B] sm:text-2xl mb-4 tracking-wide">Request
                        Invitation
                    </h4>
                </div>

                <section class="mb-30 " id="membership-bottom">
                    <h1 class="lg:text-4xl text-2xl text-center">"The family has eyes. But never a voice."</h1>
                </section>
            </div>

</x-frontend::layout>

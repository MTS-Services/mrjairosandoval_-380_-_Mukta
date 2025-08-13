<x-frontend::layout>
    <x-slot name="title">Membership</x-slot>
    <x-slot name="page_slug">Membership</x-slot>

   <!-- CTA -->
  <!-- CTA -->
    <section class="text-center pt-44  text-white  " id="cta-section ">
        <h2 class="text-2xl sm:text-4xl tracking-wide text-[#d4a75f]"> Not all appetites are equal. Our tiers
            reflect this.
        </h2>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container mx-auto flex flex-col justify-between">
            <!-- 3 Column Info -->

            <section class="bg-black text-white min-h-screen flex items-center justify-center">
                <!-- This container is the main grid for the cards. -->
                <!-- It uses a single column on small screens and automatically adjusts to two or three columns on larger screens. -->
                <!-- The `gap-8` provides consistent spacing between the cards on all screen sizes. -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-7xl mx-auto p-10 lg:p-0">
                    <!-- Card 1 -->
                    <div
                        class="relative bg-[#0a0a0a] border border-[#caa36b] rounded-2xl p-8 flex flex-col justify-between shadow-lg transition-transform duration-300 sm:p-10">
                        <h2 class="text-[#caa36b] font-serif text-3xl uppercase tracking-wide mb-4">Bambino Viziato</h2>
                        <hr class="border-gray-700 my-4">
                        <ul class="text-gray-300 font-light pt-8 space-y-4 text-left">
                            <li class="pl-4 relative">
                                <span class="absolute left-0 top-0 text-[#caa36b] text-xl">•</span>
                                Priority access
                            </li>
                            <li class="pl-4 relative">
                                <span class="absolute left-0 top-0 text-[#caa36b] text-xl">•</span>
                                Basic companionship clearance
                            </li>
                            <li class="pl-4 relative">
                                <span class="absolute left-0 top-0 text-[#caa36b] text-xl">•</span>
                                Quarterly temptation dossiers
                            </li>
                        </ul>
                        <button
                            class="mt-8 w-full bg-[#caa36b] text-[#7D0A0A] py-3 rounded-xl transition hover:bg-[#b18e55] font-semibold text-lg uppercase tracking-wider shadow-md mb-[100px]">
                            Get Stated
                        </button>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="relative bg-[#0a0a0a] border border-[#caa36b] rounded-2xl p-8 flex flex-col justify-between shadow-lg transition-transform duration-300 sm:p-10 ">
                        <h2 class="text-[#caa36b] font-serif text-3xl uppercase tracking-wide mb-4 ">Cavalieri Premier
                        </h2>
                        <span
                            class="lg:mr-60 top-4 p-2 right-2 bg-[#caa36b] text-[#7D0A0A] uppercase font-serif text-xs   rounded-full font-bold">Premier</span>
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
                        <button
                            class="mt-8 w-full bg-[#caa36b] text-[#7D0A0A] py-3 rounded-xl transition hover:bg-[#b18e55] font-semibold text-lg uppercase tracking-wider shadow-md mb-[100px]">
                            Get Stated
                        </button>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="relative bg-[#0a0a0a] border border-[#caa36b] rounded-2xl p-8 flex flex-col justify-between shadow-lg transition-transform duration-300 sm:p-8">

                        <h2 class="text-[#caa36b] font-serif text-3xl uppercase tracking-wide mb-4">Cavalieri Ottimale
                        </h2>
                        <span
                            class="lg:mr-60 top-4 p-2 right-2 bg-[#caa36b] text-[#7D0A0A] uppercase font-serif text-xs   rounded-full font-bold">Premier</span>
                        <hr class="border-gray-700 my-4">
                        <ul class="text-gray-300 font-light pt-8 space-y-4 text-left">
                            <li class="pl-4 relative">
                                <span class="absolute left-0 top-0 text-[#caa36b] text-xl">•</span>
                                Custom fantasy architecture
                            </li>
                            <li class="pl-4 relative">
                                <span class="absolute left-0 top-0 text-[#caa36b] text-xl">•</span>
                                Nero Protocol (digital physical erasure)
                            </li>
                            <li class="pl-4 relative">
                                <span class="absolute left-0 top-0 text-[#caa36b] text-xl">•</span>
                                Bloodline Perpetuity
                            </li>
                        </ul>
                        <button
                            class="mt-8  w-full bg-[#caa36b] text-[#7D0A0A] py-3 rounded-xl transition hover:bg-[#b18e55] font-semibold text-lg uppercase tracking-wider shadow-md mb-[100px]">
                            Get Stated
                        </button>
                    </div>
                </div>
            </section>

            <section class="text-center lg:mb-24" id="cta-section">
                <h2 class="text-1xl sm:text-2xl mb-4 tracking-wide">Submit for Consideration
                </h2>
                <p class="mb-8 text-sm sm:text-base text-[#E5E3E3]">Auto-purge form. 12-hour expiry.</p>
            </section>


            <div class="text-center lg:mt-24" id="cta-section">
                <h4 class="text-1xl text-[#C19A6B] sm:text-2xl mb-4 tracking-wide">Request
                    Invitation
                </h4>
            </div>

            <section class="lg:mt-40 mt-20" id="membership-bottom">
                <h1 class="lg:text-4xl text-2xl text-center">"The family has eyes. But never a voice."</h1>
            </section>

</x-frontend::layout>

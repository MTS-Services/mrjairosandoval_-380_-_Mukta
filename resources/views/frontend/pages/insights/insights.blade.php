<x-frontend::layout>
    <x-slot name="title">Membership</x-slot>
    <x-slot name="page_slug">Membership</x-slot>

     <section class="bg-black text-white font-serif">
        <!-- Main Container -->
        <div class="max-w-7xl mx-auto px-6 py-12">
            <!-- Title -->
            <h1
                class="text-center text-4xl font-(family-name:--font-family-base) md:text-5xl text-[#c4a76a] font-semibold tracking-wide m-6">
                THE UNWRITTEN CHRONICLES
            </h1>
            <p class="font-(family-name:--font-family-secondary) text-center text-gray-300 m-12 max-w-2xl mx-auto">
                Observations, philosophy, hidden histories, and temptations worth remembering— but never reposting
            </p>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Card 1 -->
                <div class="bg-[#111] rounded-lg overflow-hidden p-4">
                    <img src="{{ asset('frontend/assetes/image/image 86.png') }}" alt="mask" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <p class="uppercase text-xs tracking-wider text-gray-400 mb-1">Philosophy</p>
                        <h2 class="text-xl font-semibold text-[#c4a76a] mb-2">The Art of Elegant Disappearance</h2>
                        <p class="text-gray-300 mb-4">
                            In a world obsessed with presence, the most powerful move is knowing when to vanish.
                            The art lies not in the exit, but in the silence that follows.
                        </p>
                        <p class="text-sm text-gray-500">3 min read</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-[#111] rounded-lg overflow-hidden p-4">
                    <img src="{{asset('frontend/assetes/image/image 87.png')}}" alt="hallway" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <p class="uppercase text-xs tracking-wider text-gray-400 mb-1">Hidden Histories</p>
                        <h2 class="text-xl font-semibold text-[#c4a76a] mb-2">Generational Wealth & Secret Traditions
                        </h2>
                        <p class="text-gray-300 mb-4">
                            True wealth isn’t counted in currency but in customs.
                            The families that endure understand that some traditions are too valuable to share.
                        </p>
                        <p class="text-sm text-gray-500">7 min read</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-[#111] rounded-lg overflow-hidden p-4">
                    <img src="{{asset('frontend/assetes/image/image 94.png')}}" alt="modern art" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <p class="uppercase text-xs tracking-wider text-gray-400 mb-1">Observations</p>
                        <h2 class="text-xl font-semibold text-[#c4a76a] mb-2">Taste: When to Refuse</h2>
                        <p class="text-gray-300 mb-4">
                            The highest form of taste is not in what you choose to accept,
                            but in what you have the wisdom to decline. Refusal is the ultimate luxury.
                        </p>
                        <p class="text-sm text-gray-500">5 min read</p>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <section class="text-center ">

        <p id="blog_section">These chronicles are written for those who understand
            that
            the most
            valuable knowledge is never shared freely..</p>
        <button
            class=" m-10 btn-gold font-sans rounded-lg px-6 sm:px-10 py-3 sm:py-4 text-[#7D0A0A] text-sm font-weight-bold sm:text-base bg-[#caa36b] hover:bg-[#b58d57] transition">
            VIEW ARCHIVE
        </button>

    </section>


</x-frontend::layout>
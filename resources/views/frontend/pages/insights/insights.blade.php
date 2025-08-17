<x-frontend::layout>
    <x-slot name="title">Membership</x-slot>
    <x-slot name="page_slug">Membership</x-slot>

    <div class="bg-black text-white font-serif min-h-screen">

        <section class="bg-black text-white" id="insightsSection">
            <!-- Main Container -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 md:py-12">
                <!-- Title -->
                <h1
                    class="pt-12 md:pt-20 text-center text-3xl sm:text-4xl md:text-5xl text-[#caa36b] font-semibold tracking-wide m-6">
                    THE UNWRITTEN CHRONICLES
                </h1>
                <p class="font-sans text-center text-gray-300 m-6 sm:m-12   mx-auto text-base sm:text-lg">
                    Observations, philosophy, hidden histories, and temptations worth remembering— but never reposting
                </p>

                <!-- Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($articles as $article)
                        <div class="bg-[#111] rounded-lg overflow-hidden p-4">
                            <img src="{{ $article->modified_image }}" alt="{{ $article->title }}"
                                class="w-full h-48 object-cover">
                            <div class="p-6">
                                <p class="uppercase text-xs tracking-wider text-gray-400 mb-1 text-left">
                                    {{ $article->articleCategory->name }}</p>
                                <h2 class="text-xl font-semibold text-[#caa36b] mb-2 text-left">{{ $article->title }}
                                </h2>
                                <p class="text-gray-300 mb-4 text-left">
                                    {{ $article->sub_title }}
                                </p>
                                <p class="text-sm text-gray-500 text-left">{{timeFormatHuman($article->published_data) }}</p>
                            </div>
                        </div>
                    @endforeach

                    <!-- Card 1 -->
                    {{-- <div class="bg-[#111] rounded-lg overflow-hidden p-4">
                        <!-- Placeholder image to make the code runnable -->
                        <img src="{{ asset('frontend/assetes/image/Rectangle 1.png') }}" alt="mask"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <p class="uppercase text-xs tracking-wider text-gray-400 mb-1 text-left">Philosophy</p>
                            <h2 class="text-xl font-semibold text-[#caa36b] mb-2 text-left">The Art of Elegant
                                Disappearance</h2>
                            <p class="text-gray-300 mb-4 text-left">
                                In a world obsessed with presence, the most powerful move is knowing when to vanish. The
                                art lies not in the exit, but in the silence that follows.
                            </p>
                            <p class="text-sm text-gray-500 text-left">3 min read</p>
                        </div>
                    </div> --}}

                    <!-- Card 2 -->
                    {{-- <div class="bg-[#111] rounded-lg overflow-hidden p-4">
                        <!-- Placeholder image to make the code runnable -->
                        <img src="{{ asset('frontend/assetes/image/Rectangle 1 (2).png') }}" alt="hallway"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <p class="uppercase text-xs tracking-wider text-gray-400 mb-1 text-left">Hidden Histories
                            </p>
                            <h2 class="text-xl font-semibold text-[#caa36b] mb-2 text-left">Generational Wealth & Secret
                                Traditions</h2>
                            <p class="text-gray-300 mb-4 text-left">
                                True wealth isn’t counted in currency but in customs. The families that endure
                                understand that some traditions are too valuable to share.
                            </p>
                            <p class="text-sm text-gray-500 text-left">7 min read</p>
                        </div>
                    </div> --}}

                    <!-- Card 3 -->
                    {{-- <div class="bg-[#111] rounded-lg overflow-hidden p-4">
                        <!-- Placeholder image to make the code runnable -->
                        <img src="{{ asset('frontend/assetes/image/Rectangle 1 (1).png') }}" alt="modern art"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <p class="uppercase text-xs tracking-wider text-gray-400 mb-1 text-left">Observations</p>
                            <h2 class="text-xl font-semibold text-[#caa36b] mb-2 text-left">Taste: When to Refuse</h2>
                            <p class="text-gray-300 mb-4 text-left">
                                The highest form of taste is not in what you choose to accept, but in what you have the
                                wisdom to decline. Refusal is the ultimate luxury.
                            </p>
                            <p class="text-sm text-gray-500 text-left">5 min read</p>
                        </div>
                    </div> --}}


                </div>
            </div>
        </section>

        <section class="text-center pt-44">
            <p id="blog_section" class="text-base sm:text-lg max-w-2xl mx-auto mb-8">
                These chronicles are written for those who understand that the most valuable knowledge is never shared
                freely..
            </p>
            <a href="#insightsSection"
                class="text-[#7D0A0A] mt-4 mb-24 sm:mb-40  font-sans rounded-lg px-6 sm:px-10 py-3 sm:py-4 text-sm sm:text-base bg-[#caa36b] hover:bg-[#caa36b] transition">
                VIEW ARCHIVE
            </a>
        </section>


    </div>

</x-frontend::layout>

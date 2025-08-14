<x-frontend::layout>
    <x-slot name="title">About</x-slot>
    <x-slot name="page_slug">About</x-slot>

    <div class="bg-black">

        <!-- CTA -->
        <section class="text-center lg:mb-20 lg:pt-20 pt-10 bg-black" id="cta-section">
            <h2 class="text-2xl mt-[50px] sm:text-4xl  tracking-wide">Where Legacy Begins
            </h2>
        </section>
        <!-- Content Section -->
        <section class="content-section bg-black">
            <div class="#">
                <!-- 3 Column Info -->
                <div class="flex justify-center">
                    <div class="p-5">
                        <img src="{{ asset('frontend/assetes/image/Column.png') }}" alt="">
                    </div>

                    <div class="p-5">
                        <img class="#" src="{{ asset('frontend/assetes/image/Column (1).png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="text-center lg:mb-24 bg-black" id="cta-section2nd ">
            <p class=" m-8 text-sm sm:text-base text-white mx-auto max-w-2xl p-4">
                Velluto Nero is a private circle for those who appreciate
                elegance, power, and discretion. Founded on timeless principles, we create experiences that are not
                shown
                online — they are lived, whispered about, and passed down..
            </p>
        </section>
        <section class="text-center pb-60 bg-black" id="cta-section">
            <h2 class=" sm:text-2xl tracking-wide">Request Invitation
            </h2>
        </section>
        <section class="text-center  pb-30 bg-black" id="cta-section">
            <h2 class="text-2xl sm:text-4xl mb-4 tracking-wide">"The family has eyes. But never a voice."
            </h2>
        </section>

    </div>

</x-frontend::layout>

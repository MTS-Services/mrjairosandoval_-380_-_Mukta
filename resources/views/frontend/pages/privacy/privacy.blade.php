<x-frontend::layout>
    <x-slot name="title">Membership</x-slot>
    <x-slot name="page_slug">Membership</x-slot>

    <div class="bg-black text-[#d4c3a2] min-h-screen flex flex-col items-center justify-center pt-25" id="hero-section">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-40 px-4 sm:px-8 lg:px-52">
            <div class="border border-[#C19A6B] rounded-lg  text-center pb-3">
                <img class="mx-auto p-4 max-w-[120px] w-full" src="{{ asset('frontend/assetes/image/image 92.png') }}"
                    alt="">
                <h3 class="font-bold text-xl p-2  font-(family-name:--font-family-base)">
                    WE NEVER WRITE DOWN YOUR NAME.
                </h3>
                <p class="text-sm text-[#E5E3E3] font-(family-name:--font-family-secondary)">
                    Identity is ephemeral. Records are permanent.
                </p>
            </div>

            <div class="border border-[#C19A6B] rounded-lg   text-center">
                <img class="mx-auto p-4 max-w-[120px] w-full" src="{{ asset('frontend/assetes/image/image 93.png') }}"
                    alt="">
                <h3 class="font-bold text-xl p-2 font-(family-name:--font-family-base)">
                    WE NEVER ASK WHY.
                </h3>
                <p class="text-sm text-[#E5E3E3] font-(family-name:--font-family-secondary)">
                    Motivation is personal. Discretion is universal.
                </p>
            </div>

            <div class="border border-[#C19A6B] rounded-lg text-center">
                <img class="mx-auto p-4 max-w-[120px] w-full" src="{{ asset('frontend/assetes/image/image 89.png') }}"
                    alt="">
                <h3 class="font-bold text-xl p-2 font-(family-name:--font-family-base)">
                    WE NEVER FORGET A DEBT.
                </h3>
                <p class="text-sm text-[#E5E3E3] font-(family-name:--font-family-secondary)">
                    Honor transcends time. Balance must be maintained.
                </p>
            </div>
        </div>

        <div class="border border-[#C19A6B] p-6 sm:p-12 text-center w-full sm:w-3/4 md:w-350 rounded-lg mx-auto m-20">
            <h1 class="text-center font-bold text-xl sm:text-2xl text-[#caa36b] m-4 sm:mb-6">POLICY SUMMARY</h1>
            <ul
                class="list-none space-y-2 text-sm sm:text-lg text-left ml-0 sm:ml-20 md:ml-40 font-(family-name:--font-family-secondary)">
                <li>• We collect only what’s essential for access control.</li>
                <li>• No data is stored longer than necessary.</li>
                <li>• Your presence is known. But never tracked.</li>
            </ul>
        </div>

        <div class=" sm:m-40 border border-[#C19A6B]  sm:p-10 text-center w-full sm:w-3/4 md:w-350 rounded-lg mx-auto">
            <ul class="list-none space-y-2 text-sm sm:text-lg m-4">
                <p class="text-[#E5E3E3] text-[var(--font-family-base)]">FINAL DECLARATION</p>
            </ul>
            <h2 class="text-center font-bold text-xl sm:text-2xl text-[#caa36b] mb-4 sm:mb-6">
                "Velluto Nero does not exist. But if it did, it would still honor your silence."
            </h2>
            <a href="#hero-section"
                class="mt-4 sm:mt-6 bg-[#caa36b] text-[#7D0A0A] px-4 py-2 sm:px-6 sm:py-3 rounded-md hover:bg-[#b58d57] transition text-sm sm:text-base">
                Enter the Atrium
            </a>
        </div>
    </div>
    </div>





</x-frontend::layout>

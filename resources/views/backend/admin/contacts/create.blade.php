<x-admin::layout>
    <x-slot name="title">{{ __('Contact Create') }}</x-slot>
    <x-slot name="breadcrumb">{{ __('Contact Create') }}</x-slot>
    <x-slot name="page_slug">contact</x-slot>


    <section>
        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-text-black dark:text-text-white">{{ __('Create Contact') }}</h2>
                <x-admin.primary-link href="{{ route('cm.contact.index') }}" icon="undo-2" type='info'
                    permission="contact-list">
                    {{ __('Back') }}
                </x-admin.primary-link>
            </div>
        </div>

        <div
            class="grid grid-cols-1 gap-4 sm:grid-cols-1  {{ isset($documentation) && $documentation ? 'md:grid-cols-7' : '' }}">
            <!-- Form Section -->
            <div class="glass-card rounded-2xl p-6 md:col-span-5">
                <form action="{{ route('cm.contact.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-5 ">
                        <!--  -->
                        <div class="space-y-2 ">
                            <p class="label">{{ __(' Name') }}</p>
                            <label class="input flex items-center px-2 ">
                                <input type="text" placeholder="Name" value="{{ old('nmae') }}" name="name"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                         <div class="space-y-2 ">
                            <p class="label">{{ __(' Email') }}</p>
                            <label class="input flex items-center px-2 ">
                                <input type="text" placeholder="Email" value="{{ old('email') }}" name="email"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div class="space-y-2 ">
                            <p class="label">{{ __(' Introducer') }}</p>
                            <label class="input flex items-center px-2 ">
                                <input type="text" placeholder="Introducer" value="{{ old('introducer') }}" name="introducer"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('introducer')" />
                        </div>
                        <div class="space-y-2 ">
                            <p class="label">{{ __(' Patience') }}</p>
                            <label class="input flex items-center px-2 ">
                                <input type="text" placeholder="Patience" value="{{ old('patience') }}" name="patience"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('patience')" />
                        </div>
                     

                    </div>
                    <div class="flex justify-end mt-5">
                        <x-admin.primary-button>{{ __('Create') }}</x-admin.primary-button>
                    </div>
                </form>
            </div>

            {{-- documentation will be loded here and add md:col-span-2 class --}}

        </div>
    </section>
 
</x-admin::layout>

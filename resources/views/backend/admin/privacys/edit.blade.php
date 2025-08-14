<x-admin::layout>
    <x-slot name="title">{{ __('Privacy Edit') }}</x-slot>
    <x-slot name="breadcrumb">{{ __(' Privacy Edit') }}</x-slot>
    <x-slot name="page_slug">privacy</x-slot>


    <section>
        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-text-black dark:text-text-white">{{ __('Update Privacy') }}</h2>
                <x-admin.primary-link href="{{ route('pm.privacy-policy.index') }}" icon="undo-2" type='info'
                    permission="privacy-list">
                    {{ __('Back') }}
                </x-admin.primary-link>
            </div>
        </div>

        <div
            class="grid grid-cols-1 gap-4 sm:grid-cols-1  {{ isset($documentation) && $documentation ? 'md:grid-cols-7' : '' }}">
            <!-- Form Section -->
            <div class="glass-card rounded-2xl p-6 md:col-span-5">
                <form action="{{ route('pm.privacy-policy.update', encrypt($privacy->id)) }}" id="updatePrivacyForm') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-5 ">
                        <!-- title -->
                        <div class="space-y-2 ">
                            <p class="label">{{ __('Type') }}</p>
                            <label class="input flex items-center px-2 ">
                                <input type="text" placeholder="Title" value="{{ $privacy->type }}" name="type"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('type')" />
                        </div>
                          <div class="space-y-2 ">
                            <p class="label">{{ __('Notes') }}</p>
                            <label class="input flex items-center px-2 ">
                                <input type="text" placeholder="Notes" value="{{ $privacy->notes }}" name="notes"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('notes')" />
                        </div>
                     
                       

                    </div>
                    <div class="flex justify-end mt-5">
                        <x-admin.primary-button>{{ __('Update') }}</x-admin.primary-button>
                    </div>
                </form>
            </div>

            {{-- documentation will be loded here and add md:col-span-2 class --}}

        </div>
    </section>
</x-admin::layout>

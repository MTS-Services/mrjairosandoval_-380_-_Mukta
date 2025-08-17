<x-admin::layout>
    <x-slot name="title">{{ __('Banner Edit') }}</x-slot>
    <x-slot name="breadcrumb">{{ __('Banner Edit') }}</x-slot>
    <x-slot name="page_slug">banner</x-slot>


    <section>
        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-text-black dark:text-text-white">{{ __('Update Banner') }}</h2>
                <x-admin.primary-link href="{{ route('bm.banner.index') }}" icon="undo-2" type='info'
                    permission="banner-list">
                    {{ __('Back') }}
                </x-admin.primary-link>
            </div>
        </div>

        <div
            class="grid grid-cols-1 gap-4 sm:grid-cols-1  {{ isset($documentation) && $documentation ? 'md:grid-cols-7' : '' }}">
            <!-- Form Section -->
            <div class="glass-card rounded-2xl p-6 md:col-span-5">
                <form action="{{ route('bm.banner.update', encrypt($banner->id)) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-5 ">
                        <!-- title -->
                        <div class="space-y-2 ">
                            <p class="label">{{ __('Title') }}</p>
                            <label class="input flex items-center px-2 ">
                                <input type="text" placeholder="Title" value="{{ $banner->title }}" name="title"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                     
                        <div class="space-y-2 ">
                            <p class="label">{{ __('Image') }}</p>
                            <input type="file" name="image" class="filepond" id="image"
                                accept="image/jpeg, image/png, image/jpg, image/webp, image/svg">
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
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
 @push('js')
            <script src="{{ asset('assets/js/filepond.js') }}"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {

                    file_upload(["#image"], ["image/jpeg", "image/png", "image/jpg, image/webp, image/svg"], {
                        "#image": "{{ $banner->modified_image }}"
                    });

                });
            </script>
        @endpush
</x-admin::layout>

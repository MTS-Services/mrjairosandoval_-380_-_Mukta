<x-admin::layout>
    <x-slot name="title">{{ __('Membership Edit') }}</x-slot>
    <x-slot name="breadcrumb">{{ __('Membership Edit') }}</x-slot>
    <x-slot name="page_slug">membership</x-slot>

    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/css/filepond.css') }}">
    @endpush

    <section>
        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-text-black dark:text-text-white">{{ __('Edit Membership') }}</h2>
                <x-admin.primary-link href="{{ route('mm.membership.index') }}">
                    {{ __('Back') }}
                    <i data-lucide="undo-2" class="w-4 h-4"></i>
                </x-admin.primary-link>
            </div>
        </div>

        <div
            class="grid grid-cols-1 gap-4 sm:grid-cols-1  {{ isset($documentation) && $documentation ? 'md:grid-cols-7' : '' }}">
            <!-- Form Section -->
            <div class="glass-card rounded-2xl p-6 md:col-span-5">
                <form action="{{ route('mm.membership.update', encrypt($membership->id)) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <!-- Name -->
                        <div class="space-y-2">
                            <p class="label">{{ __('Name') }}
                                <span class="text-red-500">*</span>
                            </p>
                            <label class="input flex items-center gap-2">
                                <input type="text" placeholder="Name"
                                    value="{{ old('name', $membership->name) }}" name="name"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        {{--Slug--}}
                        <div class="space-y-2">
                            <p class="label">{{ __('Slug') }}
                                <span class="text-red-500">*</span>
                            </p>
                            <label class="input flex items-center gap-2">
                                <input type="text" placeholder="Slug"
                                    value="{{ old('slug', $membership->slug) }}" name="slug"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>
                        {{-- Tag --}}
                        <div class="space-y-2">
                            <p class="label">{{ __('Tag') }}
                                <span class="text-red-500">*</span>
                            </p>
                            <label class="input flex items-center gap-2">
                                <input type="text" placeholder="Tag"
                                    value="{{ old('tag', $membership->tag) }}" name="tag"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('tag')" />
                        </div>
                    </div>

                    <div class="flex justify-end mt-5">
                        <x-admin.primary-button>{{ __('Update') }}</x-admin.primary-button>
                    </div>
                </form>
            </div>

            {{-- documentation will be loaded here and add md:col-span-2 class --}}
        </div>
    </section>
</x-admin::layout>

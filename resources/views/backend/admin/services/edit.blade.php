<x-admin::layout>
    <x-slot name="title">Edit Services</x-slot>
    <x-slot name="breadcrumb">Edit Services</x-slot>
    <x-slot name="page_slug">services</x-slot>
    

    <section>
        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-text-black dark:text-text-white">{{ __('Create Service') }}</h2>
                <x-admin.primary-link href="{{ route('sm.service.index') }}" icon="undo-2" type='info' permission="service-list">
                    {{ __('Back') }}
                </x-admin.primary-link>
            </div>
        </div>

       <div
            class="grid grid-cols-1 gap-4 sm:grid-cols-1  {{ isset($documentation) && $documentation ? 'md:grid-cols-7' : '' }}">
            <!-- Form Section -->
            <div class="glass-card rounded-2xl p-6 md:col-span-5">
                <form action="{{ route('sm.service.update', encrypt($service->id)) }}" id="updateServiceForm') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-5 ">
                        <!-- title -->
                        <div class="space-y-2 ">
                            <p class="label">{{ __('Title') }}</p>
                            <label class="input flex items-center px-2 ">
                                <input type="text" placeholder="Title" value="{{$service->title }}" name="title"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <!-- sub title -->
                        <div class="space-y-2">
                            <p class="label">{{ __('Sub Title') }}</p>
                            <label class="input flex items-center gap-2">
                                <input type="text" name="sub_title" value="{{ $service->sub_title }}"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('sub_title')" />
                        </div>
                           <div class="space-y-2">
                            <p class="label">{{ __('Icon') }}</p>
                            <label class="input flex items-center gap-2">
                                <input type="file" name="icon" value="{{ $service->icon }}"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('icon')" />
                        </div>

                    </div>
                    <div class="flex justify-end mt-5">
                        <x-admin.primary-button>{{ __('update') }}</x-admin.primary-button>
                    </div>
                </form>
            </div>

            {{-- documentation will be loded here and add md:col-span-2 class --}}

        </div>
    </section>

</x-admin::layout>
<x-admin::layout>
    <x-slot name="title">{{ __('Article Create') }}</x-slot>
    <x-slot name="breadcrumb">{{ __('Article Create') }}</x-slot>
    <x-slot name="page_slug">article</x-slot>


 <section>
        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-text-black dark:text-text-white">{{ __('Create Article') }}</h2>
                <x-admin.primary-link href="{{ route('am.article.index') }}" icon="undo-2" type='info' permission="article-list">
                    {{ __('Back') }}
                </x-admin.primary-link>
            </div>
        </div>

       <div
            class="grid grid-cols-1 gap-4 sm:grid-cols-1  {{ isset($documentation) && $documentation ? 'md:grid-cols-7' : '' }}">
            <!-- Form Section -->
            <div class="glass-card rounded-2xl p-6 md:col-span-5">
                <form action="{{ route('am.article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-5 ">
                        <!-- title -->
                        <div class="space-y-2 ">
                            <p class="label">{{ __('Title') }}</p>
                            <label class="input flex items-center px-2 ">
                                <input type="text" placeholder="Title" value="{{ old('title') }}" name="title"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                         <div class="space-y-2 ">
                            <p class="label">{{ __('Slug') }}</p>
                            <label class="input flex items-center px-2 ">
                                <input type="text" placeholder="slug" value="{{ old('slug') }}" name="slug"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>

                        <!-- sub title -->
                        <div class="space-y-2">
                            <p class="label">{{ __('Sub Title') }}</p>
                            <label class="input flex items-center gap-2">
                                <input type="text" name="sub_title" value="{{ old('sub_title') }}"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('sub_title')" />
                        </div>
                        <div class="space-y-2">
                            <p class="label">{{ __('Content') }}</p>
                            <label class="input flex items-center gap-2">
                                <input type="text" name="content" value="{{ old('content') }}"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>



                           <div class="space-y-2">
                            <p class="label">{{ __('Icon') }}</p>
                            <label class="input flex items-center gap-2">
                                <input type="file" name="icon" value="{{ old('icon') }}"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('icon')" />
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
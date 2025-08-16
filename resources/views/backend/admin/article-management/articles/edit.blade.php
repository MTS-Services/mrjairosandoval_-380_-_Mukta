<x-admin::layout>
    <x-slot name="title">{{ __('Article Create') }}</x-slot>
    <x-slot name="breadcrumb">{{ __('Article Create') }}</x-slot>
    <x-slot name="page_slug">article</x-slot>


    <section>
        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-text-black dark:text-text-white">{{ __('Create Article') }}</h2>
                <x-admin.primary-link href="{{ route('arm.article.index') }}" icon="undo-2" type='info'
                    permission="article-list">
                    {{ __('Back') }}
                </x-admin.primary-link>
            </div>
        </div>

        <div
            class="grid grid-cols-1 gap-4 sm:grid-cols-1  {{ isset($documentation) && $documentation ? 'md:grid-cols-7' : '' }}">
            <!-- Form Section -->
            <div class="glass-card rounded-2xl p-6 md:col-span-5">
                <form action="{{ route('arm.article.update', encrypt($article->id)) }}" id="updateArticleForm') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-5 ">
                        <!-- title -->
                        <div class="space-y-2 ">
                            <p class="label">{{ __('Title') }}</p>
                            <label class="input flex items-center px-2 ">
                                <input type="text" placeholder="Title" value="{{ $article->title }}" name="title"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div class="space-y-2 ">
                            <p class="label">{{ __('Slug') }}</p>
                            <label class="input flex items-center px-2 ">
                                <input type="text" placeholder="slug" value="{{ $article->slug }}" name="slug"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>

                        <!-- sub title -->
                        <div class="space-y-2">
                            <p class="label">{{ __('Sub Title') }}</p>
                            <label class="input flex items-center gap-2">
                                <input type="text" name="sub_title" value="{{ $article->sub_title }}"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('sub_title')" />
                        </div>




                        {{-- Author Name --}}
                        <div class="space-y-2">
                            <p class="label">{{ __('Author Name') }}</p>
                            <label class="input flex items-center gap-2">
                                <input type="text" name="auther_name" value="{{ $article->auther_name }}"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('auther_name')" />
                        </div>

                        {{-- Published Date --}}
                        <div class="space-y-2">
                            <p class="label">{{ __('Published Date') }}</p>
                            <label class="input flex items-center gap-2">
                                <input type="datetime-local" name="published_data"
                                    value="{{ $article->published_data }}" class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('published_data')" />
                        </div>

                        {{-- Read Time --}}
                        <div class="space-y-2">
                            <p class="label">{{ __('Read Time (minutes)') }}</p>
                            <label class="input flex items-center gap-2">
                                <input type="number" name="read_time" value="{{ $article->read_time }}"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('read_time')" />
                        </div>

                        {{-- Views --}}
                        <div class="space-y-2">
                            <p class="label">{{ __('Views') }}</p>
                            <label class="input flex items-center gap-2">
                                <input type="number" name="views" value="{{ $article->views }}" class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('views')" />
                        </div>

                        {{-- Meta Title --}}
                        <div class="space-y-2">
                            <p class="label">{{ __('Meta Title') }}</p>
                            <label class="input flex items-center gap-2">
                                <input type="text" name="meta_title" value="{{ $article->meta_title }}"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('meta_title')" />
                        </div>
                        {{-- content --}}
                        <div class="space-y-2">
                            <p class="label gap-2 mb-2">{{ __('Content') }}</p>
                            <label class=" flex items-center gap-2">
                                <textarea type="text" name="content" value="{{ $article->content }}" class="flex-1 textarea"></textarea>
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        {{-- Meta Description --}}
                        <div class="space-y-2">
                            <p class="label">{{ __('Meta Description') }}</p>
                            <label class=" flex items-center gap-2">
                                <textarea name="meta_description" class="flex-1 textarea">{{ $article->meta_description }}</textarea>
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('meta_description')" />
                        </div>

                        {{-- Meta Keywords --}}
                        <div class="space-y-2">
                            <p class="label">{{ __('Meta Keywords') }}</p>
                            <label class=" flex items-center gap-2">
                                <textarea name="meta_keywords" class="flex-1 textarea">{{ $article->meta_keywords }}</textarea>
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('meta_keywords')" />
                        </div>


                        <div class="space-y-2 ">
                            <p class="label">{{ __('Image') }}</p>
                            <input type="file" name="image" class="filepond" id="image"
                                accept="image/jpeg, image/png, image/jpg, image/webp, image/svg">
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
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
    @push('js')
        <script src="{{ asset('assets/js/filepond.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                file_upload(["#image"], ["image/jpeg", "image/png", "image/jpg, image/webp, image/svg"], {
                    "#image": "{{ $article->modified_image }}"
                });

            });
        </script>
    @endpush
</x-admin::layout>

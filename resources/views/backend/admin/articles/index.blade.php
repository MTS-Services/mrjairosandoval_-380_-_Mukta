<x-admin::layout>
    <x-slot name="title">{{ __('Article List') }}</x-slot>
    <x-slot name="breadcrumb">{{ __('Article List') }}</x-slot>
    <x-slot name="page_slug">article</x-slot>

    <section>

        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-text-black dark:text-text-white">{{ __('Article List') }}</h2>
                <div class="flex items-center gap-2">
                    <x-admin.primary-link secondary="true" href="{{ route('am.article.trash') }}">{{ __('Trash') }} <i
                            data-lucide="trash-2" class="w-4 h-4"></i>
                    </x-admin.primary-link>
                    <x-admin.primary-link href="{{ route('am.article.create') }}" icon="plus"
                        permission="article-create">
                        {{ __('Add') }}
                    </x-admin.primary-link>
                </div>
            </div>
        </div>
        <div class="glass-card rounded-2xl p-6">
            <table class="table datatable table-zebra">
                <thead>
                    <tr>
                        <th width="5%">{{ __('SL') }}</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Sub Title') }}</th>
                        <th>{{ __('Content') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Created By') }}</th>
                        <th>{{ __('Created Date') }}</th>
                        <th width="10%">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>

    <x-admin.details-modal />


    @push('js')
        <script src="{{ asset('assets/js/details-modal.js') }}"></script>
        <script src="{{ asset('assets/js/datatable.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                let table_columns = [
                    //name and data, orderable, searchable
                    ['title', true, true],
                    ['sub_title', true, true],
                    ['content', true, true],
                    ['status', true, true],
                    ['created_by', true, true],
                    ['created_at', true, true],
                    ['action', false, false],
                ];
                const details = {
                    table_columns: table_columns,
                    main_class: '.datatable',
                    displayLength: 10,
                    main_route: "{{ route('am.article.index') }}",
                    order_route: "{{ route('update.sort.order') }}",
                    export_columns: [0, 1, 2, 3, 4, 5],
                    model: 'Articles',
                };
                // initializeDataTable(details);

                initializeDataTable(details);
            })
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {

                $(document).on('click', '.view', function() {
                    const id = $(this).data('id');
                    const route = "{{ route('am.article.show', ':id') }}";

                    const details = [{

                            label: '{{ __('Title') }}',
                            key: 'title',
                        },
                        {
                            label: '{{ __('Slug') }}',
                            key: 'slug',
                        },


                        {
                            label: '{{ __('Sub Title') }}',
                            key: 'sub_title',


                        },
                        {
                            label: '{{ __('Content') }}',
                            key: 'content',
                        },
                        {
                            label: '{{ __('Status') }}',
                            key: 'status',
                        },
                        {
                            lavel: '{{ __('Image') }}',
                            key: 'image',
                            type: 'image',
                        },
                        {
                            lavel: '{{ __('Modified Image') }}',
                            key: 'modified_image',
                            type: 'image',
                        },
                        {
                            lavel: '{{ __('Auther Name') }}',
                            key: 'auther_name',
                            
                        },
                        {
                            lavel: '{{ __('Published Date') }}',
                            key: 'published_data',
                        },
                        {
                            lavel: '{{ __('Read Time') }}',
                            key: 'read_time',
                        },
                        {
                            lavel: '{{ __('Views') }}',
                            key: 'views',
                        },
                        {
                            lavel: '{{ __('Mata Title') }}',
                            key: 'meta_title',
                        },
                        {
                            lavel: '{{ __('Meta Description') }}',
                            key: 'meta_description',
                        },
                        {
                            lavel: '{{ __('Meta Keywords') }}',
                            key: 'meta_keywords',
                        },
                        {
                            lavel: '{{ __('Created By') }}',
                            key: 'created_by',
                        },
                        {
                            lavel: '{{ __('Created Date') }}',
                            key: 'created_at',
                        },
                        {
                            lavel: '{{ __('Updated By') }}',
                            key: 'updated_by',
                        },
                        {
                            lavel: '{{ __('Updated Date') }}',
                            key: 'updated_at',
                        },

                    ];

                    showDetailsModal(route, id, '{{ __('Service Details') }}', details);
                });
            });
        </script>
    @endpush


</x-admin::layout>

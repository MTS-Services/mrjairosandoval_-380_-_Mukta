<x-admin::layout>
    <x-slot name="title">Trash Services</x-slot>
    <x-slot name="breadcrumb">Trash Services</x-slot>
    <x-slot name="page_slug">services</x-slot>

<section>

        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-text-black dark:text-text-white">{{ __('Trash List') }}</h2>
                <div class="flex items-center gap-2">
                    
                    <x-admin.primary-link href="{{ route('sm.service.index') }}" icon="plus" permission="service-trash" data-lucide="trash-2" class="w-4 h-4">
                        {{ __('Back') }}
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
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Deleted By') }}</th>
                        <th>{{ __('Deleted Date') }}</th>
                        <th width="10%">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>

    @push('js')
        <script src="{{ asset('assets/js/datatable.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                let table_columns = [
                    //name and data, orderable, searchable
                    ['title', true, true],
                    ['sub_title', true, true],
                    ['status', true, true],
                    ['deleted_by', true, true],
                    ['deleted_at', true, true],
                    ['action', false, false],
                ];
                const details = {
                    table_columns: table_columns,
                    main_class: '.datatable',
                    displayLength: 10,
                    main_route: "{{ route('sm.service.trash') }}",
                    order_route: "{{ route('update.sort.order') }}",
                    export_columns: [0, 1, 2, 3],
                    model: 'Service',
                };
                initializeDataTable(details);
            })
        </script>
    @endpush

</x-admin::layout>
<div>
    {{-- <x-slot name="header">
        <h2 class="flex gap-4 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <x-header title="Produtos">
                <x-slot:middle>
                    <x-input icon="o-magnifying-glass" placeholder="Search..." />
                </x-slot:middle>
                <x-slot:actions>
                    <x-button icon="o-plus" class="btn-primary" :link="route('product.create')" />
                </x-slot:actions>
            </x-header>

            <x-table :headers="$headers" :rows="$this->products" :sort-by="$sortBy" @row-click="alert($event.detail.name)" />
        </div>



    </div>





</div>

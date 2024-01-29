<div>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <x-header title="Produtos" />
            <x-form wire:submit="save">
                <x-file wire:model="banner" label="Banner" accept="image/png, image/jpeg" />
                {{-- @if ($banner->temporaryUrl())
                    <img src="{{ $banner?->temporaryUrl() }}" class="mb-5" />
                @endif --}}
                <x-select label="Categoria" :options="$categories" wire:model="category_id" />
                <x-input label="Nome" wire:model="name" />
                <x-input label="Preço" wire:model="price" />
                <x-textarea label="Descrição" wire:model="description" />

                <x-slot:actions>
                    <x-button label="Cancel" :link="route('product.index')" />
                    <x-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
                </x-slot:actions>
            </x-form>

        </div>
    </div>
</div>

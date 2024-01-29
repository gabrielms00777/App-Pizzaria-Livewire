<div>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <x-header title="Categorias">
                <x-slot:middle>
                    <x-input icon="o-magnifying-glass" wire:model.live.debounce.150ms='search' placeholder="Search..." />
                </x-slot:middle>
                <x-slot:actions>
                    <x-button icon="o-plus" class="btn-primary" @click="$wire.modalCreate = true" />
                </x-slot:actions>
            </x-header>

            <x-table :headers="$headers" :rows="$this->categories" :sort-by="$sortBy" @row-click="alert($event.detail.name)" />
        </div>



        <x-modal title="Criar categoria" wire:model='modalCreate'>
            <x-form wire:submit="save">
                <x-input label="Name" wire:model="name" />

                <x-slot:actions>
                    {{-- Notice `onclick` is HTML --}}
                    <x-button label="Cancel" @click="$wire.modalCreate = false" />
                    <x-button label="Confirm" class="btn-primary" type="submit" spinner="save" />
                </x-slot:actions>
            </x-form>
        </x-modal>
    </div>
</div>

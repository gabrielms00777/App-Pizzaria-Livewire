<div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-header title="Mesa {{ $order->table ?? '' }}">
                <x-slot:actions class="!justify-end">
                    <x-button icon="o-trash" class="text-error btn-ghost" wire:click='deleteOrder' spinner />
                </x-slot:actions>
            </x-header>
            <x-form wire:submit="addProduct" class="w-full">

                <x-select label="Categorias" icon="o-user" :options="$this->categories" wire:model.live="category_id" />
                <x-select label="Produto" icon="o-user" :options="$this->products" wire:model="product_id" />
                <div class="flex items-center gap-4">
                    <span class="text-lg">Quantidade </span>
                    <x-input wire:model='amount' class="text-center" />
                </div>
                <div class="flex gap-4">
                    <x-button icon="o-plus" class="w-1/4 btn-primary" type="submit" spinner="addProduct" />
                    <x-button label="Avançar!" class="w-3/5 btn-success" wire:click="$toggle('finishedModal')" />
                </div>
            </x-form>
            <div class="flex flex-col gap-y-3 mt-7">
                @foreach ($this->items as $item)
                    <div
                        class="flex items-center justify-between w-full px-3 py-2 bg-gray-900 border-2 border-gray-600 rounded-md">
                        <span>{{ $item->product->name }}</span>
                        <x-button wire:click="removeItem({{ $item->id }})" icon="o-trash"
                            class="text-error btn-ghost btn-sm" />
                    </div>
                @endforeach
            </div>

        </div>

        <x-modal wire:model="tableModal" title="Novo Pedido" persistent>
            <x-form wire:submit="createTable">
                <x-input placeholder="Número da mesa" class="text-center" type="number" wire:model="table" />
                <x-slot:actions>
                    <x-button label="Abrir mesa" class="w-full btn-success" type="submit" spinner="createTable" />
                    {{-- <x-button label="Cancel" @click="$wire.tableModal = false" /> --}}
                </x-slot:actions>
            </x-form>
        </x-modal>

        <x-modal wire:model="finishedModal" title="Deseja finalizar o pedido?">
            Mesa: {{ $order->table ?? '' }}

            <x-slot:actions>
                <x-button label="Cancelar" @click="$wire.finishedModal = false" />
                <x-button label="Finzalizar Pedido" class="btn-primary" wire:click="finishedOrder" spinner />
            </x-slot:actions>
        </x-modal>



    </div>

</div>

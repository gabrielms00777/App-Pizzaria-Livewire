<div>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <x-header title="Últimos pedidos">
                <x-slot:actions>
                    <x-button icon="o-arrow-path" class="text-green-500" x-on:click="$wire.$refresh()" loading />
                </x-slot:actions>
            </x-header>

            @forelse ($orders as $order)
                <x-list-item :item="$order"
                    class="mb-2 bg-gray-800 border-l-8 border-green-500 rounded-md hover:bg-gray-800 ">
                    {{-- <x-slot:avatar>
                        <x-badge :value="$order->status" class="badge-primary" />
                    </x-slot:avatar> --}}
                    <x-slot:value>
                        Mesa {{ $order->table }}
                    </x-slot:value>
                    <x-slot:sub-value>
                        {{ $order->created_at->diffForHumans() }}
                    </x-slot:sub-value>
                    <x-slot:actions>
                        <x-button icon="o-pencil" class="text-yellow-500" onclick="modal{{ $order->id }}.showModal()"
                            spinner />
                    </x-slot:actions>
                </x-list-item>
                <x-modal :id="'modal' . $order->id" title="Detalhes do pedido">

                    <p class="text-xl text-green-500">Mesa: {{ $order->table }}</p>
                    <br>
                    <ul>
                        @foreach ($order->item as $key => $item)
                            <li>{{ $key + 1 }} - {{ $item->product->name }} <br> {{ $item->product->description }}
                            </li>
                            <br>
                        @endforeach
                    </ul>


                    <x-slot:actions>
                        {{-- Notice `onclick` is HTML --}}
                        <x-button label="Concluir pedido" class="btn-error"
                            wire:click="finishOrder({{ $order->id }})" spinner />
                    </x-slot:actions>
                </x-modal>
            @empty
            @endforelse
        </div>
    </div>

</div>

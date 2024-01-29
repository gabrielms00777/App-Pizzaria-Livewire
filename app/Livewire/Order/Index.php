<?php

namespace App\Livewire\Order;

use App\Models\Order;
use Livewire\Component;
use Mary\Traits\Toast;

class Index extends Component
{
    use Toast;

    public function finishOrder(Order $order)
    {
        $order->update([
            'status' => true
        ]);
        $this->js('modal'. $order->id .'.close()');
        $this->success('Pedido concluido com sucesso!');
    }
    public function render()
    {
        return view('livewire.order.index',[
            'orders' => Order::query()->with('item')->where('draft', false)->where('status', false)->latest()->get()
        ]);
    }
}

<?php

namespace App\Livewire\Users;

use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('layouts.order')]
class Create extends Component
{
    use Toast;

    public bool $tableModal = true;
    public bool $finishedModal = false;
    public string $table = '';
    public ?Order $order = null;

    public $category_id;
    public $product_id;
    public $amount = 1;

    public function mount()
    {
        // $this->order = Order::with('item')->find(5);
        $this->category_id = $this->categories()->first()->id ?? 0;
        $this->product_id = $this->products()->first()->id ?? 0;
    }

    public function updatedCategoryId()
    {
        $this->product_id = $this->products()->first()->id ?? 0;
    }

    public function createTable()
    {
        $order = Order::create($this->only('table'));
        $this->order = $order;
        $this->tableModal = false;
    }

    public function finishedOrder()
    {
        $this->order->draft = false;
        $this->order->save();
        $this->finishedModal = false;
        $this->success('Pedido Adicionado com Sucesso!!!',redirectTo:route('order.create'));
    }

    public function addProduct()
    {
        $data = array_merge($this->only('product_id', 'amount'), ['order_id' => $this->order->id]);
        Item::create($data);
    }

    public function removeItem(Item $item)
    {
        $item->delete();
    }

    public function deleteOrder()
    {
        $this->order->delete();
        $this->error('Ordem deletada com sucesso!', redirectTo:route('order.create'));
    }

    public function render()
    {
        return view('livewire.users.create');
    }

    #[Computed()]
    public function items()
    {
        return Item::with(['product', 'order'])->where('order_id', $this->order?->id)->latest()->get();
    }

    #[Computed()]
    public function products()
    {
        return Product::where('category_id', $this->category_id)->get();
    }

    #[Computed()]
    public function categories()
    {
        return Category::all(['id', 'name']);
    }
}

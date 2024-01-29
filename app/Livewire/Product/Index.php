<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public array $sortBy = ['column' => 'id', 'direction' => 'desc'];
    public array $expanded = [];
    public $headers = [
        ['key' => 'id', 'label' => '#', 'class' => 'text-xl'],
        ['key' => 'name', 'label' => 'Nome', 'class' => 'text-xl'],
        ['key' => 'price', 'label' => 'Preço', 'class' => 'text-xl'],
        ['key' => 'category.name', 'label' => 'Categoria', 'class' => 'text-xl'],
        ['key' => 'action', 'label' => '', 'class' => '']
    ];

    #[Computed()]
    public function products()
    {
        return Product::query()
                    ->with('category')
                    ->orderBy(...array_values($this->sortBy))
                    ->get();
    }

    public function render()
    {
        return view('livewire.product.index');
    }
}

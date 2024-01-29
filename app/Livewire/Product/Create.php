<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class Create extends Component
{
    use WithFileUploads, Toast;

    #[Validate('image')]
    public $banner;

    #[Validate('required')]
    public $category_id;

    #[Validate('required|string')]
    public $name;

    #[Validate('required')]
    public $price;

    #[Validate('required|string')]
    public $description;

    public function save()
    {
        try {
            $this->banner = $this->banner->store('products');
            Product::create($this->all());
            $this->success(
                'Produto cadastrado com sucesso!!!',
                redirectTo:route('product.index')
            );
        } catch (\Throwable $th) {

        }
    }

    public function render()
    {
        return view('livewire.product.create',[
            'categories' => Category::all(['id', 'name'])
        ]);
    }
}

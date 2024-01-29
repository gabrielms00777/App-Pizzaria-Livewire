<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class Index extends Component
{
    use WithPagination, Toast;

    #[Validate('required|string')]
    public $name = '';

    public $search = '';
    public bool $modalCreate = false;

    public array $sortBy = ['column' => 'id', 'direction' => 'desc'];
    public array $expanded = [];
    public $headers = [
        ['key' => 'id', 'label' => '#', 'class' => 'text-xl'],
        ['key' => 'name', 'label' => 'Nome', 'class' => 'text-xl'],
    ];

    public function save()
    {
        $this->validate();
        try {
            Category::create($this->only('name'));
            $this->modalCreate = false;
            $this->name = '';
            $this->success('Categoria cadastrada com sucesso!!!');
            return;
        } catch (\Throwable $th) {
            $this->error('Ocorreu algum erro, tente novamente!');
            return;
        }
    }

    public function render()
    {
        return view('livewire.category.index');
    }

    #[Computed()]
    public function categories()
    {
        return Category::query()
                    ->when($this->search, function(Builder $q){
                        $q->where('name', 'like', '%'. $this->search .'%');
                    })
                    ->orderBy(...array_values($this->sortBy))
                    ->get();
    }
}

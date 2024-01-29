<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $informacoes = Order::selectRaw('
            COUNT(*) as pedidosMes,
            SUM(CASE WHEN DATE(created_at) = CURDATE() THEN 1 ELSE 0 END) as pedidosHoje,
            SUM(CASE WHEN DATE(created_at) = CURDATE() THEN valor ELSE 0 END) as saldoDia,
            SUM(CASE WHEN MONTH(created_at) = MONTH(CURDATE()) THEN valor ELSE 0 END) as saldoMes
        ')->first();
        dd($informacoes);
        // dd(Order::query()->get()->toArray());
        return view('livewire.dashboard');
    }
}

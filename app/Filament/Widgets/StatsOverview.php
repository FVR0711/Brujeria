<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Cliente;
use App\Models\Pagina;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $numeroDePaginas = Pagina::count();
        $numeroDeClientes = Cliente::count();

        return [
            Stat::make('Clientes', $numeroDeClientes),
            Stat::make('Paginas', $numeroDePaginas),        ];
    }
}

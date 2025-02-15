<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\StatsOverview;

class Inicio extends Page
{
    protected static ?string $navigationIcon = 'mdi-page-next-outline';
    protected static ?string $title = 'Inicio';

    protected static string $view = 'filament.pages.inicio';


    public function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }


}

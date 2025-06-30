<?php

namespace App\Filament\Pages;
use App\Filament\Resources\PostResource\Widgets\PostsOverview;
use App\Filament\Resources\PostResource\Widgets\StatsOverview;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public function getWidgets(): array
    {
        return [
            StatsOverview::class, // Add your custom widget here
        ];
    }}
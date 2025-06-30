<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {

        return [
            Stat::make(
                label: 'Total posts',
                value: Post::query()->count(),
            ),
            Stat::make(
                label: 'Total pages',
                value: Page::query()->count(),
            ),
            Stat::make(
                label: 'Total Category',
                value: Category::query()->count(),
            ),
            // ->description('Total number of posts in the system.')
            // ->descriptionIcon('heroicon-o-document-text'),
            // ...
        ];
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use Filament\Widgets\ChartWidget;

class ClientsCategory extends ChartWidget
{
    protected static ?string $heading = 'Clients Categories';
    protected static ?int $sort = 3;
    protected static bool $isLazy = false;
    protected function getData(): array
    {
        $clients = Client::select('client_category_id')->get()->groupBy(function ($client) {
            return $client->category->category;
            // That called the relationship defined called "category" and just chained it with the row name called category
        });
        $clientCount = [];
        foreach ($clients as $oneClient => $clientGroup) {
            $clientCount[$oneClient] = $clientGroup->count();
        }
        $labels = array_keys($clientCount);
        $data = array_values($clientCount);
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Category',
                    'data' => $data,
                    'backgroundColor' =>  [
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 99, 132)'
                    ],
                    'hoverOffset' => 4
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}

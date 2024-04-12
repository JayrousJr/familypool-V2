<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use Filament\Widgets\ChartWidget;

class ClientsCategory extends ChartWidget
{
    protected static ?string $heading = 'Clients Categories';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $clients = Client::select('category', 'id')->get()->groupBy(function ($client) {
            return $client->category;
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
                    'label' => 'category',
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

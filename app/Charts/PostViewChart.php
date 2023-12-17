<?php

namespace App\Charts;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PostViewChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $categories = ['pengumuman', 'event', 'artikel', 'ekstrakulikuler'];

        $data = Post::whereIn('category', $categories)
        ->select('category', DB::raw('count(*) as count'))
        ->groupBy('category')
        ->pluck('count')
        ->toArray();

        return $this->chart->radarChart()
            ->setTitle('Statistik')
            ->addData('posts', $data)
            ->setXAxis($categories);
    }
}

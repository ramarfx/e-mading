<?php

namespace App\Charts;

use App\Models\Post;
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
        $post = Post::get();
        $data = [
            $post->where('category', 'pengumuman')->count(),
            $post->where('category', 'event')->count(),
            $post->where('category', 'artikel')->count(),
            $post->where('category', 'ekstrakulikuler')->count(),
        ];

        return $this->chart->radarChart()
            ->setTitle('Statistik')
            ->addData('posts', $data)
            ->setXAxis(['pengumuman', 'event', 'artikel', 'ekstrakulikuler']);
    }
}

<?php

namespace App\Console;

use App\Models\Post;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $posts = Post::where('published_at', '<=', now())
                ->where('is_published', false)
                ->get();

            $posts->each(function ($post) {
                $post->update(['is_published' => true]);
                info('Post dipublikasikan: ' . $post->title);
            });
        })->everyMinute(); // Atur sesuai kebutuhan jadwal
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

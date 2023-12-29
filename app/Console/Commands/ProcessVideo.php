<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ProcessVideo extends Command
{
    
    
    public function __construct()
    {
        parent::__construct();
    }

    protected $signature = 'video:process';
    protected $description = 'Process a sample video file';

    public function handle()
    {
        $inputVideoPath = storage_path('app/sample.mp4');
        $outputVideoPath = storage_path('app/processed_video.mp4');

        $ffmpeg = FFMpeg::create();
        $video = $ffmpeg->open($inputVideoPath);

        $video->resize(new \FFMpeg\Coordinate\Dimension(640, 480));

        $video->save(new \FFMpeg\Format\Video\X264(), $outputVideoPath);

        $this->info('Video processed successfully.');
    }
}

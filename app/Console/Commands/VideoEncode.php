<?php

namespace App\Console\Commands;


use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Illuminate\Console\Command;
use FFMpeg\Format\Video\X264;

class VideoEncode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:video-encode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lowBitRate = (new X264)->setKiloBitrate(1000);
        $midBitRate = (new X264)->setKiloBitrate(2500);
        $highBitRate = (new X264)->setKiloBitrate(5000);

        $this->info("Encrypting Video");

        FFMpeg::fromDisk('uploads')
            ->open('video.mp4')
            ->exportForHLS()
            ->addFormat($lowBitRate)
            ->addFormat($midBitRate)
            ->addFormat($highBitRate)
            ->onProgress(function($progress){
                $this->info("Encrypting: $progress%");
            })
            ->toDisk('encrypts')
            ->save('video.m3u8');
        
        $this->info("Done!");
        // $this.info("Done!");
    }
}

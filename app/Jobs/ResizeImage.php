<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Enums\Unit;
use Illuminate\Bus\Queueable;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\AlignPosition;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $w;
    private $h;
    private $fileName;
    private $path;
    /**
     * Create a new job instance.
     */
    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $scrPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

        $croppedImage = Image::load($scrPath)
                        ->crop($w, $h, CropPosition::Center)
                        ->watermark('public/img/logopresto.png', AlignPosition::Center, alpha: 50, width:15,widthUnit:Unit::Percent,
                        height:9,heightUnit:Unit::Percent, fit: Fit::Contain)
                        ->save($destPath);
    }
}

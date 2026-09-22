<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProcessUploadedPhoto implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public string $full_path_to_original, public string $new_original_path_name) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $disk = config('filesystems.default');

        $image = Image::decodeBinary(
            Storage::disk($disk)->get($this->full_path_to_original)
        );

        $sizes = config('photos.sizes');
        $jpg_compression = config('photos.jpeg_compression');
        $variant_pattern = config('photos.variant_pattern');
        $extension = config('photos.picture_type');

        foreach ($sizes as $size) {
            $variant = clone $image;
            $variant->scale($size['width']);

            $path = sprintf($variant_pattern, $size['width'], $size['height']);
            Storage::disk($disk)->put(
                $path.'/'.$this->new_original_path_name,
                $variant->encodeUsingFileExtension($extension, quality: $jpg_compression)
            );
        }

    }
}

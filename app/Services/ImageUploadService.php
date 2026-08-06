<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\ImageManager;

class ImageUploadService
{
    private ImageManager $manager;

    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());
    }

    /**
     * Redimensionne, compresse (WebP) et stocke une image sur le disque public.
     */
    public function store(UploadedFile $file, string $directory, int $maxWidth = 1600, int $quality = 82): string
    {
        $image = $this->manager->decodePath($file->getRealPath());
        $image->scaleDown(width: $maxWidth);
        $encoded = $image->encode(new WebpEncoder(quality: $quality));

        $path = trim($directory, '/').'/'.Str::uuid().'.webp';

        Storage::disk('public')->put($path, (string) $encoded);

        return $path;
    }

    public function delete(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }

    public function replace(?string $oldPath, ?UploadedFile $file, string $directory, int $maxWidth = 1600): ?string
    {
        if (! $file) {
            return $oldPath;
        }

        $this->delete($oldPath);

        return $this->store($file, $directory, $maxWidth);
    }
}

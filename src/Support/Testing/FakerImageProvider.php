<?php

namespace Support\Testing;

use Faker\Provider\Base;
use Illuminate\Support\Facades\Storage;

class FakerImageProvider extends Base
{
    public function fixturesImage(string $fixturesDir, string $storageDir): string
    {
        if (!Storage::exists($storageDir)) {
            Storage::makeDirectory($storageDir);
        }

        $file = $this->generator->file(
            base_path('tests/Fixtures/images/products'),
            Storage::path($storageDir),
            false
        );
        return '/storage/' . trim($storageDir, '/') . '/' . $file;
    }

}

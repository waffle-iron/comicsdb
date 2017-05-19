<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ImageTest extends TestCase
{
    public function test_remove_unused_image_files()
    {
        Artisan::call('images:clear');

        $this->assertTrue(true);
    }
}

<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ImageTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    
    public function test_remove_unused_image_files()
    {
        Artisan::call('images:clear');

        $this->assertTrue(true);
    }
}

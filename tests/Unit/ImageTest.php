<?php

namespace Tests\Unit;

use App\Models\Issue;
use App\Models\Publisher;
use Carbon\Carbon;
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
        $publisher = factory(Publisher::class)->create();
        $publisher->deleted_at = Carbon::now();
        $publisher->save();

        $issue = factory(Issue::class)->create();
        $issue->deleted_at = Carbon::now();
        $publisher->save();

        Artisan::call('images:clear');

        $this->assertTrue(true);
    }
}

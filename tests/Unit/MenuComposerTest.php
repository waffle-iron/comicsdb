<?php

namespace Tests\Unit;

use App\Http\ViewComposers\MenuComposer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Tests\TestCase;

class MenuComposerTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

    public function test_menu_composer()
    {
        $factory = app('Illuminate\Contracts\View\Factory');
        $mockView = $factory->make('layouts/app');
        $mockComposer = new MenuComposer();
        $mockComposer->compose($mockView);

        $this->assertArrayHasKey('menu', $mockView->getData());
    }
}

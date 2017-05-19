<?php

namespace Tests\User;

use App\Models\Creator;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreatorTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function test_returns_creator_instance()
    {
        $creator = new Creator();
        $this->assertInstanceOf(Creator::class, $creator);
    }
}

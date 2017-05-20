<?php

namespace Tests\User;

use App\Models\Creator;
use App\Models\Issue;
use App\Models\Volume;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreatorTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function test_returns_creator_instance()
    {
        $creator = factory(Creator::class)->create();
        $this->assertInstanceOf(Creator::class, $creator);
    }

    public function test_returns_an_issue_for_the_selected_creator()
    {
        $creator = factory(Creator::class)->create();
        $issue = factory(Issue::class)->create();
        $creator->issues()->save($issue);

        $this->assertEquals(1, $creator->issues()->count());
    }
}

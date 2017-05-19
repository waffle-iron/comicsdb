<?php

namespace Tests\Unit;

use App\Models\Creator;
use App\Models\Issue;
use App\Models\Volume;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class IssueTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function test_returns_volume_of_issue()
    {
        $volume = factory(Volume::class)->create();
        $issue = factory(Issue::class)->create();
        $issue->volume()->associate($volume);
        $issue->save();

        $this->assertInstanceOf(Volume::class, $issue->volume()->first());
    }

    public function test_returns_a_creator_for_the_selected_issue()
    {
        $creator = factory(Creator::class)->make();
        $issue = factory(Issue::class)->make();
        $issue->creators()->save($creator);

        $this->assertInstanceOf(Creator::class, $issue->creators()->first());
    }
}

<?php

namespace Tests\Feature;

use App\Http\Controllers\Api\CreatorController;
use App\Models\Creator;
use App\Models\Issue;
use App\Repositories\CreatorRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreatorControllerTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function test_get_creator_by_issue_id_without_issue_id()
    {
        factory(Creator::class, 2)->create();

        $creatorController = new CreatorController(new CreatorRepository());
        $creatorAmount = $creatorController->getByIssueId()->count();

        $this->assertEquals(2, $creatorAmount);
    }

    public function test_get_creator_by_issue_id_with_issue_id()
    {
        $creator = factory(Creator::class)->create();
        factory(Issue::class, 50)->create();
        $issue = Issue::first();

        $creatorController = new CreatorController(new CreatorRepository());
        $creator->issues()->attach($issue);
        $creator->save();

        $this->assertEquals(1, $creatorController->getByIssueId($issue->id)->count());
    }

    public function test_get_creator_by_id()
    {
        $creator = factory(Creator::class)->create();
        $creatorController = new CreatorController(new CreatorRepository());

        $this->assertInstanceOf(Creator::class, $creatorController->getById($creator->id));
    }
}

<?php

namespace Tests\Unit;

use App\Http\Requests\CreatorRequest;
use App\Http\Requests\IssueRequest;
use App\Http\Requests\PublisherRequest;
use App\Http\Requests\VolumeRequest;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RequestTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function test_check_creator_request()
    {
        $creatorRequest = new CreatorRequest();

        $this->assertTrue($creatorRequest->authorize());
        $this->assertArrayHasKey('lastname', $creatorRequest->rules());
    }

    public function test_check_issue_request()
    {
        $issueRequest = new IssueRequest();

        $this->assertTrue($issueRequest->authorize());
        $this->assertArrayHasKey('volume_id', $issueRequest->rules());
    }

    public function test_check_publisher_request()
    {
        $publisherRequest = new PublisherRequest();

        $this->assertTrue($publisherRequest->authorize());
        $this->assertArrayHasKey('name', $publisherRequest->rules());
        $this->assertArrayHasKey('name.required', $publisherRequest->messages());
    }

    public function test_check_volume_request()
    {
        $volumeRequest = new VolumeRequest();

        $this->assertTrue($volumeRequest->authorize());
        $this->assertArrayHasKey('name', $volumeRequest->rules());
        $this->assertArrayHasKey('name.required', $volumeRequest->messages());
    }
}

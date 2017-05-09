<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CreatorRepository;
use App\Repositories\IssueRepository;

/**
 * Class IssueController
 *
 * @package App\Http\Controllers\Api
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class IssueController extends Controller
{
    /**
     * @var IssueRepository
     */
    private $issueRepository;

    /**
     * @var
     */
    private $creatorRepository;

    /**
     * IssueController constructor.
     * @param IssueRepository $issueRepository
     * @param CreatorRepository $creatorRepository
     */
    public function __construct(IssueRepository $issueRepository, CreatorRepository $creatorRepository)
    {
        $this->issueRepository = $issueRepository;
        $this->creatorRepository = $creatorRepository;
    }

    /**
     * @param $issueId
     * @param $creatorId
     */
    public function addCreator($issueId, $creatorId)
    {
        $issue = $this->issueRepository->get((int)$issueId);
        $creator = $this->creatorRepository->get((int)$creatorId);
        $issue->creators()->save($creator);
    }

    /**
     * @param $issueId
     * @param $creatorId
     */
    public function deleteCreator($issueId, $creatorId)
    {
        $issue = $this->issueRepository->get((int)$issueId);
        $creator = $this->creatorRepository->get((int)$creatorId);

        $issue->creators()->detach($creator);
    }
}

<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Api;

use App\Repositories\CreatorRepository;

class CreatorController
{
    private $creatorRepository;

    public function __construct(CreatorRepository $creatorRepository)
    {
        $this->creatorRepository = $creatorRepository;
    }

    /**
     * @param int|null $issueId
     * @return \Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getByIssueId(int $issueId = null)
    {
        $creators = $issueId
            ? $this->creatorRepository->byIssue($issueId)
            : $this->creatorRepository->index();

        return $creators;
    }

    /**
     * @param int $id
     * @return \App\Models\Creator
     */
    public function getById(int $id)
    {
        $creator = $this->creatorRepository->get($id);

        return $creator;
    }
}

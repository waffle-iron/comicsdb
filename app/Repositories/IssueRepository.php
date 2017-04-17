<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Issue;

/**
 * Class IssueRepository
 * @package App\Repositories
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class IssueRepository
{
    /**
     * @param int $elementsPerPage
     * @return mixed
     */
    public function index(int $elementsPerPage = 6)
    {
        $issues = Issue::orderBy('number')
            ->paginate($elementsPerPage);

        return $issues;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        $issues = Issue::orderBy('number')
            ->get();

        return $issues;
    }
}

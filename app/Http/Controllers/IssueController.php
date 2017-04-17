<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Repositories\IssueRepository;

/**
 * Class IssueController
 * @package App\Http\Controllers
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class IssueController extends Controller
{
    /**
     * @var IssueRepository
     */
    private $issueRepository;

    /**
     * IssueController constructor.
     * @param IssueRepository $issueRepository
     */
    public function __construct(IssueRepository $issueRepository)
    {
        $this->issueRepository = $issueRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $issues = $this
            ->issueRepository
            ->index();

        return view('issues.index', [
            'issues' => $issues
        ]);
    }
}

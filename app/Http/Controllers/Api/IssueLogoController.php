<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\IssueLogoRepository;
use Illuminate\Http\Request;

/**
 * Class IssueLogoController
 *
 * @package App\Http\Controllers\Api
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class IssueLogoController extends Controller
{
    /**
     * @var IssueLogoRepository
     */
    private $issueLogoRepository;

    /**
     * IssueController constructor.
     * @param IssueLogoRepository $issueLogoRepository
     */
    public function __construct(IssueLogoRepository $issueLogoRepository)
    {
        $this->issueLogoRepository = $issueLogoRepository;
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->issueLogoRepository->store($request);
        return redirect()->route('issues.index');
    }
}

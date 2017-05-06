<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CreatorLogoRepository;
use App\Repositories\IssueLogoRepository;
use Illuminate\Http\Request;

/**
 * Class CreatorLogoController
 *
 * @package App\Http\Controllers\Api
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class CreatorLogoController extends Controller
{
    /**
     * @var IssueLogoRepository
     */
    private $creatorLogoRepository;

    /**
     * IssueController constructor.
     * @param CreatorLogoRepository $creatorLogoRepository
     */
    public function __construct(CreatorLogoRepository $creatorLogoRepository)
    {
        $this->creatorLogoRepository = $creatorLogoRepository;
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->creatorLogoRepository->store($request);
        return redirect()->route('creators.index');
    }
}

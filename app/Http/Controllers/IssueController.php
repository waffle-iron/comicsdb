<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\IssueRequest;
use App\Repositories\IssueRepository;
use App\Repositories\VolumeRepository;

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

    /**
     * @param int|null $volume
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(int $volume = null)
    {
        $selected_volume_id = null;
        $volumeRepository = new VolumeRepository();

        if (isset($volume)) {
            $selected_volume_id = $volumeRepository->get($volume)->id;
        }

        $volumes = $volumeRepository
            ->all()
            ->pluck('name', 'id');

        return view('issues.create', [
            'selected_volume_id' => $selected_volume_id,
            'volumes' => $volumes
        ]);
    }

    /**
     * @param IssueRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(IssueRequest $request)
    {
        $this->issueRepository->store($request);

        return redirect()->route('issues.index');
    }
}

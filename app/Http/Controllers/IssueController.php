<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\IssueRequest;
use App\Repositories\IssueRepository;
use App\Repositories\VolumeRepository;

/**
 * Class IssueController
 *
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
     * @var VolumeRepository
     */
    private $volumeRepository;

    /**
     * IssueController constructor.
     *
     * @param IssueRepository $issueRepository
     * @param VolumeRepository $volumeRepository
     */
    public function __construct(IssueRepository $issueRepository, VolumeRepository $volumeRepository)
    {
        $this->issueRepository  = $issueRepository;
        $this->volumeRepository = $volumeRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $issues = $this->issueRepository->index();

        return view('issues.index', [
            'issues' => $issues,
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $issue = $this->issueRepository->get($id);

        return view('issues.show', [
            'issue' => $issue,
        ]);
    }

    /**
     * @param int|null $volume
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(int $volume = null)
    {
        $selected_volume_id = isset($volume) ? $this->volumeRepository->get($volume)->id : null;
        $volumes            = $this->volumeRepository->all()->pluck('name', 'id');

        return view('issues.create', [
            'selected_volume_id' => $selected_volume_id,
            'volumes' => $volumes,
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

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $issue   = $this->issueRepository->get($id);
        $volumes = $this->volumeRepository->all()->pluck('name', 'id');

        return view('issues.edit', [
            'issue' => $issue,
            'volumes' => $volumes,
        ]);
    }

    /**
     * @param IssueRequest $issueRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(IssueRequest $issueRequest)
    {
        $this->issueRepository->update($issueRequest);

        return redirect()->route('issues.index');
    }
}

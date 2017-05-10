<?php

namespace App\Http\Controllers;

use App\Repositories\CreatorRepository;
use App\Repositories\IssueRepository;
use App\Repositories\PublisherRepository;
use App\Repositories\VolumeRepository;
use Carbon\Carbon;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class HomeController extends Controller
{
    /**
     * @var PublisherRepository
     */
    private $publisherRepository;

    /**
     * @var VolumeRepository
     */
    private $volumeRepository;

    /**
     * @var IssueRepository
     */
    private $issueRepository;


    private $creatorRepository;

    /**
     * HomeController constructor.
     * @param PublisherRepository $publisherRepository
     * @param VolumeRepository $volumeRepository
     * @param IssueRepository $issueRepository
     * @param CreatorRepository $creatorRepository
     */
    public function __construct(PublisherRepository $publisherRepository,
        VolumeRepository $volumeRepository,
        IssueRepository $issueRepository,
        CreatorRepository $creatorRepository)
    {
        $this->middleware('auth');
        $this->publisherRepository = $publisherRepository;
        $this->volumeRepository    = $volumeRepository;
        $this->issueRepository     = $issueRepository;
        $this->creatorRepository   = $creatorRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newestPublishers = $this->publisherRepository->latest();
        $newestVolumes = $this->volumeRepository->latest();
        $newestIssues = $this->issueRepository->latest();
        $newestCreators = $this->creatorRepository->latest();

        return view('home', [
            'newestPublishers' => $newestPublishers,
            'newestVolumes' => $newestVolumes,
            'newestIssues' => $newestIssues,
            'newestCreators' => $newestCreators
        ]);
    }
}

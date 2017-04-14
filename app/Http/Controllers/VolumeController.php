<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreVolumeRequest;
use App\Repositories\PublisherRepository;
use App\Repositories\VolumeRepository;

class VolumeController extends Controller
{
    /**
     * @var VolumeRepository
     */
    private $volumeRepository;

    /**
     * VolumeController constructor.
     * @param VolumeRepository $volumeRepository
     */
    public function __construct(VolumeRepository $volumeRepository)
    {
        $this->volumeRepository = $volumeRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $volumes = $this
            ->volumeRepository
            ->index(16);

        return view('volumes.index', [
            'volumes' => $volumes
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $publishersRepository = new PublisherRepository();
        $publishers           = $publishersRepository->all()->pluck('name', 'id');

        return view('volumes.create', [
            'publishers' => $publishers
        ]);
    }

    /**
     * @param StoreVolumeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreVolumeRequest $request)
    {
        $this->volumeRepository->store($request);

        return redirect()->route('volumes.index');
    }
}

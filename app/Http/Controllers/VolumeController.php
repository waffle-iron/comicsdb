<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\VolumeRepository;

class VolumeController extends Controller
{
    /**
     * @var VolumeRepository
     */
    private $volumesRepository;

    /**
     * VolumeController constructor.
     * @param VolumeRepository $volumeRepository
     */
    public function __construct(VolumeRepository $volumeRepository)
    {
        $this->volumesRepository = $volumeRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $volumes = $this
            ->volumesRepository
            ->index(16);

        return view('volumes.index', [
            'volumes' => $volumes
        ]);
    }
}

<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\VolumeRequest;
use App\Repositories\PublisherRepository;
use App\Repositories\VolumeRepository;
use Illuminate\Http\Request;

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
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $volume = $this->volumeRepository->get($id);

        return view('volumes.show', [
            'volume' => $volume
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
     * @param VolumeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VolumeRequest $request)
    {
        $this->volumeRepository->store($request);

        return redirect()->route('volumes.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $publisherRepository = new PublisherRepository();
        $publishers          = $publisherRepository->all()->pluck('name', 'id');
        $volume              = $this->volumeRepository->get($id);

        return view('volumes.edit', [
            'publishers' => $publishers,
            'volume' => $volume
        ]);
    }

    /**
     * @param VolumeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(VolumeRequest $request)
    {
        $this->volumeRepository->update($request);

        return redirect()->route('volumes.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $id = (int) $request->get('id');
        $this->volumeRepository->delete($id);

        return redirect()->route('volumes.index');
    }
}

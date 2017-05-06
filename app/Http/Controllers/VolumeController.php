<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\VolumeRequest;
use App\Models\Issue;
use App\Repositories\PublisherRepository;
use App\Repositories\VolumeRepository;
use Illuminate\Http\Request;

/**
 * Class VolumeController
 *
 * @package App\Http\Controllers
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class VolumeController extends Controller
{
    /**
     * @var VolumeRepository
     */
    private $volumeRepository;

    /**
     * @var PublisherRepository
     */
    private $publisherRepository;

    /**
     * VolumeController constructor.
     *
     * @param VolumeRepository $volumeRepository
     */
    public function __construct(VolumeRepository $volumeRepository, PublisherRepository $publisherRepository)
    {
        $this->volumeRepository    = $volumeRepository;
        $this->publisherRepository = $publisherRepository;
    }

    /**
     * @param int|null $publisherId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(int $publisherId = null)
    {
        $volumes = !isset($publisherId)
            ? $this->volumeRepository->index(16)
            : $this->volumeRepository->byPublisher($publisherId);

        return view('volumes.index', [
            'volumes' => $volumes,
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
            'volume' => $volume,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(int $publisherId = null)
    {
        $publishers = $this->publisherRepository->all()->pluck('name', 'id');

        return view('volumes.create', [
            'selected_publisher_id' => $publisherId,
            'publishers' => $publishers,
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
        $publishers = $this->publisherRepository->all()->pluck('name', 'id');
        $volume     = $this->volumeRepository->get($id);

        return view('volumes.edit', [
            'publishers' => $publishers,
            'volume' => $volume,
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

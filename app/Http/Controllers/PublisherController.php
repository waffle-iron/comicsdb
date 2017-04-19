<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\PublisherRequest;
use App\Repositories\PublisherRepository;
use Illuminate\Http\Request;

/**
 * Class PublisherController
 *
 * @package App\Http\Controllers
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class PublisherController extends Controller
{
    /** @var PublisherRepository  */
    private $publisherRepository;

    /**
     * PublisherController constructor.
     *
     * @param PublisherRepository $publisherRepository
     */
    public function __construct(PublisherRepository $publisherRepository)
    {
        $this->publisherRepository = $publisherRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $publishers = $this->publisherRepository->index();

        return view('publishers.index', [
            'publishers' => $publishers
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $publisher = $this->publisherRepository->get($id);

        return view('publishers.show', [
            'publisher' => $publisher
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $countries = \Countries::all()->pluck('name.common', 'name.common');

        return view('publishers.create', [
            'countries' => $countries
        ]);
    }

    /**
     * @param PublisherRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PublisherRequest $request)
    {
        $this->publisherRepository->store($request);

        return redirect()->route('publishers.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $countries = \Countries::all()->pluck('name.common', 'name.common');
        $publisher = $this->publisherRepository->get($id);

        return view('publishers.edit', [
            'publisher' => $publisher,
            'countries' => $countries
        ]);
    }

    /**
     * @param PublisherRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PublisherRequest $request)
    {
        $this->publisherRepository->update($request);

        return redirect()->route('publishers.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $id = $request->get('id');
        $this->publisherRepository->delete($id);

        return redirect()->route('publishers.index');
    }
}

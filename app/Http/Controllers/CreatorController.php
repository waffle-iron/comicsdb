<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\CreatorRequest;
use App\Repositories\CreatorRepository;
use Illuminate\Http\Request;

/**
 * Class CreatorController
 *
 * @package App\Http\Controllers
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class CreatorController extends Controller
{
    private $creatorRepository;

    public function __construct(CreatorRepository $creatorRepository)
    {
        $this->creatorRepository = $creatorRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $creators = $this->creatorRepository->index();

        return view('creators.index', [
            'creators' => $creators
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $creator = $this->creatorRepository->get($id);

        return view('creators.show', [
            'creator' => $creator
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $countries = \Countries::all()->pluck('name.common', 'name.common');

        return view('creators.create', [
            'countries' => $countries
        ]);
    }

    /**
     * @param CreatorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatorRequest $request)
    {
        $this->creatorRepository->store($request);

        return redirect()->route('creators.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $creator   = $this->creatorRepository->get($id);
        $countries = \Countries::all()->pluck('name.common', 'name.common');

        return view('creators.edit', [
            'creator' => $creator,
            'countries' => $countries
        ]);
    }

    /**
     * @param CreatorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreatorRequest $request)
    {
        $this->creatorRepository->update($request);

        return redirect()->route('creators.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $id = (int) $request->get('id');
        $this->creatorRepository->delete($id);

        return redirect()->route('creators.index');
    }
}

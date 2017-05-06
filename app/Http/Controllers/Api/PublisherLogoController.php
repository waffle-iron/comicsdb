<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\PublisherLogoRepository;
use App\Repositories\PublisherRepository;
use Illuminate\Http\Request;

/**
 * Class LogoController
 *
 * @package App\Http\Controllers
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class PublisherLogoController extends Controller
{
    /**
     * @var PublisherRepository
     */
    private $publisherRepository;

    /**
     * @var PublisherLogoRepository
     */
    private $publisherLogoRepository;

    /**
     * PublisherController constructor.
     *
     * @param PublisherRepository $publisherRepository
     * @param PublisherLogoRepository $publisherLogoRepository
     */
    public function __construct(PublisherRepository $publisherRepository, PublisherLogoRepository $publisherLogoRepository)
    {
        $this->publisherRepository     = $publisherRepository;
        $this->publisherLogoRepository = $publisherLogoRepository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(int $id)
    {
        $publisher = $this->publisherRepository->get($id);

        return view('publishers.logo.create', [
            'publisher' => $publisher,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->publisherLogoRepository->store($request);
        return redirect()->route('publishers.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @internal param int $id
     */
    public function delete(Request $request)
    {
        $id = $request->get('id');
        $this->publisherLogoRepository->delete($id);

        return redirect()->route('publishers.index');
    }
}

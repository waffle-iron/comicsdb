<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Repositories\LogoRepository;
use App\Repositories\PublisherRepository;
use Illuminate\Http\Request;

/**
 * Class LogoController
 * @package App\Http\Controllers
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class LogoController extends Controller
{
    private $publisherRepository;
    private $logoRepository;

    /**
     * PublisherController constructor.
     * @param PublisherRepository $publisherRepository
     * @param LogoRepository $logoRepository
     */
    public function __construct(PublisherRepository $publisherRepository, LogoRepository $logoRepository)
    {
        $this->publisherRepository = $publisherRepository;
        $this->logoRepository = $logoRepository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(int $id)
    {
        $publisher = $this->publisherRepository->get($id);

        return view('publishers.logo.create', [
            'publisher' => $publisher
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->logoRepository->store($request);
        return redirect()->route('publishers.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @internal param int $id
     */
    public function delete(Request $request)
    {
        $id = (int)$request->get('id');
        $this->logoRepository->delete($id);

        return redirect()->route('publishers.index');
    }
}

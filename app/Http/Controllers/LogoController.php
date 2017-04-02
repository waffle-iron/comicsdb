<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Repositories\PublisherRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/**
 * Class LogoController
 * @package App\Http\Controllers
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class LogoController extends Controller
{
    private $publisherRepository;

    /**
     * PublisherController constructor.
     * @param PublisherRepository $publisherRepository
     */
    public function __construct(PublisherRepository $publisherRepository)
    {
        $this->publisherRepository = $publisherRepository;
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
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $destinationFile = $request->get('uuid').'.'.$extension;

        Storage::disk('publishers')->put($destinationFile, File::get($file));

        return redirect()->route('publishers.index');
    }
}

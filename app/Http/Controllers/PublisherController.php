<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Repositories\PublisherRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class PublisherController
 * @package App\Http\Controllers
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class PublisherController extends Controller
{
    /** @var PublisherRepository  */
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $publishers = $this
            ->publisherRepository
            ->index();

        return view('publishers.index', [
            'publishers' => $publishers
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $countries =  \Countries::all()->pluck('name.common', 'name.common');

        return view('publishers.create', [
            'countries' => $countries
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'The name cannot be empty.'
        ];

        $rules = [
            'name' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->publisherRepository->store($request);

        return redirect()->route('publishers.index');
    }
}

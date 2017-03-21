<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\PublisherRepository;

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
            ->index()
            ->sortBy('name');

        return view('publishers.index', [
            'publishers' => $publishers
        ]);
    }
}

<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\PublisherAliasRepository;
use Illuminate\Http\Request;

/**
 * Class PublisherAliasController
 *
 * @package App\Http\Controllers\Api
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class PublisherAliasController extends Controller
{
    /**
     * @var PublisherAliasRepository
     */
    private $publisherAliasRepository;

    /**
     * PublisherAliasController constructor.
     * @param PublisherAliasRepository $publisherAliasRepository
     */
    public function __construct(PublisherAliasRepository $publisherAliasRepository)
    {
        $this->publisherAliasRepository = $publisherAliasRepository;
    }

    /**
     * @param int $publisherId
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(int $publisherId)
    {
        $aliases = $this->publisherAliasRepository->get($publisherId);

        return response()->json($aliases);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->publisherAliasRepository->store($request);
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        $this->publisherAliasRepository->delete($id);
    }
}

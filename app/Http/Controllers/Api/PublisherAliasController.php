<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PublisherAlias;
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
     * @param int $publisherId
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(int $publisherId)
    {
        $aliases = PublisherAlias::where('publisher_id', $publisherId)->get();

        return response()->json($aliases);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $alias               = new PublisherAlias();
        $alias->alias        = $request->get('alias');
        $alias->publisher_id = $request->get('publisher_id');
        $alias->save();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        $alias = PublisherAlias::find($id);
        $alias->delete();
    }
}

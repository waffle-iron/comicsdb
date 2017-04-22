<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Models\PublisherAlias;
use Illuminate\Http\Request;

/**
 * Class PublisherAliasRepository
 *
 * @package App\Repositories
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class PublisherAliasRepository
{
    /**
     * @param int|null $publisherId
     * @return mixed
     */
    public function get(int $publisherId = null)
    {
        if (null !== $publisherId) {
            return PublisherAlias::where('publisher_id', $publisherId)->get();
        }

        return PublisherAlias::get();
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        PublisherAlias::create($request->except([
            'api_token',
        ]));
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        PublisherAlias::find($id)->delete();
    }

    /**
     * @param int $publisherId
     * @return mixed
     */
    public function byPublisher(int $publisherId)
    {
        $publisher_aliases = PublisherAlias::where('publisher_id', $publisherId)->get();

        return $publisher_aliases;
    }
}

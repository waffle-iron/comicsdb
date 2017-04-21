<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Models\PublisherAlias;

/**
 * Class PublisherAliasRepository
 *
 * @package App\Repositories
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class PublisherAliasRepository
{
    /**
     * @param int $publisher_id
     * @return mixed
     */
    public function byPublisher(int $publisher_id)
    {
        $publisher_aliases = PublisherAlias::where('publisher_id', $publisher_id)->get();

        return $publisher_aliases;
    }
}

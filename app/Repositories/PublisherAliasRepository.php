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
     * @param int $publisherId
     * @return mixed
     */
    public function byPublisher(int $publisherId)
    {
        $publisher_aliases = PublisherAlias::where('publisher_id', $publisherId)->get();

        return $publisher_aliases;
    }
}

<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\IndexableInterface;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PublisherRepository
 * @package App\Repositories
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class PublisherRepository
    implements IndexableInterface
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        $publishers = Publisher::all();
        return $publishers;
    }
}

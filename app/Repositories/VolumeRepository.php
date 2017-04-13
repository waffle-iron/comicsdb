<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Volume;

/**
 * Class VolumeRepository
 * @package App\Repositories
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class VolumeRepository
{
    /**
     * Error message bag
     * @var \Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * @param int $elementsPerPage
     * @return mixed
     */
    public function index($elementsPerPage = 6)
    {
        $volumes = Volume::orderBy('name')
            ->paginate($elementsPerPage);

        return $volumes;
    }
}

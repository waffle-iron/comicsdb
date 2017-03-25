<?php
declare(strict_types = 1);

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface IndexableInterface
 * @package App\Interfaces
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
interface IndexableInterface
{
    /**
     * @return Collection
     */
    public function index(): Collection;
}

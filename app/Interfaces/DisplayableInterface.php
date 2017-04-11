<?php
declare(strict_types = 1);

namespace App\Interfaces;

/**
 * Interface DisplayableInterface
 * @package App\Interfaces
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
interface DisplayableInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id);
}

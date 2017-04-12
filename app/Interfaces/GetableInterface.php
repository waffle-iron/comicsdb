<?php
declare(strict_types = 1);

namespace App\Interfaces;

/**
 * Interface GetableInterface
 * @package App\Interfaces
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
interface GetableInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id);
}

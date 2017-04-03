<?php
declare(strict_types=1);

namespace App\Interfaces;

/**
 * Interface DeletableInterface
 * @package App\Interfaces
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
interface DeletableInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
}

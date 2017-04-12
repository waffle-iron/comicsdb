<?php
declare(strict_types = 1);

namespace App\Interfaces;

/**
 * Interface IndexableInterface
 * @package App\Interfaces
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
interface IndexableInterface
{
    /**
     * @return mixed
     */
    public function index();
}

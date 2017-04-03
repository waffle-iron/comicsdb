<?php
declare(strict_types = 1);

namespace App\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface StorableInterface
 * @package App\Interfaces
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
interface StorableInterface
{
    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request);
}

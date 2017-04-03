<?php
declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface UpdatableInterface
 * @package App\Interfaces
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
interface UpdatableInterface
{
    public function update(Request $request);
}

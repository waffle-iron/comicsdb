<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Publisher
 * @package App\Models
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class Publisher extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = [
        'founded_at'
    ];
}

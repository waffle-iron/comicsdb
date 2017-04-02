<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * Class Publisher
 *
 * @property string name
 * @property string uuid
 * @property \DateTime founded_at
 * @property string twitter
 * @property string website
 * @property string address
 * @property string city
 * @property string state
 * @property string zip
 * @property string country
 * @package App\Models
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class Publisher extends Model
{
    use SoftDeletes;
    use Searchable;

    /**
     * @var array
     */
    protected $guarded = [ ];

    /**
     * @var array
     */
    protected $dates = [
        'founded_at',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

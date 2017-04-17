<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * Class Issue
 * @package App\Models
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class Issue extends Model
{
    use Searchable;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = [
        'cover_date',
        'store_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'volume_id' => 'integer',
        'number' => 'integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function volume()
    {
        return $this->belongsTo(Volume::class, 'id', 'volume_id');
    }
}

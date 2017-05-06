<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * Class Issue
 *
 * @property int $id
 * @property string $uuid
 * @property int $volume_id
 * @property int $number
 * @property string $name
 * @property string $intro
 * @property \DateTime $cover_date
 * @property \DateTime $store_date
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 * @property \DateTime $deleted_at
 *
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
     * @var array
     */
    protected $guarded = [
        'image'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function volume()
    {
        return $this->belongsTo(Volume::class, 'volume_id', 'id');
    }
}

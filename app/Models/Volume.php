<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * Class Volume
 *
 * @property int $id
 * @property string $name
 * @property int number
 * @property int $year
 * @property int $publisher_id
 *
 * @package App\Models
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class Volume extends Model
{
    use Searchable;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $guarded = [ ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }
}

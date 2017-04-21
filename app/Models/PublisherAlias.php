<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * Class PublisherAlias
 *
 * @property int $id
 * @property int $publisher_id
 * @property string $alias
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 * @property \DateTime $deleted_at
 *
 * @package App\Models
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class PublisherAlias extends Model
{
    use SoftDeletes;
    use Searchable;

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'id', 'publisher_id');
    }
}

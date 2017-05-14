<?php

namespace App\Models;

use Carbon\Carbon;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * Class Volume
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int number
 * @property int $year
 * @property int $publisher_id
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 * @property \DateTime $deleted_at
 *
 * @package App\Models
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class Volume extends Model
{
    use Searchable;
    use SoftDeletes;
    use CascadeSoftDeletes;

    /**
     * @var array
     */
    protected $guarded = [ ];

    /**
     * @var array
     */
    protected $cascadeDeletes = [
        'issues',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @return mixed
     */
    public function latest()
    {
        return $this->orderBy('created_at', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function issues()
    {
        return $this->hasMany(Issue::class, 'volume_id', 'id');
    }

    /**
     * @return Issue
     */
    public function getLastIssue()
    {
        $issue = $this->issues()->orderBy('number', 'desc')->first();
        return isset($issue) ? $issue : new Issue();
    }
}

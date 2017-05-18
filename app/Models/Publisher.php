<?php
declare(strict_types = 1);

namespace App\Models;

use Carbon\Carbon;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * Class Publisher
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string description
 * @property \DateTime $founded_at
 * @property string $twitter
 * @property string $website
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $country
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 * @property \DateTime $deleted_at
 *
 * @package App\Models
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class Publisher extends Model
{
    use SoftDeletes;
    use Searchable;
    use CascadeSoftDeletes;

    /**
     * @var array
     */
    protected $guarded = [
        'image'
    ];

    /**
     * @var array
     */
    protected $cascadeDeletes = [
        'volumes',
        'aliases',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'founded_at',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function volumes()
    {
        return $this->hasMany(Volume::class, 'publisher_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aliases()
    {
        return $this->hasMany(PublisherAlias::class, 'publisher_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function issues()
    {
        return $this->hasManyThrough(Issue::class, Volume::class);
    }

    public function creators()
    {
        return \DB::table('publishers')
            ->join('volumes', 'volumes.publisher_id', '=', 'publishers.id')
            ->join('issues', 'issues.volume_id', '=', 'volumes.id')
            ->join('creator_issue', 'creator_issue.issue_id', '=', 'issues.id')
            ->join('creators', 'creators.id', '=', 'creator_issue.creator_id')
            ->select('creators.*')
            ->where('publishers.id', '=', $this->id)
            ->get();
    }
}

<?php
declare(strict_types = 1);

namespace App\Models;

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

    /**
     * @var array
     */
    protected $guarded = [
        'image'
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
     * @return int
     */
    public function amountOfIssues() : int
    {
        $amount = 0;

        $volumes = $this->volumes()->get();

        foreach ($volumes as $volume) {
            $amount += $volume->issues()->count();
        }

        return $amount;
    }
}

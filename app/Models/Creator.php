<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * Class Creator
 *
 * @propetry int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $gender
 * @property \DateTime $birthdate
 * @property \DateTime $deathdate
 * @property string $city
 * @property string $country
 * @property string $email
 * @property string $twitter
 * @property string $website
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 * @property \DateTime $deleted_at
 *
 * @package App
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class Creator extends Model
{
    use Searchable;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = [
        'birthdate',
        'deathdate',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @var array
     */
    protected $guarded = [
        'image'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function issues()
    {
        return $this->belongsToMany(Issue::class);
    }
}

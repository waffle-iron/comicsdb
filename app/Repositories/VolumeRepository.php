<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Http\Requests\VolumeRequest;
use App\Models\Volume;

/**
 * Class VolumeRepository
 *
 * @package App\Repositories
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class VolumeRepository
{
    /**
     * Error message bag
     * @var \Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * @param int $elementsPerPage
     * @return mixed
     */
    public function index ($elementsPerPage = 6)
    {
        $volumes = Volume::orderBy('name')->paginate($elementsPerPage);

        return $volumes;
    }

    /**
     * @return mixed
     */
    public function all ()
    {
        $volumes = Volume::orderBy('name')->get();

        return $volumes;
    }

    /**
     * @param int $id
     * @return Volume
     */
    public function get (int $id) : Volume
    {
        $volume = Volume::find($id);

        return $volume;
    }

    /**
     * @param VolumeRequest $request
     * @return void
     */
    public function store (VolumeRequest $request)
    {
        Volume::create($request->all());
    }

    /**
     * @param VolumeRequest $request
     * @return void
     */
    public function update (VolumeRequest $request)
    {
        $volume = Volume::find(
            $request->get('id')
        );

        $volume->fill($request->all());
        $volume->save();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete (int $id)
    {
        Volume::find($id)->delete();
    }
}

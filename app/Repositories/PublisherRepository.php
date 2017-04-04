<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Interfaces\DeletableInterface;
use App\Interfaces\GetableInterface;
use App\Interfaces\IndexableInterface;
use App\Interfaces\StorableInterface;
use App\Interfaces\UpdatableInterface;
use App\Models\Publisher;
use Illuminate\Http\Request;

/**
 * Class PublisherRepository
 * @package App\Repositories
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class PublisherRepository implements IndexableInterface, GetableInterface, StorableInterface, UpdatableInterface, DeletableInterface
{
    /**
     * Error message bag
     * @var \Illuminate\Support\MessageBag
     */
    protected $errors;

    public function index()
    {
        $publishers = Publisher::orderBy('name')
            ->paginate(6);

        return $publishers;
    }

    /**
     * @param int $id
     * @return Publisher
     */
    public function get(int $id) : Publisher
    {
        $publisher = Publisher::find($id);
        return $publisher;
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        Publisher::create($request->all());
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        $publisher = Publisher::find(
            $request->get('id')
        );

        $publisher->fill($request->all());
        $publisher->save();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        Publisher::find($id)->delete();
    }
}

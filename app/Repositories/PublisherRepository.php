<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Publisher;
use Illuminate\Http\Request;

/**
 * Class PublisherRepository
 * @package App\Repositories
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class PublisherRepository
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
    public function index($elementsPerPage = 6)
    {
        $publishers = Publisher::orderBy('name')
            ->paginate($elementsPerPage);

        return $publishers;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        $publishers = Publisher::orderBy('name')
            ->get();

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
     * @return void
     */
    public function store(Request $request)
    {
        Publisher::create($request->all());
    }

    /**
     * @param Request $request
     * @return void
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

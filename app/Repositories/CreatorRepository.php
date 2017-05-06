<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Http\Requests\CreatorRequest;
use App\Models\Creator;

/**
 * Class CreatorRepository
 *
 * @package App\Repositories
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class CreatorRepository
{
    /**
     * @param int $elementsPerPage
     * @return mixed
     */
    public function index(int $elementsPerPage = 15)
    {
        $creators = Creator::orderBy('lastname')->orderBy('firstname')->paginate($elementsPerPage);

        return $creators;
    }

    /**
     * @param int $id
     * @return Creator
     */
    public function get(int $id) : Creator
    {
        $creator = Creator::find($id);

        return $creator;
    }

    /**
     * @param CreatorRequest $request
     */
    public function store(CreatorRequest $request)
    {
        Creator::create($request->all());
        $this->storeImage($request);
    }

    /**
     * @param CreatorRequest $request
     * @return void
     */
    public function storeImage(CreatorRequest $request)
    {
        if ($request->hasFile('image')) {
            $logoRepository = new CreatorLogoRepository();
            $logoRepository->store($request);
        }
    }

    /**
     * @param CreatorRequest $request
     * @return void
     */
    public function update(CreatorRequest $request)
    {
        $creator = Creator::find(
            $request->get('id')
        );

        $creator->fill($request->all());
        $creator->save();
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        Creator::find($id)->delete();
    }
}

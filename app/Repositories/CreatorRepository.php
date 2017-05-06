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
}

<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Interfaces\IndexableInterface;
use App\Models\Publisher;
use Illuminate\Http\Request;

/**
 * Class PublisherRepository
 * @package App\Repositories
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class PublisherRepository
    implements IndexableInterface
{
    /**
     * Error message bag
     * @var \Illuminate\Support\MessageBag
     */
    protected $errors;

    public function index()
    {
        $publishers = Publisher::orderBy('name')
            ->paginate(3);

        return $publishers;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Publisher::create($request->all());
    }
}

<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\DeletableInterface;
use App\Interfaces\StorableInterface;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class LogoRepository
 * @package App\Repositories
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class LogoRepository implements StorableInterface, DeletableInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $destinationFile = $request->get('uuid').'.'.$extension;

        Storage::disk('publishers')->put($destinationFile, File::get($file));
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        $publisher = Publisher::find($id);
        Storage::disk('publishers')->delete($publisher->uuid . '.png');
    }
}

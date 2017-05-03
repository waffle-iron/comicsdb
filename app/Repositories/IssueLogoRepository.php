<?php
declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class IssueLogoRepository
 *
 * @package App\Repositories
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class IssueLogoRepository
{
    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $file      = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename  = $request->get('uuid').'.'.$extension;

        Storage::disk('issues')->put($filename, File::get($file));
    }
}

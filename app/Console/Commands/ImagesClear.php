<?php
declare(strict_types = 1);

namespace App\Console\Commands;

use App\Models\Publisher;
use App\Models\Volume;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

/**
 * Class ImagesClear
 *
 * @package App\Console\Commands
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class ImagesClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes all images from deleted records';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->removeRedundantPublisherImages();
        $this->removeRedundantVolumeImages();
    }

    /**
     * @return void
     */
    private function removeRedundantVolumeImages()
    {
        $this->line('Removing volumes images...');

        $trashed_volumes = Volume::onlyTrashed()->get();
        foreach ($trashed_volumes as $trashed_volume) {
            Storage::disk('public')->delete('volumes/'.$trashed_volume->uuid.'.png');
            $this->info($trashed_volume->uuid.'.png removed');
        }
    }

    /**
     * @return void
     */
    private function removeRedundantPublisherImages()
    {
        $this->line('Removing publishers images...');

        $trashed_publishers = Publisher::onlyTrashed()->get();
        foreach ($trashed_publishers as $trashed_publisher) {
            Storage::disk('public')->delete('publishers/'.$trashed_publisher->uuid.'.png');
            $this->info($trashed_publisher->uuid.'.png removed');
        }

    }
}

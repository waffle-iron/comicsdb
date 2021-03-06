<?php
declare(strict_types = 1);

namespace App\Console\Commands;

use App\Models\Issue;
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
        $this->removeRedundantIssueImages();
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

    /**
     * @return void
     */
    private function removeRedundantIssueImages()
    {
        $this->line('Removing issues images...');

        $trashed_issues = Issue::onlyTrashed()->get();
        foreach ($trashed_issues as $trashed_issue) {
            Storage::disk('public')->delete('issues/'.$trashed_issue->uuid.'.png');
            $this->info($trashed_issue->uuid.'.png removed');
        }

    }
}

<?php
declare(strict_types=1);

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Link;
use Spatie\Url\Url;

/**
 * Class MenuComposer
 *
 * @package App\Http\ViewComposers
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class MenuComposer
{
    /**
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $menu = Menu::new()
            ->route('dashboard.index', '<i class="fa fa-home fa-lg"></i><span class="nav-label">Dashboard</span>')
            ->submenu('<a href="#"><i class="fa fa-newspaper-o fa-lg"></i><span class="nav-label">Publishers</span><i class="fa arrow"></i></a>', function (Menu $menu) {
                $menu
                    ->route('publishers.index', '<span class="nav-label">Publisher List</span>')
                    ->route('publishers.create', '<span class="nav-label">Create Publisher</span>');
            })
            ->submenu('<a href="#"><i class="fa fa-cubes fa-lg"></i><span class="nav-label">Volumes</span><i class="fa arrow"></i></a>', function (Menu $menu) {
                $menu
                    ->route('volumes.index', '<span class="nav-label">Volumes List</span>')
                    ->route('volumes.create', '<span class="nav-label">Create Volumes</span>');
            })
            ->submenu('<a href="#"><i class="fa fa-file fa-lg"></i><span class="nav-label">Issues</span><i class="fa arrow"></i></a>', function (Menu $menu) {
                $menu
                    ->route('issues.index', '<span class="nav-label">Issues List</span>')
                    ->route('issues.create', '<span class="nav-label">Create Issue</span>');
            })
            ->setAttribute('class', 'side-menu')
            ->setActive(function (Link $link) {
                return Url::fromString($link->url())->getSegment(1) == request()->segment(1);
            });

        $view->with('menu', $menu);
    }
}

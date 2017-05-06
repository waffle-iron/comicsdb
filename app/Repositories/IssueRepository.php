<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Http\Requests\IssueRequest;
use App\Models\Issue;

/**
 * Class IssueRepository
 *
 * @package App\Repositories
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class IssueRepository
{
    /**
     * @param int $elementsPerPage
     * @return mixed
     */
    public function index(int $elementsPerPage = 6)
    {
        $issues = Issue::orderBy('number')->paginate($elementsPerPage);

        return $issues;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        $issues = Issue::orderBy('number')->get();

        return $issues;
    }

    /**
     * @param int $id
     * @return Issue
     */
    public function get(int $id) : Issue
    {
        $issue = Issue::find($id);

        return $issue;
    }

    /**
     * @param IssueRequest $request
     * @return void
     */
    public function store(IssueRequest $request)
    {
        Issue::create($request->all());
        $this->storeImage($request);
    }

    /**
     * @param IssueRequest $request
     * @return void
     */
    public function update(IssueRequest $request)
    {
        $issue = Issue::find(
            $request->get('id')
        );

        $issue->fill($request->all());
        $issue->save();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        Issue::find($id)->delete();
    }

    /**
     * @param IssueRequest $request
     * @return void
     */
    public function storeImage(IssueRequest $request)
    {
        if ($request->hasFile('image')) {
            $logoRepository = new IssueLogoRepository();
            $logoRepository->store($request);
        }
    }
}

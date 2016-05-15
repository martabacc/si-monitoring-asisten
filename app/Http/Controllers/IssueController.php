<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Issue\CreateIssueRequest;
use App\Http\Requests\Issue\UpdateIssueRequest;
use App\Repositories\IssueRepository;
use App\Repositories\ActivityRepository;

class IssueController extends Controller
{
    public $modelName = 'issue';

    /**
     * ActivityRepository dependency
     */
    protected $activityRepository;

    /**
     * IssueRepository dependency
     */
    protected $modelRepository;

    /**
     * Create a new Activity controller instance.
     *
     * @param   IssueRepository Repository to access App\Models\Issue
     * @param   ActivityRepository Repository to access App\Models\Activity
     * @return  void
     */
    public function __construct(IssueRepository $issueRepository, ActivityRepository $activityRepository)
    {
        $this->modelRepository = $issueRepository;

        $this->activityRepository = $activityRepository;
    }

    /**
     * Show form to create a new instance
     */
    protected function create()
    {
        $activities = $this->activityRepository->findAll();

        $stringView = 'pages.'.$this->modelName.'.create';

        return view($stringView, compact('activities'));
    }

    /**
     * Create a new issue instance
     *
     * @param  CreateIssueRequest  $request
     */
    protected function store(CreateIssueRequest $request)
    {
        $data = $request->all();

        $this->modelRepository->create($data);

        return redirect()->back()->with('issueAdded', 'ok');
    }

    /**
     * Update the specified user instance in database
     * 
     * @param  UpdateIssueRequest $request
     * @return view updatedIssue
     */
    protected function update(UpdateIssueRequest $request, $id)
    {
        $data = $request->only('activity_id', 'problem', 'urgency', 'solution');

        $this->modelRepository->update($id, $data);

        return redirect()->back()->with('issueUpdated', 'ok');
    }

    /**
     * Delete the spcified user instance from database
     * 
     * @param  int $id activity_id
     */
    protected function destroy($id)
    {
        $this->modelRepository->delete($id);

        return redirect()->back()->with('activityDeleted', 'ok');
    }

    /**
     * Edit the specified user instance
     * 
     * @param  int $id model_id
     * @return view edit_form
     */
    protected function edit($id)
    {
        $stringView = 'pages.'.$this->modelName.'.edit';

        $activities = $this->activityRepository->findAll();

        $instance = $this->modelRepository->find($id);
        
        return view($stringView)
            ->with($this->modelName, $instance)
            ->with('activities', $activities);
    }
}

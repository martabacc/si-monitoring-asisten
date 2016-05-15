<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Subject\CreateSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;

use App\Repositories\SubjectRepository;

class SubjectController extends Controller
{
    public $modelName = 'subject';

    /**
     * SubjectRepository dependency
     */
    protected $modelRepository;

    /**
     * Create a new Subject controller instance.
     *
     * @param   SubjectRepository Repository to access App\Models\Subjects
     * @return  void
     */
    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->modelRepository = $subjectRepository;
    }

    /**
     * Create a new teacher instance
     *
     * @param  CreateSubjectRequest  $request
     */
    protected function store(CreateSubjectRequest $request)
    {
        $data = $request->all();

        $this->modelRepository->create($data);

        return redirect()->back()->with('subjectAdded', 'ok');
    }

    /**
     * Update the specified user instance in database
     * 
     * @param  UpdateSubjectRequest $request
     * @return view updatedSubject
     */
    protected function update(UpdateSubjectRequest $request, $id)
    {
        $data = $request->only('subject_id', 'class');

        $this->modelRepository->update($id, $data);

        return redirect()->back()->with('subjectUpdated', 'ok');
    }

    /**
     * Delete the spcified user instance from database
     * 
     * @param  int $id subject_id
     */
    protected function destroy($id)
    {
        $this->modelRepository->delete($id);

        return redirect()->back()->with('subjectDeleted', 'ok');
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

        $instance = $this->modelRepository->find($id);
        
        return view($stringView)
            ->with($this->modelName, $instance);
    }
}

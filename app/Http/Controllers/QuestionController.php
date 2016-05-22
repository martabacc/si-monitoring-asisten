<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\QuestionRepository;

class QuestionController extends Controller
{
    public $modelName = 'question';

    /**
     * SubjectRepository dependency
     */
    protected $modelRepository;

    /**
     * Create a new Question controller instance.
     *
     * @param   QuestionRepository Repository to access App\Models\Question
     * @return  void
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->modelRepository = $questionRepository;
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
        $data = $request->only('name', 'description');

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

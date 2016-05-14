<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classes\CreateClassRequest;
use App\Http\Requests\Classes\UpdateClassRequest;

use App\Repositories\ClassRepository;
use App\Repositories\SubjectRepository;

class ClassController extends Controller
{
    public $modelName = 'class';

    /**
     * SubjectRepository dependency
     */
    protected $subjectRepository;

    /**
     * ClassRepository dependency
     */
    protected $modelRepository;

    /**
     * Create a new Class controller instance.
     *
     * @param   ClassRepository Repository to access App\Models\Classes
     * @return  void
     */
    public function __construct(ClassRepository $classRepository, SubjectRepository $subjectRepository)
    {
        $this->modelRepository = $classRepository;

        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Show form to create a new instance
     */
    protected function create()
    {
        $subjects = $this->subjectRepository->findAll();

        $stringView = 'pages.'.$this->modelName.'.create';

        return view($stringView, compact('subjects'));
    }

    /**
     * Create a new activity instance
     *
     * @param  CreateClassRequest  $request
     */
    protected function store(CreateClassRequest $request)
    {
        $data = $request->all();

        $this->modelRepository->create($data);

        return redirect()->back()->with('classAdded', 'ok');
    }

    /**
     * Update the specified user instance in database
     * 
     * @param  UpdateClassRequest $request
     * @return view updatedClass
     */
    protected function update(UpdateClassRequest $request, $id)
    {
        $data = $request->only('subject_id', 'class');

        $this->modelRepository->update($id, $data);

        return redirect()->back()->with('classUpdated', 'ok');
    }

    /**
     * Delete the spcified user instance from database
     * 
     * @param  int $id class_id
     */
    protected function destroy($id)
    {
        $this->modelRepository->delete($id);

        return redirect()->back()->with('classDeleted', 'ok');
    }

    /**
     * Edit the specified user instance
     * 
     * @param  int $id model_id
     * @return view edit_form
     */
    protected function edit($id)
    {
        $subjects = $this->subjectRepository->findAll();

        $stringView = 'pages.'.$this->modelName.'.edit';

        $instance = $this->modelRepository->find($id);
        
        return view($stringView)
            ->with($this->modelName, $instance)
            ->with('subjects', $subjects);
    }
}

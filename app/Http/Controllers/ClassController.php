<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClassController extends Controller
{
    public $modelName = 'class';;

    /**
     * ClassRepository dependency
     */
    protected $classRepository;

    /**
     * ActivityRepository dependency
     */
    protected $modelRepository;

    /**
     * Create a new Activity controller instance.
     *
     * @param   ActivityRepository Repository to access App\Models\Activity
     * @param   ClassRepository Repository to access App\Models\Classes
     * @return  void
     */
    public function __construct(ActivityRepository $activityRepository, ClassRepository $classRepository)
    {
        $this->modelRepository = $activityRepository;

        $this->classRepository = $classRepository;
    }


    protected function index()
    {
        $data['items'] = $this->classRepository->findAll();

        $stringView = 'pages.'.$this->modelName.'.index';

        return view($stringView, $data);
    }

    protected function create()
    {
        $classes = $this->classRepository->findAll();

        $stringView = 'pages.'.$this->modelName.'.create';

        return view($stringView, compact('classes'));
    }

    protected function store(CreateActivityRequest $request)
    {
        $data = $request->all();
        $data['assistant_id'] = \Auth::user()->id;

        $this->modelRepository->create($data);

        return redirect()->back()->with('activityAdded', 'ok');
    }

    protected function update(UpdateActivityRequest $request, $id)
    {
        $data = $request->only('class_id', 'name', 'date', 'duration', 'notes');

        $this->modelRepository->update($id, $data);

        return redirect()->back()->with('activityUpdated', 'ok');
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

        $classes = $this->classRepository->findAll();

        $instance = $this->modelRepository->find($id);

        return view($stringView)
            ->with($this->modelName, $instance)
            ->with('classes', $classes);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ActivityRepository;
use App\Repositories\ClassRepository;


class ClassController extends Controller
{
    public $modelName = 'class';

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
        $subject =  \App\Models\Subject::all();

        $stringView = 'pages.'.$this->modelName.'.create';

        return view($stringView, compact('classes'))->with('subjects', $subject);
    }

    protected function store(Request $request)
    {
        $data = $request->all();
        $data['assistant_id'] = \Auth::user()->id;

        \App\Models\Classes::create($data);

        return route('class.index');
    }

    protected function update(Request $request, $id)
    {
        $data = $request->only('class_id', 'name', 'date', 'duration', 'notes');

        \App\Models\Classes::update($id, $data);

        return redirect()->back()->with('activityUpdated', 'ok');
    }

    /**
     * Delete the spcified user instance from database
     *
     * @param  int $id activity_id
     */
    protected function destroy($id)
    {
        \App\Models\Classes::delete($id);

        return route('class.index');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Schedule\CreateScheduleRequest;
use App\Http\Requests\Schedule\UpdateScheduleRequest;

use App\Repositories\ScheduleRepository;
use App\Repositories\ClassRepository;

class ScheduleController extends Controller
{
    public $modelName = 'schedule';

    /**
     * ClassRepository dependency
     */
    protected $classRepository;

    /**
     * ScheduleRepository dependency
     */
    protected $modelRepository;

    /**
     * Create a new Subject controller instance.
     *
     * @param   ScheduleRepository Repository to access App\Models\Schedule
     * @return  void
     */
    public function __construct(ScheduleRepository $scheduleRepository, ClassRepository $classRepository)
    {
        $this->modelRepository = $scheduleRepository;

        $this->classRepository = $classRepository;
    }

    /**
     * Show form to create a new instance
     */
    protected function create()
    {
        $classes = $this->classRepository->findAll();

        $stringView = 'pages.'.$this->modelName.'.create';

        return view($stringView, compact('classes'));
    }

    /**
     * Create a new activity instance
     *
     * @param  CreateScheduleRequest  $request
     */
    protected function store(CreateScheduleRequest $request)
    {
        $data = $request->all();

        $this->modelRepository->create($data);

        return redirect()->back()->with('scheduleAdded', 'ok');
    }

    /**
     * Update the specified user instance in database
     * 
     * @param  UpdateSubjectRequest $request
     * @return view updatedSubject
     */
    protected function update(UpdateScheduleRequest $request, $id)
    {
        $data = $request->only('class_id', 'name', 'day', 'place', 'schedule');

        $this->modelRepository->update($id, $data);

        return redirect()->back()->with('scheduleUpdated', 'ok');
    }

    /**
     * Delete the spcified user instance from database
     * 
     * @param  int $id subject_id
     */
    protected function destroy($id)
    {
        $this->modelRepository->delete($id);

        return redirect()->back()->with('scheduleDeleted', 'ok');
    }

    /**
     * Edit the specified user instance
     * 
     * @param  int $id model_id
     * @return view edit_form
     */
    protected function edit($id)
    {
        $classes = $this->classRepository->findAll();

        $stringView = 'pages.'.$this->modelName.'.edit';

        $instance = $this->modelRepository->find($id);
        
        return view($stringView)
            ->with($this->modelName, $instance)
            ->with('classes', $classes);
    }
}

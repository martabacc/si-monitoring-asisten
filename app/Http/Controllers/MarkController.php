<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Activity\CreateActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Repositories\ActivityRepository;
use App\Repositories\ClassRepository;

class MarkController extends Controller
{
    public $modelName = 'mark';

    /**
     * ClassRepository dependency
     */
    protected $classRepository;

    /**
     * ActivityRepository dependency
     */
    protected $modelRepository;

    public function __construct(ActivityRepository $activityRepository, ClassRepository $classRepository)
    {
        $this->modelRepository = $activityRepository;

        $this->classRepository = $classRepository;
    }

    protected function index()
    {
        $stringView = 'pages.'.$this->modelName.'.index';

        $data['activities'] = $this->modelRepository->findAll();

        return view($stringView, $data);
    }


    /**
     * Show form to create a new instance
     */
    protected function create()
    {
        $data['activities'] = $this->modelRepository->unsubmittedMark();

        $stringView = 'pages.'.$this->modelName.'.create';

        return view($stringView, $data);
    }

    /**
     * Create a new activity instance
     *
     * @param  CreateActivityRequest  $request
     */
    protected function store(Request $request)
    {
        $uploadedFile = $request->file('path_file');
//        dd($uploadedFile);
        $updatedInstance =$this->modelRepository->find($request->only('activity'));
            
        if($uploadedFile->isValid()){
            $destinationPath='assets/mark';
            $extension = $uploadedFile->getClientOriginalExtension();
            $fileName = 'activity-'. $updatedInstance[0]->id .'.' . $extension;
            $uploadedFile->move($destinationPath, $fileName);


            $updatedInstance->path_file = $fileName;
            $updatedInstance[0]->save();

            return redirect()->back()->with('markAdded','ok');
        }
        else{

            return redirect()->back()->with('markAdded', 'nope');
        }


    }

    /**
     * Update the specified user instance in database
     *
     * @param  UpdateActivityRequest $request
     * @return view updatedActivity
     */
    protected function update(Request $request)
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

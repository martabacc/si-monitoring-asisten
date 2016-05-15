<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Teacher\CreateTeacherRequest;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepository;

class TeacherController extends Controller
{
    public $modelName = 'teacher';

    /**
     * UserRepository dependency
     */
    protected $userRepository;

    /**
     * TeacherRepository dependency
     */
    protected $modelRepository;

    /**
     * Create a new Teacher controller instance.
     *
     * @param   TeacherRepository Repository to access App\Models\Teacher
     * @param   UserRepository Repository to access App\Models\Users
     * @return  void
     */
    public function __construct(TeacherRepository $teacherRepository, UserRepository $userRepository)
    {
        $this->modelRepository = $teacherRepository;

        $this->userRepository = $userRepository;
    }

    /**
     * Show form to create a new instance
     */
    protected function create()
    {
        $users = $this->userRepository->findAll();

        $stringView = 'pages.'.$this->modelName.'.create';

        return view($stringView, compact('users'));
    }

    /**
     * Create a new activity instance
     *
     * @param  CreateTeacherRequest  $request
     */
    protected function store(CreateTeacherRequest $request)
    {
        $data = $request->all();

        $this->modelRepository->create($data);

        return redirect()->back()->with('teacherAdded', 'ok');
    }

    /**
     * Delete the spcified user instance from database
     * 
     * @param  int $id teacher_id
     */
    protected function destroy($id)
    {
        $this->modelRepository->delete($id);

        return redirect()->back()->with('teacherDeleted', 'ok');
    }
}

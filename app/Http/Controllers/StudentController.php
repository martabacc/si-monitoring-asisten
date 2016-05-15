<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Student\CreateStudentRequest;
use App\Repositories\StudentRepository;
use App\Repositories\UserRepository;

class StudentController extends Controller
{
    public $modelName = 'student';

    /**
     * UserRepository dependency
     */
    protected $userRepository;

    /**
     * StudentRepository dependency
     */
    protected $modelRepository;

    /**
     * Create a new Student controller instance.
     *
     * @param   StudentRepository Repository to access App\Models\Students
     * @param   UserRepository Repository to access App\Models\Users
     * @return  void
     */
    public function __construct(StudentRepository $studentRepository, UserRepository $userRepository)
    {
        $this->modelRepository = $studentRepository;

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
     * Create a new student instance
     *
     * @param  CreateStudentRequest  $request
     */
    protected function store(CreateStudentRequest $request)
    {
        $data = $request->all();

        $this->modelRepository->create($data);

        return redirect()->back()->with('studentAdded', 'ok');
    }

    /**
     * Delete the spcified user instance from database
     * 
     * @param  int $id student_id
     */
    protected function destroy($id)
    {
        $this->modelRepository->delete($id);

        return redirect()->back()->with('studentDeleted', 'ok');
    }
}

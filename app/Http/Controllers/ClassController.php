<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Classes\CreateClassRequest;
use App\Http\Requests\Classes\UpdateClassRequest;

use App\Repositories\ClassRepository;
use App\Repositories\SubjectRepository;
use App\Repositories\UserRepository;

class ClassController extends Controller
{
    public $modelName = 'class';

    /**
     * UserRepository dependency
     */
    protected $userRepository;

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
    public function __construct(ClassRepository $classRepository, UserRepository $userRepository, SubjectRepository $subjectRepository)
    {
        $this->modelRepository = $classRepository;

        $this->userRepository = $userRepository;

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

    /**
     * Add students to the specified class
     * @param int  $id      class_id
     * @param Request $request Illuminate\Http\Request;
     */
    protected function addStudents($id, Request $request)
    {
        $usernames = preg_split("/\r\n|\n|\r/", $request->all()["username"]);

        $user_ids = $this->userRepository->getIds($usernames);

        $this->modelRepository->addStudents($id, $user_ids);

        return redirect()->back()->with('studentsAdded', 'ok'); 
    }

    /**
     * View students of the specified class
     * @param  int $id class_id
     * @return collection     students
     */
    protected function viewStudents($id)
    {
        $students = $this->modelRepository->getStudents($id);

        $stringView = 'pages.'.$this->modelName.'.student';

        $instance = $this->modelRepository->find($id);

        return view($stringView, compact('students'))
            ->with($this->modelName, $instance);
    }

    /**
     * Delete students from the specified class
     * @param  int $class_id   class_id
     * @param  int $student_id student_id
     */
    protected function deleteStudents($class_id, $student_id)
    {
        $class = $this->modelRepository->deleteStudents($class_id, $student_id);

        return redirect()->back()->with('studentsDeleted', 'ok');
    }

    /**
     * Add assistants to the specified class
     * @param int  $id      class_id
     * @param Request $request Illuminate\Http\Request
     */
    protected function addAssistants($id, Request $request)
    {
        $usernames = preg_split("/\r\n|\n|\r/", $request->all()["username"]);

        $user_ids = $this->userRepository->getIds($usernames);

        $this->modelRepository->addAssistants($id, $user_ids);

        return redirect()->back()->with('assistantsAdded', 'ok'); 
    }

    /**
     * View assistants of the specified class
     * @param  int $id class_id
     * @return collection     teachers
     */
    protected function viewAssistants($id)
    {
        $assistants = $this->modelRepository->getAssistants($id);

        $stringView = 'pages.'.$this->modelName.'.assistant';

        $instance = $this->modelRepository->find($id);

        return view($stringView, compact('assistants'))
            ->with($this->modelName, $instance);
    }

    /**
     * Delete assistants from the specified class
     * @param  int $class_id     class_id
     * @param  int $assistant_id assistant_id
     */
    protected function deleteAssistants($class_id, $assistant_id)
    {
        $class = $this->modelRepository->deleteAssistants($class_id, $assistant_id);

        return redirect()->back()->with('assistantsDeleted', 'ok');
    }

    /**
     * Add teachers to the specified class
     * @param int  $id      class_id
     * @param Request $request Illuminate\Http\Request
     */
    protected function addTeachers($id, Request $request)
    {
        $usernames = preg_split("/\r\n|\n|\r/", $request->all()["username"]);

        $user_ids = $this->userRepository->getIds($usernames);

        $this->modelRepository->addTeachers($id, $user_ids);

        return redirect()->back()->with('teachersAdded', 'ok'); 
    }

    /**
     * View teachers of the specified class
     * @param  int $id teacher_id
     * @return collection     teachers
     */
    protected function viewTeachers($id)
    {
        $teachers = $this->modelRepository->getTeachers($id);

        $stringView = 'pages.'.$this->modelName.'.teacher';

        $instance = $this->modelRepository->find($id);

        return view($stringView, compact('teachers'))
            ->with($this->modelName, $instance);
    }

    /**
     * Delete teachers from the specified class
     * @param  int $class_id     class_id
     * @param  int $assistant_id assistant_id
     */
    protected function deleteTeachers($class_id, $assistant_id)
    {
        $class = $this->modelRepository->deleteTeachers($class_id, $assistant_id);

        return redirect()->back()->with('teachersDeleted', 'ok');
    }

    public function change($role){
//        return 'asdfadsfadsf';
        session()->set('role', 'bicis');
//        dd(session('role'));
    }

}
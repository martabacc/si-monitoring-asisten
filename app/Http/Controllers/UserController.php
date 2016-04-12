<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    public $modelName = 'user';

    /**
     * UserRepository dependency
     */
    protected $modelRepository;

    /**
     * Create a new authentication controller instance.
     *
     * @param   UserRepository Repository to access App\Models\User
     * @return  void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->modelRepository = $userRepository;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  CreateUserRequest  $request
     */
    protected function store(CreateUserRequest $request)
    {
        $data = $request->all();
        $data['privilege_id'] = 2;

        $this->modelRepository->create($data);

        return redirect()->back();
    }

    /**
     * Update the specified user instance in database
     * @param  UpdateUserRequest $request
     * @return view updatedUser
     */
    protected function update(UpdateUserRequest $request, $id)
    {
        $data = $request->all();

        $this->modelRepository->create($data);

        return redirect()->back();
    }

    /**
     * Delete the spcified user instance from database
     * @param  int $id user_id
     */
    protected function destroy($id)
    {
        $this->modelRepository->delete($id);

        return redirect()->back();
    }
}
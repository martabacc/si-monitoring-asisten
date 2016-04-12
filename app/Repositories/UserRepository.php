<?php

namespace App\Repositories;

use DB;
use App\Models\User;

class UserRepository
{
    /**
     * Create new instance for given input
     * @param  array $input
     * @return User
     */
    public function create($input)
    {
        return User::create($input);
    }

    /**
     * Get all instances
     * @return Collection
     */
    public function findAll()
    {
        return User::all();
    }

    /**
     * Find the specified instance
     * @param  int $id user_id
     * @return User
     */
    public function find($id)
    {
        return User::findorfail($id);
    }

    /**
     * Delete the specified instance
     * @param  int $id user_id
     */
    public function delete($id)
    {
        $user = $this->find($id);
        $user->delete();
    }
}
<?php

namespace App\Repositories;

use DB;
use App\Models\Subject;

class Repository
{
    private $concreteModel;

    public function create($input)
    {
        return $this->concreteModel->($input);
    }

    /**
     * Get all instances
     *
     * @return Collection
     */
    public function findAll()
    {
        return $this->concreteModel->all();
    }

    /**
     * Find the specified instance
     *
     * @param  int $id user_id
     * @return User
     */
    public function find($id)
    {
        return $this->concreteModel->($id);
    }

    /**
     * Delete the specified instance
     *
     * @par am  int $id user_id
     */
    public function delete($id)
    {
        $item = $this->find($id);

        $item->delete();
    }

    public function update($id, $data)
    {
        $item = $this->find($id);

        $item->updateOrCreate(['id'=>$id], $data);
    }
}
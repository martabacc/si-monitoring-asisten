<?php

namespace App\Repositories;

use DB;
use App\Models\Classes;

class ClassRepository
{
    /**
     * Create new instance for given input
     * @param  array $input
     * @return Class
     */
    public function create($input)
    {
        return Classes::create($input);
    }

    /**
     * Get all instances
     * @return Collection
     */
    public function findAll()
    {
        return Classes::all();
    }

    /**
     * Find the specified instance
     * @param  int $id class_id
     * @return Classes
     */
    public function find($id)
    {
        return Classes::findorfail($id);
    }

    /**
     * Delete the specified instance
     * @param  int $id class_id
     */
    public function delete($id)
    {
        $class = $this->find($id);
        
        $class->delete();
    }
    
    /**
     * Update the specified instance
     * @param  int $id class_id
     * @param  array $data update_data
     */
    public function update($id, $data)
    {
        $class = $this->find($id);

        $class->update($data);
    }

    public function classesList()
    {
        return dd(Classes::pluck('id')->all());
    }
}
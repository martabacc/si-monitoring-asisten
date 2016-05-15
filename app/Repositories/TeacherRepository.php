<?php

namespace App\Repositories;

use DB;
use App\Models\Teacher;

class TeacherRepository
{
    /**
     * Create new instance for given input
     * @param  array $input
     * @return Teacher
     */
    public function create($input)
    {
        return Teacher::create($input);
    }

    /**
     * Get all instances
     * @return Collection
     */
    public function findAll()
    {
        return Teacher::all();
    }

    /**
     * Find the specified instance
     * @param  int $id teacher_id
     * @return Teacher
     */
    public function find($id)
    {
        return Teacher::findorfail($id);
    }

    /**
     * Delete the specified instance
     * @param  int $id teacher_id
     */
    public function delete($id)
    {
        $teacher = $this->find($id);
        
        $teacher->delete();
    }
    
    /**
     * Update the specified instance
     * @param  int $id teacher_id
     * @param  array $data update_data
     */
    public function update($id, $data)
    {
        $teacher = $this->find($id);

        $teacher->update($data);
    }
}
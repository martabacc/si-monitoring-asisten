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

    /**
     * Get students for the following class
     * @param  int $id class_id
     * @return collection students_belongs_to_that_class
     */
    public function getStudents($id)
    {
        $class = $this->find($id);

        return $class->students;
    }

    /**
     * Add students for the following class
     * @param int $id class_id
     * @param array $data student_ids
     */
    public function addStudents($id, $data)
    {
        $class = $this->find($id);

        $class->students()->attach($data);
    }

    /**
     * Delete students for the following class
     * @param  int $class_id   class_id
     * @param  int $student_id student_id
     */
    public function deleteStudents($class_id, $student_id)
    {
        $class = $this->find($class_id);

        $class->students()->detach($student_id);
    }
}
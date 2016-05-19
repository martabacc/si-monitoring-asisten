<?php

namespace App\Repositories;

use DB;
use App\Models\Student;

class StudentRepository
{
    /**
     * Create new instance for given input
     * @param  array $input
     * @return Student
     */
    public function create($input)
    {
        return Student::create($input);
    }

    /**
     * Get all instances
     * @return Collection
     */
    public function findAll()
    {
        return Student::all();
    }

    /**
     * Find the specified instance
     * @param  int $id student_id
     * @return Student
     */
    public function find($id)
    {
        return Student::findorfail($id);
    }

    /**
     * Delete the specified instance
     * @param  int $id student_id
     */
    public function delete($id)
    {
        $student = $this->find($id);
        
        $student->delete();
    }
    
    /**
     * Update the specified instance
     * @param  int $id student_id
     * @param  array $data update_data
     */
    public function update($id, $data)
    {
        $student = $this->find($id);

        $student->update($data);
    }
}
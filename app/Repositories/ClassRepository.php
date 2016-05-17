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
     * @param  int $student_id assistant_id
     */
    public function deleteStudents($class_id, $assistant_id)
    {
        $class = $this->find($class_id);

        $class->assistants()->detach($assistant_id);
    }

    /**
     * Get assistants for the following class
     * @param  int $id class_id
     * @return collection assistants_belongs_to_that_class
     */
    public function getAssistants($id)
    {
        $class = $this->find($id);

        return $class->assistants;
    }

    /**
     * Add assistants for the following class
     * @param int $id class_id
     * @param array $data assistant_ids
     */
    public function addAssistants($id, $data)
    {
        $class = $this->find($id);

        $class->assistants()->attach($data);
    }

    /**
     * Delete assistants for the following class
     * @param  int $class_id   class_id
     * @param  int $assistant_id assistant_id
     */
    public function deleteAssistants($class_id, $assistant_id)
    {
        $class = $this->find($class_id);

        $class->assistants()->detach($assistant_id);
    }

    /**
     * Get teachers for the following class
     * @param  int $id teacher_id
     * @return collection teachers_belongs_to_that_class
     */
    public function getTeachers($id)
    {
        $class = $this->find($id);

        return $class->teachers;
    }

    /**
     * Add teachers for the following class
     * @param int $id class_id
     * @param array $data teachers_id
     */
    public function addTeachers($id, $data)
    {
        $class = $this->find($id);

        $class->teachers()->attach($data);
    }

    /**
     * Delete teachers for the following class
     * @param  int $class_id   class_id
     * @param  int $teacher_id teacher_id
     */
    public function deleteTeachers($class_id, $teacher_id)
    {
        $class = $this->find($class_id);

        $class->teachers()->detach($teacher_id);
    }
}
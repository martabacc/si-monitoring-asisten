<?php

namespace App\Repositories;

use DB;
use App\Models\Subject;

class SubjectRepository
{
    /**
     * Create new instance for given input
     * @param  array $input
     * @return Subject
     */
    public function create($input)
    {
        return Subject::create($input);
    }

    /**
     * Get all instances
     * @return Collection
     */
    public function findAll()
    {
        return Subject::all();
    }

    /**
     * Find the specified instance
     * @param  int $id class_id
     * @return Subjects
     */
    public function find($id)
    {
        return Subject::findorfail($id);
    }

    /**
     * Delete the specified instance
     * @param  int $id subject_id
     */
    public function delete($id)
    {
        $subjecr = $this->find($id);
        
        $subject->delete();
    }
    
    /**
     * Update the specified instance
     * @param  int $id subject_id
     * @param  array $data update_data
     */
    public function update($id, $data)
    {
        $subject = $this->find($id);

        $subject->update($data);
    }
}
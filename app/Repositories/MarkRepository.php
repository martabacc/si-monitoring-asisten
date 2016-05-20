<?php

namespace App\Repositories;

use DB;
use App\Models\Subject;

class MarkRepository
{
    /**
     * Create new instance for given input
     * @param  array $input
     * @return Class
     */
    public function create($input)
    {
        return Mark::create($input);
    }

    /**
     * Get all instances
     * @return Collection
     */
    public function findAll()
    {
        return Subject::where('path_file','==');
    }

    /**
     * Find the specified instance
     * @param  int $id class_id
     * @return Classes
     */
    public function findMark($id)
    {
        return Subject::findorfail($id);
    }

    /**
     * Delete the specified instance
     * @param  int $id class_id
     */
    public function delete($id)
    {
        $mark = $this->find($id);

        $mark->delete();
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

}
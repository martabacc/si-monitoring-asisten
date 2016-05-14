<?php

namespace App\Repositories;

use DB;
use App\Models\Activity;

class ActivityRepository
{
    /**
     * Create new instance for given input
     * @param  array $input
     * @return Activity
     */
    public function create($input)
    {
        return Activity::create($input);
    }

    /**
     * Get all instances
     * @return Collection
     */
    public function findAll()
    {
        $lala = new Activity();
        return $lala->findAll();
    }

    /**
     * Find the specified instance
     * @param  int $id activity_id
     * @return Activity
     */
    public function find($id)
    {
        return Activity::findorfail($id);
    }

    /**
     * Delete the specified instance
     * @param  int $id activity_id
     */
    public function delete($id)
    {
        $activity = $this->find($id);
        
        $activity->delete();
    }

    
    /**
     * Update the specified instance
     * @param  int $id activity_id
     * @param  array $data update_data
     */
    public function update($id, $data)
    {
        $activity = $this->find($id);

        $activity->update($data);
    }
}
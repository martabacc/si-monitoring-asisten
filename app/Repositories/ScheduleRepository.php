<?php

namespace App\Repositories;

use DB;
use App\Models\Schedule;

class ScheduleRepository
{
    /**
     * Create new instance for given input
     * @param  array $input
     * @return Schedule
     */
    public function create($input)
    {
        return Schedule::create($input);
    }

    /**
     * Get all instances
     * @return Collection
     */
    public function findAll()
    {
        return Schedule::all();
    }

    /**
     * Find the specified instance
     * @param  int $id schedule_id
     * @return Schedules
     */
    public function find($id)
    {
        return Schedule::findorfail($id);
    }

    /**
     * Delete the specified instance
     * @param  int $id schedule_id
     */
    public function delete($id)
    {
        $schedule = $this->find($id);
        
        $schedule->delete();
    }
    
    /**
     * Update the specified instance
     * @param  int $id schedule_id
     * @param  array $data update_data
     */
    public function update($id, $data)
    {
        $schedule = $this->find($id);

        $schedule->update($data);
    }
}
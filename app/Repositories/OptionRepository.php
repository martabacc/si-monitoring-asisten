<?php

namespace App\Repositories;

use DB;
use App\Models\Option;

class OptionRepository
{
    /**
     * Create new instance for given input
     * @param  array $input
     * @return Option
     */
    public function create($input)
    {
        return Option::create($input);
    }

    /**
     * Get all instances
     * @return Collection
     */
    public function findAll()
    {
        return Option::all();
    }

    /**
     * Find the specified instance
     * @param  int $id option_id
     * @return Options
     */
    public function find($id)
    {
        return Option::findorfail($id);
    }

    /**
     * Delete the specified instance
     * @param  int $id option_id
     */
    public function delete($id)
    {
        $option = $this->find($id);
        
        $option->delete();
    }
    
    /**
     * Update the specified instance
     * @param  int $id option_id
     * @param  array $data update_data
     */
    public function update($id, $data)
    {
        $option = $this->find($id);

        $option->update($data);
    }
}
<?php

namespace App\Repositories;

use DB;
use App\Models\Assistant;

class AssistantRepository
{
    /**
     * Create new instance for given input
     * @param  array $input
     * @return Assistant
     */
    public function create($input)
    {
        return Assistant::create($input);
    }

    /**
     * Get all instances
     * @return Collection
     */
    public function findAll()
    {
        return Assistant::all();
    }

    /**
     * Find the specified instance
     * @param  int $id assistant_id
     * @return Assistant
     */
    public function find($id)
    {
        return Assistant::findorfail($id);
    }

    /**
     * Delete the specified instance
     * @param  int $id assistant_id
     */
    public function delete($id)
    {
        $assistant = $this->find($id);
        
        $assistant->delete();
    }
    
    /**
     * Update the specified instance
     * @param  int $id assistant_id
     * @param  array $data update_data
     */
    public function update($id, $data)
    {
        $assistant = $this->find($id);

        $assistant->update($data);
    }
}
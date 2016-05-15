<?php

namespace App\Repositories;

use DB;
use App\Models\Issue;

class IssueRepository
{
    /**
     * Create new instance for given input
     * @param  array $input
     * @return Issue
     */
    public function create($input)
    {
        return Issue::create($input);
    }

    /**
     * Get all instances
     * @return Collection
     */
    public function findAll()
    {
        return Issue::all();
    }

    /**
     * Find the specified instance
     * @param  int $id issue_id
     * @return Issue
     */
    public function find($id)
    {
        return Issue::findorfail($id);
    }

    /**
     * Delete the specified instance
     * @param  int $id issue_id
     */
    public function delete($id)
    {
        $issue = $this->find($id);
        
        $issue->delete();
    }

    
    /**
     * Update the specified instance
     * @param  int $id issue_id
     * @param  array $data update_data
     */
    public function update($id, $data)
    {
        $issue = $this->find($id);

        $issue->update($data);
    }
}
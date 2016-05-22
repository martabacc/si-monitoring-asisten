<?php

namespace App\Repositories;

use DB;
use App\Models\Question;

class QuestionRepository
{
    /**
     * Create new instance for given input
     * @param  array $input
     * @return Question
     */
    public function create($input)
    {
        return Question::create($input);
    }

    /**
     * Get all instances
     * @return Collection
     */
    public function findAll()
    {
        return Question::all();
    }

    /**
     * Find the specified instance
     * @param  int $id question_id
     * @return Questions
     */
    public function find($id)
    {
        return Question::findorfail($id);
    }

    /**
     * Delete the specified instance
     * @param  int $id question_id
     */
    public function delete($id)
    {
        $question = $this->find($id);
        
        $question->delete();
    }
    
    /**
     * Update the specified instance
     * @param  int $id question_id
     * @param  array $data update_data
     */
    public function update($id, $data)
    {
        $question = $this->find($id);

        $question->update($data);
    }
}
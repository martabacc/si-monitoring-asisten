<?php

namespace App\Repositories;

use DB;
use Carbon\Carbon;
use App\Models\Questionnaire;
use App\Models\Answer;

class QuestionnaireRepository
{
    /**
     * Create new instance for given input
     * @param  array $input
     * @return Questionnaire
     */
    public function create($input)
    {
        return Questionnaire::create($input);
    }

    /**
     * Get all instances
     * @return Collection
     */
    public function findAll()
    {
        return Questionnaire::all();
    }

    /**
     * Find the specified instance
     * @param  int $id questionnaire
     * @return Questionnaires
     */
    public function find($id)
    {
        return Questionnaire::findorfail($id);
    }

    /**
     * Delete the specified instance
     * @param  int $id questionnaire_id
     */
    public function delete($id)
    {
        $questionnaire = $this->find($id);
        
        $questionnaire->delete();
    }
    
    /**
     * Update the specified instance
     * @param  int $id questionnaire_id
     * @param  array $data update_data
     */
    public function update($id, $data)
    {
        $questionnaire = $this->find($id);

        $questionnaire->update($data);
    }

    public function getQuestions($id)
    {
        $questionnaire = $this->find($id);

        return $questionnaire->question;
    }

    public function addQuestion($id, $data)
    {
        $questionnaire = $this->find($id);

        $questionnaire->question()->attach($data);
    }

    public function deleteQuestion($id, $question_id)
    {
        $questionnaire = $this->find($id);

        $questionnaire->question()->detach($question_id);
    }

    public function answerQuestionnaire($id, $data)
    {
        $questionnaire = $this->find($id);

        $flag = 1;
        $answers = [];
        foreach($questionnaire->question as $question) {
            $answer['questionnaire_id'] = $id;
            $answer['question_id'] = $question->id;
            $answer['student_id'] = $data['student_id'];
            if(isset($data['questions'][$question->id])) {
                $answer['option_id'] = $data['questions'][$question->id];
            } else {
                $flag = 0;
                break;
            }
            $answer['created_at'] = Carbon::now()->toDateTimeString();
            $answer['updated_at'] = Carbon::now()->toDateTimeString();
            $answers[] = $answer;
        }

        Answer::insert($answers);

        if(!$flag) {
            return 'error';
        }
        return 'ok';
    }
}
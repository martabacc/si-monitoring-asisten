<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Option\CreateOptionRequest;
use App\Http\Requests\Question\CreateQuestionRequest;
use App\Http\Requests\Question\UpdateQuestionRequest;
use App\Repositories\QuestionRepository;
use App\Repositories\OptionRepository;

class QuestionController extends Controller
{
    public $modelName = 'question';

    /**
     * QuestionRepository dependency
     */
    protected $modelRepository;

    /**
     * OptionRepository dependency
     */
    protected $optionRepository;

    /**
     * Create a new Question controller instance.
     *
     * @param   QuestionRepository Repository to access App\Models\Question
     * @return  void
     */
    public function __construct(QuestionRepository $questionRepository, OptionRepository $optionRepository)
    {
        $this->modelRepository = $questionRepository;

        $this->optionRepository = $optionRepository;
    }

    /**
     * Create a new question instance
     *
     * @param  CreateQuestionRequest  $request
     */
    protected function store(CreateQuestionRequest $request)
    {
        $data = $request->all();

        $this->modelRepository->create($data);

        return redirect()->back()->with('questionAdded', 'ok');
    }

    /**
     * Update the specified user instance in database
     * 
     * @param  UpdateQuestionRequest $request
     * @return view updatedQuestion
     */
    protected function update(UpdateQuestionRequest $request, $id)
    {
        $data = $request->only('question');

        $this->modelRepository->update($id, $data);

        return redirect()->back()->with('questionUpdated', 'ok');
    }

    /**
     * Delete the spcified user instance from database
     * 
     * @param  int $id question_id
     */
    protected function destroy($id)
    {
        $this->modelRepository->delete($id);

        return redirect()->back()->with('questionDeleted', 'ok');
    }

    /**
     * Edit the specified user instance
     * 
     * @param  int $id model_id
     * @return view edit_form
     */
    protected function edit($id)
    {
        $stringView = 'pages.'.$this->modelName.'.edit';

        $instance = $this->modelRepository->find($id);

        $options = $this->modelRepository->getOptions($id);
        
        return view($stringView, compact('options'))
            ->with($this->modelName, $instance);
    }

    protected function addOption(CreateOptionRequest $request, $id)
    {
        $data = $request->only('answer');
        $data['question_id'] = $id;

        $this->optionRepository->create($data);

        return redirect()->back()->with('optionAdded', 'ok');
    }

    protected function deleteOption($id)
    {
        $this->optionRepository->delete($id);

        return redirect()->back()->with('optionDeleted', 'ok');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Questionnaire\CreateQuestionnaireRequest;
use App\Http\Requests\Questionnaire\UpdateQuestionnaireRequest;
use App\Http\Requests\Questionnaire\AddQuestionRequest;
use App\Repositories\QuestionnaireRepository;
use App\Repositories\QuestionRepository;

class QuestionnaireController extends Controller
{
    public $modelName = 'questionnaire';

    /**
     * QuestionnaireRepository dependency
     */
    protected $modelRepository;

    /**
     * QuestionRepository dependency
     */
    protected $questionRepository;

    /**
     * Create a new Question controller instance.
     *
     * @param   QuestionnaireRepository Repository to access App\Models\Questionnaire
     * @return  void
     */
    public function __construct(QuestionnaireRepository $questionnaireRepository, QuestionRepository $questionRepository)
    {
        $this->modelRepository = $questionnaireRepository;

        $this->questionRepository = $questionRepository;
    }

    /**
     * Create a new questiionaire instance
     *
     * @param  CreateQuestionnaireRequest  $request
     */
    protected function store(CreateQuestionnaireRequest $request)
    {
        $data = $request->all();
        $data['assistant_id'] = \Auth::user()->id;

        $this->modelRepository->create($data);

        return redirect()->back()->with('questionnaireAdded', 'ok');
    }

    /**
     * Update the specified user instance in database
     * 
     * @param  UpdateQuestionnaireRequest $request
     * @return view updatedQuestionnaire
     */
    protected function update(UpdateQuestionnaireRequest $request, $id)
    {
        $data = $request->only('description', 'title');

        $this->modelRepository->update($id, $data);

        return redirect()->back()->with('questionnaireUpdated', 'ok');
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

        $questions = $this->modelRepository->getQuestions($id);

        $question_list = $this->questionRepository->findAll();
        
        return view($stringView, compact('questions', 'question_list'))
            ->with($this->modelName, $instance);
    }

    protected function viewQuestionnaire($id)
    {
        $instance = $this->modelRepository->find($id);

        $questions = $this->modelRepository->getQuestions($id);

        return view('pages.questionnaire.view', compact('questions'))
            ->with($this->modelName, $instance);
    }

    protected function addQuestion(AddQuestionRequest $request, $id)
    {
        $data = $request->only('question');

        $this->modelRepository->addQuestion($id, $data);

        return redirect()->back()->with('questionAdded', 'ok');
    }

    protected function deleteQuestion($questionnaire_id, $question_id)
    {
        $this->modelRepository->deleteQuestion($questionnaire_id, $question_id);

        return redirect()->back()->with('questionDeleted', 'ok');
    }

    protected function answerQuestionnaire(Request $request, $id)
    {
        $data = $request->all();
        $data['student_id'] = \Auth::user()->id;

        $this->modelRepository->answerQuestionnaire($id, $data);

        return redirect()->back()->with('questionnaireAnswered', 'ok');
    }

    protected function viewQuestionnaireResult($id)
    {
        $results = $this->modelRepository->getResult($id);

        $instance = $this->modelRepository->find($id);

        $questions = $this->modelRepository->getQuestions($id);

        return view('pages.questionnaire.result', compact('questions', 'results'))
            ->with($this->modelName, $instance);
    }
}

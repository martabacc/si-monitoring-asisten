<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Subject as Subject;
use Mockery\CountValidator\Exception;

class SubjectController extends ControllerReal
{

    protected $modelName = 'subject';

    public function index()
    {
        $stringView = 'pages.'.$this->modelName.'.index';

        return view($stringView)->with('items',  Subject::all() );
    }

    /**
     * Default create form
     *
     * @return view
     */
    public function create()
    {
        $stringView = 'pages.'.$this->modelName.'.create';

        return view($stringView);
    }

    public function store(Request $request){
        try{
            $subject = Subject::create($request->all());
            return redirect('subject')->with('success');
        }
        catch(Exception $e){
            return redirect('subject')->with('errors', $e);
        }
    }

    public function show($id)
    {
        $stringView = 'pages.'.$this->modelName.'.detail';
        $data['items'] = Subject::findOrFail($id);

        if(!$data['items']){
            return route('subject')->with('error', 'Data tidak dapat ditemukan.');
        }
        else
            return view($stringView, $data);
    }

    /**
     * Edit the specified user instance
     *
     * @param  int $id model_id
     * @return view edit_form
     */
    public function edit($id)
    {
        $stringView = 'pages.'.$this->modelName.'.edit';

//        $instance = $this->modelRepository->find($id);

        return view($stringView);
//            ->with($this->modelName, $instance);
    }

    public function destroy($id)
    {
        try{
            $destroy = Subject::destroy($id);
            return route('subject.index')->with('success', 'Deleted');
        }
        catch(Exception $e){
            return route('subject.index')->with('errors', $e);

        }

    }

}

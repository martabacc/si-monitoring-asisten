<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Controller's model name
     */
    protected $modelName;

    /**
     * Model's repository
     */
    protected $modelRepository;
    
    /**
     * Default index view
     * 
     * @return view
     */
    protected function index()
    {
        $stringView = 'pages.'.$this->modelName.'.index';

        $instances = $this->modelRepository->findAll();

        return view($stringView)->with($this->modelName.'s', $instances);
    }

    /**
     * Default create form
     *
     * @return view
     */
    protected function create()
    {
        $stringView = 'pages.'.$this->modelName.'.create';

        $instances = $this->modelRepository->findAll();

        return view($stringView)->with($this->modelName, $instances);

    }


    protected function show($id)
    {
        $stringView = 'pages.'.$this->modelName.'.detail';

        $instance = $this->modelRepository->find($id);
        
        return view($stringView)->with($this->modelName, $instance);
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
        
        return view($stringView)->with($this->modelName, $instance);
    }
}

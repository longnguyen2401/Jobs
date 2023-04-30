<?php

namespace App\Http\Controllers;

use App\ModelForm\BaseForm;
use App\ModelList\BaseList;
use App\ModelOperation\BaseOperation;
use App\Repositories\BaseRepository;
use App\Traits\FilesTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

abstract class CURDController extends Controller
{
    use FilesTrait;

    /**
     * The attributes prefix for each model.
     *
     * @var string
     */
    protected string $prefix;

    /**
     * The attributes prefix for each model.
     *
     * @var string
     */
    protected string $lowerPrefix;

    /**
     * Init Repository
     * 
     * @var BaseRepository
     */
    protected BaseRepository $repository;

    /**
     * Init Model Form
     * 
     * @var BaseForm
     */
    protected BaseForm $modelForm;

    /**
     * Init Model Form
     * 
     * @var BaseList
     */
    protected BaseList $modelList;

    /**
     * Init Model Form
     * 
     * @var BaseOperation
     */
    protected BaseOperation $modelOperation;

    /**
     * Construct function
     *
     * @return void
     */
    public function __construct()
    {   
        $this->setRepository();

        $this->lowerPrefix = strtolower($this->prefix);
    }

    /**
     * Set repository
     * 
     * @return void
     */
    protected function setRepository()
    {
        $this->repository = $this->getRepository();
    }

    /**
     * Set repository
     * 
     * @return void
     */
    protected function setModelForm()
    {
        $this->modelForm = $this->getModelForm();
    }

    /**
     * Set repository
     * 
     * @return void
     */
    protected function setModelList()
    {
        $this->modelList = $this->getModelList();
    }

    /**
     * Get repository
     * 
     * @return repository
     */
    protected function setOperation()
    {
        $this->modelOperation = $this->getModelOperation();
    }

    /**
     * Get repository
     * 
     * @return repository
     */
    protected function getRepository()
    {
        $className = $this->prefix . 'Repository';
        $dir = "App\\Repositories\\$className";
        $class = new $dir;
        return $class;
    }

    /**
     * Get form
     * 
     * @return BaseForm
     */
    protected function getModelForm(): BaseForm
    {
        $className = $this->prefix . 'Form';
        $dir = "App\\ModelForm\\$className";
        $class = new $dir;
        return $class;
    }

    /**
     * Get form
     * 
     * @return BaseList
     */
    protected function getModelList(): BaseList
    {
        $className = $this->prefix . 'List';
        $dir = "App\\ModelList\\$className";
        $class = new $dir;
        return $class;
    }

    /**
     * Get form
     * 
     * @return BaseOperation
     */
    protected function getModelOperation(): BaseOperation
    {
        $className = $this->prefix . 'Operation';
        $dir = "App\\ModelOperation\\$className";
        $class = new $dir;
        return $class;
    }

    /**
     * Show all
     *
     * @param int|null $id
     * @return View
     */
    protected function index(int $id = null): View
    {
        $data = $this->getMetadata('show', $id);
        return view($data['view'], $data);
    }
    
    /**
     * Show all
     *
     * @param int|null $id
     * @return View
     */
    protected function indexById(int $id): View
    {
        $list = $this->repository->getDataById($id);
        $data = $this->getMetadata('show', $list);
        return view($data['view'], $data);
    }

    /**
     * Show single post
     *
     * @param $id int Post ID
     * @return View
     */
    protected function show($id): View
    {
        $this->setModelForm();
        $form = $this->modelForm->getModelForm();
        $data = $this->repository->find($id);
        $view = 'admin.' . $this->prefix . '.edit';
        
        $metadata = array(
            'data'    => $data,
            'prefix'  => $this->lowerPrefix,
            'form'    => $form
        );
        return view($view, compact('metadata'));
    }

        /**
     * Show single post
     *
     * @return \Illuminate\View\View
     */
    protected function create(): View
    {
        $this->setModelForm();
        $form = $this->modelForm->getModelForm();
        $view = 'admin.' . $this->prefix . '.create';
        
        $metadata = array(
            'prefix'  => $this->lowerPrefix,
            'form'    => $form
        );
        return view($view, compact('metadata'));
    }

    /**
     * Create single post
     *
     * @param Request $request
     * @return RedirectResponse
     */
    protected function store(Request $request): RedirectResponse
    {
        $this->repository->updateOrCreate($request);

        $url = '/admin/' . $this->lowerPrefix;
        return redirect($url);
    }

    /**
     * Update single post
     *
     * @param Request $request
     * @param int $id 
     * @return RedirectResponse
     */
    protected function update(Request $request, $id): RedirectResponse
    {
        $this->repository->updateOrCreate($request, $id);

        $url = '/admin/' . $this->lowerPrefix;
        return redirect($url);
    }

    /**
     * Delete single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    protected function destroy($id)
    {
        $this->repository->delete($id);
        $data = $this->getMetadata('show');
        return view($data['view'], $data);
    }

    /**
     * Delete single post
     *
     * @param string $type
     * @return array
     */
    protected function getMetadata(string $type, $list = null): array
    {
        $metadata = [];
        $view = '';

        switch ($type) {
            case 'show':
                $this->setModelList();
                $this->setOperation();

                $keys         = $this->modelList->getModelList();
                $header       = $this->modelList->getModelHeaderList();
                $list         = ($list) ? $list : $this->repository->getAll();
                $view         = 'admin.' . $this->lowerPrefix . '.index';
                $prefix       = $this->lowerPrefix;
                $operation    = $this->modelOperation->getModelOperation();

                $metadata = compact('keys', 'header', 'list', 'prefix', 'operation');
            break;
        }
        return compact('metadata', 'view');
    }
}

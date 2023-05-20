<?php

namespace App\Repositories;

use App\Traits\FilesTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BaseRepository
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
    protected string $condition;

    /**
     * Init model
     * 
     * @var Model
     */
    protected static Model $_model;

    /**
     * BaseRepository constructor.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * 
     * @return class
     */
    protected function getModel()
    {
        $className = $this->prefix;
        $dir = "App\\Models\\$className";
        $class = new $dir;
        return $class;
    }

    /**
     * Set model
     */
    protected function setModel()
    {
        self::$_model = $this->getModel();
    }

    /**
     * Get All
     * 
     * @param int|null $id
     * @return
     */
    public function getAll()
    {
        return self::$_model->all();
    }

    /**
     * Get All
     * 
     * @param int|null $id
     * @return
     */
    public function getDataById(int $id = null)
    { 
        $data = $this->find($id);

        $this->hookBeforeReturIndexById($data);

        return $data;
    }
    
    /**
     * Get one
     * 
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = self::$_model->find($id);
        return $result;
    }

    /**
     * Create or update
     * 
     * @param Request $request
     * @return mixed
     */
    public function updateOrCreate(Request $request, $id = null)
    {
        $request = $this->checkUploadFile($request);
        $attributes = self::$_model->getFillable();
        $data = $request->only($attributes);

        $data = $this->hookBeforeUpdate($data);

        self::$_model::updateOrCreate(['id' => $id], $data);
    }

    /**
     * Update
     * 
     * @param $id
     * @param Request $request
     * @return bool|mixed
     */
    public function update($id, Request $request)
    {
        $result = $this->find($id);
        $attributes = $request->only($result->getFillable());
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    /**
     * Hook before return index by id
     *
     * @param Model $Model
     * @return void
     */
    public function hookBeforeReturIndexById(Model $model): void {}

    /**
     * Hook before return index by id
     *
     * @return 
     */
    public function hookBeforeUpdate($data) {}

}
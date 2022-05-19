<?php


namespace App\Repositories;

use App\Models\Project as Model;

/**
 * Class ProductRepositories
 * @package App\Repositories
 */
class ProjectRepositories extends CoreRepository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function filter($filter)
    {
        return $this->startCondition()->filter($filter)->get();
    }

}

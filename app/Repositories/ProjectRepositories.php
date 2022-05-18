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

}

<?php
namespace App\Repositories\All\Categories;

use App\Models\Category;
use App\Repositories\Base\BaseRepository;

use App\Repositories\All\Categories\CategoryInterface;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    protected $model;

    /**
     * Method __construct
     *
     * @param Category $model [explicite description]
     *
     * @return void
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}

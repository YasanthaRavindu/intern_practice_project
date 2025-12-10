<?php

namespace App\Services\CategoryServices;

use App\Repositories\All\Categories\CategoryInterface;

class CategoryService{

     /**
      * Method __construct
      *
      * @return void
      */
     public function __construct(
        protected CategoryInterface $categoryInterface,

    ){}
    /**
     * Method storeCategories
     *
     * @param array $data [explicite description]
     *
     * @return void
     */
    public function storeCategories(array $data): void
    {
        $this->categoryInterface->create($data);
    }
}

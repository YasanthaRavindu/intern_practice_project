<?php
namespace App\Repositories\Base;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * Method __construct
     *
     * @param Model $model [explicite description]
     *
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;

    }

    /**
     * Method all
     *
     * @param array $columns [explicite description]
     * @param array $relations [explicite description]
     *
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    /**
     * Method limit
     *
     * @param int $limit [explicite description]
     * @param array $columns [explicite description]
     * @param array $relations [explicite description]
     *
     * @return Collection
     */
    public function limit(int $limit, array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->limit($limit)->get($columns);
    }


    /**
     * Method allTrashed
     *
     * @return Collection
     */
    public function allTrashed(): Collection
    {
        return $this->model->onlyTrashed()->get();
    }

    public function paginate(int $number)
    {
        return $this->model->paginate($number);
    }

    public function findById(
        int $modelId,
        array $columns = ['*'],
        array $relations=[],
        array $appends = []): ?Model{
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->appemd($appends);
    }

    public function findByColumn(
        array $paramsAnddData,
        array $columns = ['*'],
        array $relations =[]
    ): ?Model {
        return $this->model->select($columns)->with($relations)->where($paramsAnddData)->first();
    }

    /**
     * Method getByColumn
     *
     * @return void
     */
    public function getByColumn(
        array $paramsAnddData,
        array $columns = ['*'],
        array $relations = []
    ): ?Collection {
        return $this->model->select($columns)->with($relations)->where($paramsAnddData)->get();
    }

    /**
     * Method getRandom
     *
     * @return void
     */
    public function getRandom(
        Int $limit,
        array $idNotIn,
        array $columns = ['*'],
        array $relations = []
    ): ?Model{
        return $this->model->select($columns)->with($relations)->whereNotIn('id', $idNotIn)->inRandom;
    }


    /**
     * Method create
     *
     * @param array $payload [explicite description]
     *
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        return $this->model->create($payload);
    }


    /**
     * Method createMany
     *
     * @param array $payloadCollection [explicite description]
     *
     * @return Collection
     */
    public function createMany(array $payloadCollection): ?Collection
    {
        return $this->model->createMany($payloadCollection);
    }


    /**
     * Method update
     *
     * @param string $id [explicite description]
     * @param array $payload [explicite description]
     *
     * @return Model
     */
    public function update(string $id,array $payload): ?Model
    {

        $data=$this->model->findById($id);
        try{

            return $data->create($payload) ;

        }catch(\Exception $e){
            return $data->with('error',"Not found!");
        }
    }

    /**
     * Method deleteById
     *
     * @param int $modelId [explicite description]
     *
     * @return bool
     */
    public function deleteById(int $modelId): bool
    {
        return $this->model->findById($modelId)->delete();
    }


    /**
     * Method deleteByColumn
     *
     * @param array $params [explicite description]
     *
     * @return bool
     */
    public function deleteByColumn(array $params) :bool
    {
        return $this->model->where($params)->delete();
    }

    // public function restoredById(int $modelId): bool
    // {
    //     return $this->findOnlyTrashedById($modelId);
    // }
}

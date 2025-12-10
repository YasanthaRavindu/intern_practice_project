<?php

namespace App\Repositories\Base;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

Interface BaseRepositoryInterface
{

    /**
     * Method all
     *
     * @param array $columns [explicite description]
     * @param array $relations [explicite description]
     *
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection;

    /**
     * Method limit
     *
     * @param int $limit [explicite description]
     * @param array $columns [explicite description]
     * @param array $relations [explicite description]
     *
     * @return Collection
     */
    public function limit(int $limit, array $columns = ['*'], array $relations = []): Collection;

    /**
     * Method allTrashed
     *
     * @return Collection
     */
    public function allTrashed(): Collection;

    /**
     * Method create
     *
     * @param array $payload [explicite description]
     *
     * @return Model
     */
    /**
     * Method create
     *
     * @param array $payload [explicite description]
     *
     * @return Model
     */
    public function create(array $payload): ?Model;
    /**
     * Method createMany
     *
     * @param array $payloadCollection [explicite description]
     *
     * @return Collection
     */
    public function createMany(array $payloadCollection): ?Collection;

    /**
     * Method findById
     *
     * @return void
     */
    public function findById(
        int $modelId,
        array $columns = ['*'],
        array $relations=[],
        array $appends = []): ?Model;

    public function findByColumn(
        array $paramsAnddData,
        array $columns = ['*'],
        array $relations =[]
    ): ?Model;

    public function getByColumn(
        array $paramsAnddData,
        array $columns = ['*'],
        array $relations = []
    ): ?Collection;

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
    ): ?Model;

    /**
     * Method update
     *
     * @param string $id [explicite description]
     * @param array $payload [explicite description]
     *
     * @return Model
     */
    public function update(string $id,array $payload): ?Model;

    public function deleteById(int $modelId): bool;

    public function deleteByColumn(array $params) :bool;

    //public function restoredById(int $modelId): bool;
}

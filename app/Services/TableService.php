<?php

namespace App\Services;

use App\Repositories\Contracts\TenantRepositoryInterface;
use App\Repositories\Contracts\TableRepositoryInterface;

class TableService
{
    private $table, $tableRepository;
    public function __construct(
        TenantRepositoryInterface $table,
        TableRepositoryInterface $tableRepository)
    {
        $this->table = $table;
        $this->tableRepository = $tableRepository;
    }

    public function getTablesByUuid(string $uuid)
    {
        $tenant = $this->table->getTenantByUuid($uuid);
        return $this->tableRepository->getTablesByTenantId($tenant->id);
    }

    public function getTableByIdentify(string $identify)
    {
        return $this->tableRepository->getTableByIdentify($identify);
    }
}
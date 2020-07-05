<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface {
    
    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenant_id,
        string $comment = '',
        $client_id = '',
        $table_id = ''
    );
    public function getOrderByIdentify(string $identify);

    public function registerProductsOrder(int $order_id, array $products);
    
    public function getOrdersByClientId(int $idClient);
}
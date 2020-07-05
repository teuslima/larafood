<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Tenant;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    private $entity;
    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenant_id,
        string $comment = '',
        $client_id = '',
        $table_id = '')
    {

        $data = [
            'identify' => $identify,
            'total' => $total,
            'status' => $status,
            'tenant_id' => $tenant_id,
            'comment' => $comment
        ];

        if($client_id) $data['client_id'] = $client_id;
        if($table_id) $data['table_id'] = $table_id;
        
        $order = $this->entity->create($data);
        return $order;
    }
    
    public function getOrderByIdentify(string $identify)
    {
        return $this->entity->where('identify', $identify)->first();
    }

    public function registerProductsOrder(int $order_id, array $products)
    {
        $orderProducts = [];
        $order = $this->entity->find($order_id);

        foreach($products as $product){
            $orderProducts[$product['id']] = [
                'qty' => $product['qty'],
                'price' => $product['price'],
            ];
        }

        $order->products()->attach($orderProducts);

        // foreach($products as $product){
        //     array_push($orderProducts, [
        //         'order_id' => $order_id,
        //         'product_id' => $product['id'],
        //         'qty' => $product['qty'],
        //         'price' => $product['price'],
        //     ]);
        // }

        // DB::table('order_product')->insert($orderProducts);
    }

    public function getOrdersByClientId(int $idClient){
        $orders = $this->entity
                        ->where('client_id', $idClient)
                        ->paginate();

        return $orders;
    }
}
<?php

namespace App\Repositories;

use App\Models\Evaluation;
use App\Repositories\Contracts\EvaluationRepositoryInterface;

class EvaluationRepository implements EvaluationRepositoryInterface
{
    private $entity;
    public function __construct(Evaluation $evaluation)
    {
        $this->entity = $evaluation;
    }

    public function newEvaluationOrder(int $order_id, int $client_id, $evaluation)
    {
        $data = [
            'client_id' => $client_id,
            'order_id' => $order_id,
            'stars' => $evaluation['stars'],
            'comment' => $evaluation['comment'] ?? '',
        ];

        return $this->entity->create($data);
    }

    public function getEvaluationsByOrder(int $order_id)
    {
        return $this->entity->where('order_id', $order_id)->get();
    }
    
    public function getEvaluationsByClient(int $client_id)
    {
        return $this->entity->where('client_id', $client_id)->get();
    }
    
    public function getEvaluationsById(int $id)
    {
        return $this->entity->find($id);
    }
    
    public function getEvaluationsByClientIdByOrderId(int $order_id, int $client_id)
    {
        return $this->entity
                    ->where('order_id', $order_id)
                    ->where('client_id', $client_id)
                    ->first();
    }
}
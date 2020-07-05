<?php

namespace App\Repositories\Contracts;

interface EvaluationRepositoryInterface {
    
    public function newEvaluationOrder(int $order_id, int $client_id, $evaluation);
    public function getEvaluationsByOrder(int $order_id);
    public function getEvaluationsByClient(int $client_id);
    public function getEvaluationsById(int $id);
    public function getEvaluationsByClientIdByOrderId(int $order_id, int $client_id);
}
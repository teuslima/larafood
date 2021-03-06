<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\EvaluationService;
use App\Http\Controllers\Controller;
use App\Http\Resources\EvaluationResource;
use App\Http\Requests\Api\StoreEvaluationOrder;

class EvaluationController extends Controller
{
    private $evaluationService;

    public function __construct(EvaluationService $evaluationService)
    {
        $this->evaluationService = $evaluationService;
    }

    public function store(StoreEvaluationOrder $request)
    {
        $data = $request->only('stars', 'comment');
        $evaluation = $this->evaluationService->createNewEvaluation($request->identifyOrder, $data);

        // return new EvaluationResource($evaluation);
        /**
         * Setar o tipo de codigo de status (AJUDA NOS TESTES EM CASOS Q SE ESPERA 201 E É REETORNADO 200)
         */
        return (new EvaluationResource($evaluation))
                ->response()
                ->setStatusCode(201);
    }
}

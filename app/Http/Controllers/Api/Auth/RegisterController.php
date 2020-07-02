<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Http\Requests\StoreClient;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;

class RegisterController extends Controller
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function store(StoreClient $request)
    {
        $client = $this->clientService->createNewClient($request->all());
        return new ClientResource($client);
    }
}

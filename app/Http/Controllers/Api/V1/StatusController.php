<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Resources\V1\StatusResource;

class StatusController extends Controller
{
    public function index(){
        return StatusResource::collection(Status::all());
    }

    public function store(StoreStatusRequest $request){
        Status::create($request->validated());
        return response()->json('Status Created successfully');

    }

    public function update(StoreStatusRequest $request, Status $status){

        $status->update($request->validated());
        return response()->json('status updated successfully');
    }

    public function destroy(Status $status){

        $status->delete();
        return response()->json('status deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Resources\CollectionResource;

class CollectionController extends Controller
{
    public function index()
    {
         return CollectionResource::collection(Collection::all());
    }

    public function store(StoreCollectionRequest $request)
    {
        $created_collection = Collection::create($request->validated());
        return new CollectionResource($created_collection);
    }

    public function show(Collection $collection)
    {
        return new CollectionResource($collection);
    }

    public function update(StoreCollectionRequest $request, Collection $collection)
    {
        $collection->update($request->validated());
        return new CollectionResource($collection);
    }

    public function destroy(Collection $collection)
    {
        $collection->delete();
        return response()->noContent();
    }
}

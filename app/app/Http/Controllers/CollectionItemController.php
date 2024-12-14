<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectionItemRequest;
use App\Http\Resources\CollectionItemResource;
use App\Models\CollectionItem;
use Illuminate\Http\Request;

class CollectionItemController extends Controller
{
    public function index(Request $request)
    {
        $query = CollectionItem::query();
        if ($searched_id = $request->input("coll_id")) {
            $query->where("collection_id", "=", "$searched_id");
        }

        ///array means value '120-129'
        if ($searched_items_array = $request->input("array")) {
            if (!preg_match("/^[0-9]{3}-[0-9]{3}$/", $searched_items_array)) {
                echo ('asd');
                return CollectionItemResource::collection($query->get());
            }
            $start_number = substr($searched_items_array, 0, 3);
            $end_number = substr($searched_items_array, -3);

            $query->where("car_number", '>=', $start_number)->where("car_number", '<=', $end_number);
        }
        return CollectionItemResource::collection($query->get());
    }

    public function store(StoreCollectionItemRequest $request)
    {
        $validated_data = $request->validated();

        if ($request->hasFile('image') && $request->image != '') {
            $validated_data['image'] = $request->file('image')->store("images/coll{$validated_data['collection_id']}", 'public');
        }
        $created_item = CollectionItem::create($validated_data);
        return new CollectionItemResource($created_item);
    }

    public function show(string $collectionItem)
    {
        $query = CollectionItem::query()->where('id', $collectionItem);
        return CollectionItemResource::collection($query->get());
    }

    public function update(StoreCollectionItemRequest $request, CollectionItem $collectionItem)
    {
        $collectionItem->update($request->validated());
        return new CollectionItemResource($collectionItem);
    }

    public function destroy(CollectionItem $collectionItem)
    {
        $collectionItem->delete();
        return response()->noContent();
    }
}

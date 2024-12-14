<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Resources\GroupResource;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
       return GroupResource::collection(Group::all());
    }

    public function store(StoreGroupRequest $request)
    {
        $created_group = Group::create($request->validated());
        return new GroupResource($created_group);
    }

    public function show(Group $group)
    {
        return new GroupResource($group);
    }

    public function update(StoreGroupRequest $request, Group $group)
    {
        $group->update($request->validated());
        return new GroupResource($group);
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return response()->noContent();
    }
}

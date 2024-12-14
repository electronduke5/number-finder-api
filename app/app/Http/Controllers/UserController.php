<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $query = User::query();
        if ($tg_id = $request->input("id")) {
            $query->where("tg_id", "=", $tg_id);
        }
        return UserResource::collection($query->get());
    }

    public function store(StoreUserRequest $request)
    {
        $created_user = User::create($request->validated());
        return new UserResource($created_user);
    }

    public function show(string $user_id)
    {
        $query = User::query()->where("id", $user_id);
        return UserResource::collection($query->get());
    }

    public function update(StoreUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }
}

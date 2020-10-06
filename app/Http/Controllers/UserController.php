<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Psy\Util\Str;

class UserController extends Controller
{
    /**
     * @return JsonResource
     */
    public function index(Request $request)
    {
        return UserResource::collection(User::orderBy('id', 'DESC')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return JsonResource
     */
    public function store(StoreUserRequest $request)
    {
        $user =  new User;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = bcrypt('my-secret-password');;
        $user->save();

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResource
     */
    public function show($id)
    {
        $user=User::findOrFail($id);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return JsonResource
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user=User::findOrFail($id);
        $user->fill($request->all())->save();

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     * @throws Exception
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        return new Response($user->delete());
    }
}

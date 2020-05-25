<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class User extends Controller
{
    /**
     * Get User based on id.
     * @param $user 
     * @return JSON 
     */
    public function get($user)
    {
        return response()->json(
            Users::find($user) 
        );
    }

    /**
     * Create new user.
     * @param $user 
     * @return JSON 
     */
    public function create(Request $request)
    {
        Users::save($request); 
        return response()->json([
            'message' => 'user created'
        ]);
    }

    /**
     * Update a user.
     * @param Request $request
     * @return JSON 
     */
    public function save(Request $request)
    {
        User::find($request->id)->update($request);
        return response()->json([
            'message' => 'user info has been saved'
        ]);
    }

    /**
     * Update a user.
     *
     * @return JSON 
     */
    public function delete($user)
    {
        User::find($request->id)->delete();
        return response()->json([
            'message' => 'user has been deleted'
        ]);
    }
}

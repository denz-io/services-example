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
    public function get($user = null)
    {
        if ($user) {
            $found = Users::find($user); 
        } else {
            $found = Users::all();
        }
        return response()->json($found);
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
    public function update(Request $request)
    {
        Users::find($request->id)->update($request);
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
        if ($user = Users::find($user)) {
            $user->delete();
            return response()->json([
                'message' => 'user has been deleted'
            ]);
        }
        return response()->json([
            'message' => 'user not found'
        ]);
    }
}

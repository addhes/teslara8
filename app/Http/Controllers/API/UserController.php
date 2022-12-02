<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $nama_user = $request->input('name');

        if($id)
        {
            $users = User::find($id);

            if($users)
            {
                return response()->json([
                    'status' => true,
                    'data'   => $users,
                    'message' => "Data berhasil diambil"
                ], 200); 
            } else {
                return response()->json([
                    'status' => false,
                    'data'   => null,
                    'message' => "Data user tidak ada"
                ], 404); 
            }
        }

        $user = User::query();

        if($nama_user)
        {
            $user->where('name','like','%' . $nama_user . '%');
        }

        $alluser = User::all();
        if ($alluser)
        {
            return response()->json([
                'status' => true,
                'message' => "Data list user berhasil diambil",
                'data'   => $alluser,
            ], 200); 

        } else {
            return response()->json([
                'status' => false,
                'data'   => null,
                'message' => "Data list user gagal diambil"
            ], 500); 
        }
    }
}

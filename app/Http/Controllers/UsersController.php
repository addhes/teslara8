<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::paginate(10);
        return view('admin.users.index', compact('user'));
    }

    public function create()
    {
        return view('admin.users.form');
    }

    public function store(Request $request)
    {
        // try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ],[
                'name.required' => 'Kolom nama wajib diisi',
                'email.required' => 'Kolom email wajib diisi',
                'email.unique' => 'Email tidak boleh sama',
                'password.required' => 'Kolom password wajib diisi'
            ]);

            try {
                DB::beginTransaction();
                
                $user = User::create([
                    'name'  => $request->name,
                    'email' => $request->email,
                    'password'  => Hash::make($request->password),
                ]);

                if(!$user) {
                    DB::rollback();
                    
                    return back()->with('error', 'Terjadi error saat membuat data');
                }

                DB::commit();
                return redirect()
                    ->route('userdex')
                    ->with('success','User berhasil dibuat');

            } catch (\Throwable $error) {
                Log::debug($error);
                DB::rollback();
        
                return redirect()
                    ->route('userdex')
                ->with('error', 'User Gagal dibuat: ' . $error->getMessage());
            }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.form', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            // 'password' => 'required|string|min:8',
        ],[
            'name.required' => 'Kolom nama wajib diisi',
            'email.required' => 'Kolom email wajib diisi',
            'email.unique' => 'Email tidak boleh sama',
            // 'password.required' => 'Kolom password wajib diisi'
        ]);

        try {
            DB::beginTransaction();
            $user = User::find($id)->update([
                'name'  => $request->name,
                'email' => $request->email,
            ]);
            
            if(!$user) {
                DB::rollback();
                
                return back()->with('error', 'Terjadi error saat membuat data');
            }

            DB::commit();
            return redirect()
                ->route('userdex')
                ->with('success','User berhasil update');

        } catch (\Throwable $error) {
            Log::debug($error);
            DB::rollback();
    
            return redirect()
                ->route('userdex')
            ->with('error', 'User Gagal dibuat: ' . $error->getMessage());
        }
    }

    public function destroy($id)
    {
        User::where('id', '=', $id)->delete();
        return redirect()->route('userdex')->with('success', 'Hapus User berhasil');
    }
}

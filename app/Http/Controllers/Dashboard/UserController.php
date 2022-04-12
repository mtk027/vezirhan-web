<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $data['item'] = User::find(Auth::id());

        return view('admin.users.index', $data);
    }


    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            if($request->password){
                $password = bcrypt($request->password);
            }else{
                $password = $user->password;
            }
            $user->update([
                'name' => $request->name,
                'password' => $password,
            ]);

            DB::commit();
            session()->flash('success', "Güncelleme işlemi başarıyla tamamlandı.");
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput($request->all());
        }
    }

}
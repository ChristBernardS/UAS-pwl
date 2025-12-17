<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KnowledgeBase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\User;

class PageController extends Controller
{
    public function home()
    {
        $brain = KnowledgeBase::orderBy('id', 'desc')->get();
        return view('home', ['key' => 'home', 'brain' => $brain]);
    }

    public function addform()
    {
        return view('addform', ['key' => 'home']);
    }

    public function saveform(Request $request)
    {
        if ($request->hasFile('image')) {
            $file_name = time() . '-' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('image', $file_name, 'public');
        } else {
            $file_name = null;
            $path = null;
        }

        KnowledgeBase::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'image' => $file_name,
        ]);

        return redirect('/home')->with('alert', 'Data has been added!');
    }

    public function editform($id)
    {
        $kb = KnowledgeBase::find($id);
        return view('editform', ['key' => 'home', 'kb' => $kb]);
    }

    public function formupdate($id, Request $request)
    {
        $kb = KnowledgeBase::find($id);
        $kb->question = $request->question;
        $kb->answer = $request->answer;
        if ($request->image) {
            if ($kb->image) {
                Storage::disk('public')->delete('image/' . $kb->image);
            }
            $file_name = time() . '-' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('image', $file_name, 'public');
            $kb->image = $file_name;
        }
        $kb->save();

        return redirect('/home')->with('alert', 'Data has been updated!');
    }

    public function formdelete($id)
    {
        $kb = KnowledgeBase::find($id);
        if ($kb->image) {
            Storage::disk('public')->delete('image/' . $kb->image);
        }
        $kb->delete();
        return redirect('/home')->with('alert', 'Data has been deleted!');
    }

    public function users()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('users', ['key' => 'users', 'users' => $users]);
    }

    public function usersaddform()
    {
        return view('usersaddform', ['key' => 'users']);
    }

    public function userssave(Request $request)
    {
        if ($request->hasFile('photo')) {
            $file_name = time() . '-' . $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('photo', $file_name, 'public');
        } else {
            $file_name = null;
            $path = null;
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'photo' => $file_name
        ]);
        return redirect('/users')->with('alert', 'Data Berhasil di Simpan');
    }

    public function usersdelete($id)
    {
        $users = User::find($id);
        if ($users->photo) {
            Storage::disk('public')->delete('photo/' . $users->photo);
        }
        $users->delete();
        return redirect('/users')->with('alert', 'Data Berhasil di Delete');
    }

    public function setting()
    {
        return view('setting', ['key' => 'users']);
    }

    public function updatepass(Request $request)
    {
        $user = Auth::user();

        if (!Auth::attempt([
            'email' => $user->email,
            'password' => $request->password_lama
        ])) {
            return redirect('/setting')->with('error', 'Password gagal di update');
        }

        $user->update([
            'password' => bcrypt($request->password_baru),
        ]);

        return redirect('/users')->with('alert','berhasil update password');
    }
}

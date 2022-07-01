<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists in admins table'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }
    }

    public function posts()
    {
        return view('dashboard.admin.blog')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog');
    }

    function approvePost($id)
    {
        $post = Post::find($id);
        $post->isApproved = 1;
        $post->Save();
        session()->flash('message', 'Post Approved');
        return back();
    }
    function disApprovePost($id)
    {
        $post = Post::find($id);
        $post->isApproved = '*';
        $post->Save();
        session()->flash('message', 'Post Disapproved');
        return back();
    }

    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
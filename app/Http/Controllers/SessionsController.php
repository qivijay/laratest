<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    //
    public function create()
    {
    	return view('session.create');
    }

    public function store(Request $request)
    {
       	$credentials = $this->validate($request, [
           	'email' => 'required|email|max:255',
           	'password' => 'required'
       	]);

       	if (Auth::attempt($credentials, $request->has('remember'))) {
       		// session()->flash('success','登录成功');
       		// return redirect()->intended(route('users.show',[Auth::user()]));
            if (Auth::user()->activated) {
                session()->flash('success','登录成功');
                return redirect()->intended(route('users.show',[Auth::user()]));
            } else {
                Auth::logout();
                session()->flash('warning','你的账号未激活，请检查邮箱中的注册邮件进行激活。');
                return redirect('/');
            }
            
       	} else {
       		session()->flash('danger','sorry，您的邮箱和密码不匹配！');
       		return redirect()->back();
       	}
       
    }
	
	public function destroy()
	{
		Auth::logout();
		session()->flash('success','成功退出');
		return redirect('login');
	}
}
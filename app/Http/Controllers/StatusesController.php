<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Status;
use Auth;

class StatusesController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'content' => 'required|max:147'
    	]);
    	Auth::user()->statuses()->create([
    		'content' => $request->content
    	]);

    	return redirect()->back();
    }

    public function destroy(Status $status)
    {
    	$this->authorize('destroy', $status);
    	$status->delete();
    	session()->flash('success', '动态删除成功！');
    	return redirect()->back();
    }
}

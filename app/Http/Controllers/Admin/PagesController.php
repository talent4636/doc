<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//========add namespace like this===
use App\Page;
use App\Type;//nessasery
use Redirect, Input, Auth;
//==============end=================

class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    return view('admin.pages.create')->withTypes(Type::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	    $this->validate($request, [
	        'title' => 'required|unique:pages|max:500',
	        'body' => 'required',
	        'type_id' => 'required',
	    ]);
	    
	    $page = new Page;
	    $page->title = Input::get('title');
	    $page->body = Input::get('body');
	    $page->type_id = Input::get('type_id');
	    // var_dump($page->body);exit;
// 	    $page->user_id = 1;//Auth::user()->id;
	    $page->user_id = Auth::user()->id;
	    
	    if ($page->save()) {
	        return Redirect::to('admin');
	    } else {
	        return Redirect::back()->withInput()->withErrors('保存失败！');
	    }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	    return view('admin.pages.edit')->withPage(Page::find($id))->withTypes(Type::all());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
	    $this->validate($request, [
	        'title' => 'required|unique:pages,title,'.$id.'|max:255',
	        'body' => 'required',
	    ]);
	    
	    $page = Page::find($id);
	    $page->title = Input::get('title');
	    $page->body = Input::get('body');
	    $page->type_id = Input::get('type_id');
	    $page->user_id = 1;//Auth::user()->id;
	    
	    if ($page->save()) {
	        return Redirect::to('admin');
	    } else {
	        return Redirect::back()->withInput()->withErrors('保存失败！');
	    }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	    $page = Page::find($id);
	    $page->delete();
	    
	    return Redirect::to('admin');
	}

}

<?php namespace App\Http\Controllers;

use App\Page;
use App\Type;

class FrontController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// $this->middleware('guest');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index($type_id=null)
	{
		$type_id = $type_id?$type_id:1;
		// return view('home')->withPages(Page::all())->withTypes(Type::all());
		return view('index')->withPages(Page::where('type_id','=',$type_id)->get())
		->withTypes(Type::all())->with('type_id',$type_id);
	}








}

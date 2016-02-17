<?php
namespace Admin\Controllers;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function Home()
	{
		$lc = app()->getlocale();
        return view('Admin::home', ['lc' => $lc]);
		
	}

	public function History()
	{
		return view('Admin::layouts.history');
	}
}
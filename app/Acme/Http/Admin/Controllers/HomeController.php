<?php
namespace Admin\Controllers;

class HomeController extends Controller {

	public function __construct()
	{
	}
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
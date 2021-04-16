<?php namespace App\Controllers\Frontend\Home;
use App\Controllers\FrontendController;

class Main extends FrontendController
{
	public $path_view 	= "frontend/home/";
	public $theme		= "pages/theme-frontend/render";

	public function __construct()
	{

	}

	public function index()
	{
		$param['page'] = view($this->path_view.'page-index');
		return view($this->theme, $param);
	}
}
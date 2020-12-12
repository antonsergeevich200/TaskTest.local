<?php

namespace App\Http\Controllers\Store\Admin;

use App\Http\Controllers\Store\BaseController as GuestBaseController;

/**
* Basic controller for all controllers
* in the administration panel.
*
* Must be the parent of all controllers.
*
* @package App\Http\Controllers\Blog\Admin
*/
abstract class BaseController extends GuestBaseController
{
	/**
	* BaseController constructor.
	*/
	public function __construct()
	{
		//Initialization of common points for the admin panel.
	}
}
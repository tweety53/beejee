<?php

namespace App\Controllers;

class PagesController
{
	public function home()
	{
		return view('index');
	}

	public function login()
	{
		return view('auth/login');
	}

	public function register()
	{
		return view('auth/register');
	}

	public function createTask()
	{
		return view('tasks/create');
	}

}
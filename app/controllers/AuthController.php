<?php

namespace App\Controllers;

use App\Core\App;

class AuthController{

	public function login()
	{
		$userData = App::get('database')->selectUserFromDB('users', $_GET['email'] ,  $_GET['password']);

		if(!empty($userData)){
			$userData['success'] = true;
			session_start();
			$_SESSION['userData'] = $userData;
			return redirect('tasks');
		}
	}

	public function register()
	{
		App::get('database')->insertIntoDatabase('users', 
			['name' => $_POST['name'], 
			'email' => $_POST['email'], 
			'password' => $_POST['password']]);

		return redirect('');
	}

	public function logout()
	{
		session_start();
		$_SESSION['userData']['success'] = false;
		session_unset();
		redirect('');
	}
}
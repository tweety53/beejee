<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\Task;

class TasksController{
	public function index()
	{
		$tasks=App::get('database')->selectAll('tasks');

		return view('tasks/tasks', compact('tasks'));
	}

	public function store()
	{
		session_start();

		$task = new Task($_POST['text'], 
			$_SESSION['userData'][0]->name,
			$_SESSION['userData'][0]->email, 0);

		

		App::get('database')->insertIntoDatabase('tasks', 
			['text' => $task->getText(), 
			'image' => $task->getImage(),
			'username' => $task->getUsername(),
			'useremail' => $task->getUseremail(),
			'status' => $task->getStatus()]);

		return redirect('tasks');
	}
	

	public function updateStatus()
	{
		App::get('database')->updateStatusInDB('tasks', $_POST['id']);
	}

	public function updateText()
	{
		App::get('database')->updateTextInDB('tasks', $_POST['id'], $_POST['text']);
	}

	public function filter()
	{
		$tasks=App::get('database')->selectFiltered('tasks', $_GET);
		return view('tasks/filter', compact('tasks'));
	}
}
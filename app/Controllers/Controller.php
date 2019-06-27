<?php
namespace App\Controllers;

class Controller
{
	protected function checkauth(){
		if (get_session('logged_in') == NULL) {
			redirect('/login');
		}
	}
}


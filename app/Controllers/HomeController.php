<?php
namespace App\Controllers;
class HomeController
{
	public function getIndex()
	{
		if (get_session('logged_in')) {
			return view('index');
		} else {
			redirect('/login');
		}
	}
	public function getLogout()
	{
		session('logged_in', false);
        session('id', null);
        session('name', null);
        session('email', null);
        redirect('/login');
	}
}
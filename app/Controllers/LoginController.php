<?php
namespace App\Controllers;

use App\Models\User;
use Illuminate\Validation\Validator;
class LoginController
{
	public function getIndex()
	{
		if (get_session('logged_in')) {
			redirect('/');
		} else {
			return view('login');
		}
	}
	public function postEnter()
	{
	$email = trim($_POST['email']);
    $password = trim($_POST['password']);
		
    $message = [];

    $user = User::where('email',$email)->first();
    if ($user) {
        if (password_verify($password, $user->password)) {
            session('failed_email',null);
            session('error', null);
            session('logged_in', true);
            session('id', $user->id);
            session('name', $user->name);
            session('email', $user->email);
            redirect('/');
        } else {
            session('failed_email',$email);
            session('error',"Password doesn't match.");
            redirect('/login');
        }
    } else {
        session('failed_email',$email);
        session('error',"Email doesn't match.");
        redirect('/login');

    }
	}
}
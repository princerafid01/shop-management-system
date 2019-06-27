<?php
namespace App\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Userextra;
use Respect\Validation\Validator as v;
class UserController extends Controller
{	
	public function getIndex()
	{
		$this->checkauth();		
		$data = User::all();
		return view('user',$data);
	}
	public function getLogout()
	{
		$this->checkauth();
		session('logged_in', false);
        session('id', null);
        session('name', null);
        session('email', null);
        redirect('/login');
	}
	public function getAdd()
	{
		$this->checkauth();
		$data['roles'] = Role::all();
		return view('user-add',$data); 
	}
	public function postCreate()
	{
		$errors = [];
		$fields = [];
		$all_user = User::all();
		foreach ($all_user as $user) {
			if ($user->email == $_POST['email']) {
				$errors[] = "This email has been taken already."; 
			}
		}
		foreach ($_POST as $key => $value) {
			if(!v::notEmpty()->validate($value)){
				$errors[] = "Please fill the ".ucfirst($key)." field";
			}
		}
		if(!v::alnum()->validate($_POST['name'])){
			$errors[] = "Please enter a valid name"; 
		} 
		if(!v::email()->validate($_POST['email'])){
			$errors[] = "Please enter a valid email"; 
		}
		if(!v::key('password', v::equals($_POST['password_confirmation']))->validate($_POST)){
			$errors[] = "Password didn't match"; 
		}
		if ($errors) {
		foreach ($_POST as $key => $value) {
			$fields[$key] = $value;
		}
			session('fields',$fields);
			session('errors',$errors);
			redirect('/users/add');
		} else {
			session('errors',NULL);
			$user = User::create([
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'role_id' => $_POST['role'],
				'password' => password_hash($_POST['password'],PASSWORD_BCRYPT),
			]);
			$userex = Userextra::create([
				'phone' => $_POST['phone'],				
			]);
			if ($userex) {
				$update_user = User::find($user->id)->update(['userextra_id' => $userex->id]);
			}
			if ($update_user) {
				session('success',"User Created Successfully.");
				redirect('/users');
			}

		}
	}
}
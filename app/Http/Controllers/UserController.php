<?php 

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

	public function __construct(){
	}

	public function index(){
		$users = User::all();
		return $this->success($users, 200);
	}

	public function register(Request $request){
		$this->validateRequest($request);
        $password = Hash::make($request->get('password'));

		$user = User::create([
					'email' => $request->get('email'),
					'name' => $request->get('name'),
					'password'=> $password
				]);


		return $this->success("The user with with id {$user->email} has been created", 201);
	}

	public function show(Request $request){
		$user = User::find($request->user()->id);
		return $this->success($request->user(), 200);
	}

	public function validateRequest(Request $request){

		$rules = [
			'email' => 'required|email|unique:users',
			'name' => 'required',
			'password' => 'required|min:6'
		];

		$this->validate($request, $rules);
	}

	public function isAuthorized(Request $request){

		$resource = "users";
		// $user     = User::find($this->getArgs($request)["user_id"]);

		return $this->authorizeUser($request, $resource);
	}
}
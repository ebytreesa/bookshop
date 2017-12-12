<?php

class UserController extends BaseController {

	public function register()
	{
		return View::make('users.register');
	}

	public function postRegister()
	{
		$messages	= array(
			'required'	=> ':attribute feltet skal udfyldes',
			'email'	=> 'skriv en gyldig email adresse',
			'unique'=> 'brugernavnet er optaget',
			'same'	=> 'koderne er ikke ens',
			'min'	=> ':attribute feltet skal være min 6 tegn'
			);
		$validator	= Validator::make(Input::All(), array(
			'username' => 'required|unique:users|min:6',
			'email'	=> 'required|email',
			'pass1'	=>	'required|min:6',
			'pass2'	=>	'required|same:pass1'
			), $messages);
		if ($validator->fails())
		{
			return Redirect::to('/register')
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{
			$user = new User;
			$user->username	= Input::get('username');
			$user->email= Input::get('email');
			$user->password	= Hash::make(Input::get('pass1'));
			$user->save();
				
		}
		if ($user)
		{
			return Redirect::to('/')->withSuccess('Brugeren blev oprettet');
		}else
		{
			return "der opstod en fejl";
		}

	}
	

	public function login()
	{
		return View::make('users.login');
	}

	public function postLogin()
	{
		$rules = array(
				'username' => 'required',
				'password' => 'required'
				);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->fails())
			{
				return Redirect::to('/login')->withError('login failed');
			}else
			{
				$userdata = array(
					'username' => Input::get('username'),
					'password' => Input::get('password')
					);
				if(Auth::attempt($userdata))
				{
				return Redirect::to('/')->withSuccess('You are now logged in');
			    }else
			    {
				return Redirect::to('/login')->withError('username or password invalid');
			   }
				
			}
	}

	public function logout()
		{
			Auth::logout();
			return Redirect::to('/')->withSuccess('you are logged out');
		}

	public function profile()
	{  
		 $cart = Cart::where('user_id', Auth::user()->id)->get();
		return View::make('users.profile')->withCart($cart);
	}

	public function deleteCart($id)
	{
		Cart::destroy($id);
		return Redirect::to('/profile')->withSuccess('cart item blev slettet');
	}	


	public function editProfile()
	{
		return View::make('users.editProfile');
	}
	public function PostEditProfile(){
			$messages = array(
			'required' => ':attribute feltet skal udfydes',
			'email' => 'Skiv en gyldig emailadddress',	
			
			'min' => 'Feltet skal være mindst6 tegn'
			);

			$validator = Validator::make(Input::all(), array(
			'username' => 'required|min:6',
			'email' => 'required|email',
					
			), $messages);

			if ($validator->fails())
		    {
			return Redirect::to('/editProfile')
			->withErrors($validator->messages())
			
			;
			}else
			{
			
			$user  = User::find(Auth::user()->id);
			$user->username = Input::get('username') ;
			$user->email = Input::get('email');
			$user->save();
			}
			if ($user)
			{
				return Redirect::to('/profile')->withSuccess('user edited');
			}else
			{
			return "Unknown error";
			}

		}

	public function deleteProfile()
	{
		User::destroy(Auth::user()->id);
		return Redirect::to('/')->withSuccess('user blev slettet');
	}	

	

}

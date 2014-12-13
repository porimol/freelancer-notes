<?php

class AuthenticationController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('login')->with('title','User login');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function login()
	{
		$credentials = array(
				'email' 	=> Input::get('email'),
				//'password' 	=> Input::get('password')
				'password' 	=> Hash::make(Input::get('password'))
			);
		
		try{
			$user = Sentry::authenticate($credentials, false);
			if($user){
				//return Redirect::to('dashboard');
				return Redirect::to('clients');
				var_dump($credentials);
			}
		}
		/*catch(\Exception $e){
			//echo $e->getMessage();
			Session::flash('flash_message', 'User email/password incorrect.');
			//return Redirect::to('/')->withErrors('login_errors',$e->getMessage())->with('title','Login errors');
			//var_dump($credentials);
		}*/

		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    echo 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    echo 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    echo 'User is not activated.';
		}

		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    echo 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    echo 'User is banned.';
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function logout()
	{
		Sentry::logout();
		return Redirect::to('/');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		/*try{
			$user = Sentry::createUser(array(
					'first_name' => Input::get('first_name'),
					'last_name' => Input::get('last_name'),
					'email' => Input::get('email'),
					'password' => Input::get('password'),
					'activated' => true
				));
		}
		catch(Cartalyst\Sentry\Users\UserExistsException $e){
			echo 'User already exists';
		}*/
	}
}

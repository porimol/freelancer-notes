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
		try{
			$credentials = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
				//'password' 	=> Hash::make(Input::get('password'))
			);

			$user = Sentry::authenticate($credentials, false);
			if($user){
				return Redirect::to('dashboard');
				//var_dump(Sentry::getUser());
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
		    //echo 'Login field is required.';
		    Session::flash('flash_message', 'Login field is required');
			return Redirect::to('/')->withErrors('login_errors',$e->getMessage())->with('title','Login errors');
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    //echo 'Password field is required.';
		    Session::flash('flash_message', 'Password field is required');
			return Redirect::to('/')->withErrors('login_errors',$e->getMessage())->with('title','Login errors');
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    //echo 'Wrong password, try again.';
		    Session::flash('flash_message', 'Wrong password, try again');
			return Redirect::to('/')->withErrors('login_errors',$e->getMessage())->with('title','Login errors');
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    //echo 'User was not found.';
		    Session::flash('flash_message', 'User was not found');
			return Redirect::to('/')->withErrors('login_errors',$e->getMessage())->with('title','Login errors');
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    //echo 'User is not activated.';
		    Session::flash('flash_message', 'User is not activated');
			return Redirect::to('/')->withErrors('login_errors',$e->getMessage())->with('title','Login errors');
		}

		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    //echo 'User is suspended.';
		    Session::flash('flash_message', 'User is suspended');
			return Redirect::to('/')->withErrors('login_errors',$e->getMessage())->with('title','Login errors');
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    //echo 'User is banned.';
		    Session::flash('flash_message', 'User is banned');
			return Redirect::to('/')->withErrors('login_errors',$e->getMessage())->with('title','Login errors');
		}
		catch(Exception $e){
			//echo $e->getMessage();
			Session::flash('flash_message', 'Don\'t try to direct access');
			return Redirect::to('/')->with('title','Login errors');
			//var_dump($credentials);
		}
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


		/*try
		{
			$user = Sentry::createUser(array(
				'email' => 'user@user.com',
				'password' => 'admin',
				'activated' => true,

				));
		}

		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			echo 'User Already Exists';
		}*/
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function password()
	{
		return View::make('backend.change_user_password')->with('title', 'Change user password');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function changePassword()
	{
		//Session::flash('flash_message', "Sorry, you have not permission."); // set the flash message
        //return Redirect::to('dashboard');
		$input = [
			'user_id' => Input::get('user_id'),
			'password' 		=> Input::get('password'),
			'confirm_pass' 	=> Input::get('confirm_pass')
		];

		$rules = [
			'user_id'     	=> 'required|numeric|min:1',
			'password'     	=> 'required|alpha_num|min:10|max:32',
            'confirm_pass'  => 'required|same:password',
		];

		try
		{
			// call validation class
    		$validation = Validator::make($input, $rules);

			if($validation->fails())
			{
				return Redirect::route("pass")->withErrors($validation)->withInput();
			}
			else{
				// Find the user using the user id
			    $user = Sentry::findUserById($input['user_id']);
			    // Update the user details
			    $user->password = $input['password'];
			    // if updates the user
			    $updated = $user->save();

			    if ($updated)
			    {
			    	Session::flash('success_message', "Password is updated just now."); // set the flash message
            		return Redirect::route("pass");
			    }
			    else
			    {
			        Session::flash('flash_message', "Something is going to wrong. Please try again later!"); // set the flash message
            		return Redirect::route("pass");
			    }
			}
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    Session::flash('flash_message', $input['first_name']."'s"." was not found."); // set the flash message
            return Redirect::route("pass");
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function editProfile()
	{
		return View::make('backend.edit_user_profile')->with('title', 'Edit user profile');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function updateProfile()
	{
		//Session::flash('flash_message', "Sorry, you have not permission."); // set the flash message
        //return Redirect::to('dashboard');
		$input = [
			'user_id' => Input::get('user_id'),
			'email' => Input::get('email'),
			'first_name' => Input::get('first_name'),
			'last_name' => Input::get('last_name')
		];

		$rules = [
			'user_id'     	=> 'required|numeric|min:1',
            'email'         => 'required|email',
            'first_name'    => 'required',
            'last_name'     => 'required'
		];
		

		try
		{
			// call validation class
    		$validation = Validator::make($input, $rules);

			if($validation->fails()){
				return Redirect::route("profile_edit")->withErrors($validation)->withInput();
			}
			else{
			    // Find the user using the user id
			    $user = Sentry::findUserById($input['user_id']);
			    // Update the user details
			    $user->email = $input['email'];
			    $user->first_name = $input['first_name'];
			    $user->last_name = $input['last_name'];
			    $updated = $user->save();

			    // if updates the user
			    if ($updated)
			    {
			    	Session::flash('success_message', $input['first_name']."'s"." information is updated just now."); // set the flash message
            		return Redirect::route("profile_edit");
			    }
			    else
			    {
			        Session::flash('flash_message', "Something is going to wrong. Please try again later!"); // set the flash message
            		return Redirect::route("profile_edit");
			    }
			}
		}
		//if you don't wanna update the old email address
		//catch (Cartalyst\Sentry\Users\UserExistsException $e)
		//{
		    //Session::flash('flash_message', $input['first_name']."'s"." with this login already exists."); // set the flash message
            //return Redirect::route("profile_edit");
		//}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    Session::flash('flash_message', $input['first_name']."'s"." was not found."); // set the flash message
            return Redirect::route("profile_edit");
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
}

<?php

class ClientsController extends \BaseController {
    // Properties initialize
    private $clients;
    private $all_clients;
    private $marketplace;

    public function __construct(){
        $this->clients = new ClientstModel;
        $this->all_clients = $this->clients->all(); // all clients
        $this->marketplace = new MarketplacesModel; // all marketplaces
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = [
            //'all_clients'   => $this->all_clients,
            'all_clients'   => ClientstModel::paginate(10),
            'title'         => 'All clients information'
        ];

        return View::make('backend.all_clients')->with($data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data = [
            'marketplaces' => $this->marketplace->all(),
            'title' => 'Add new client information'
        ];
		return View::make('backend.add_client')->with($data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = [
            'name'          => Input::get('name'),
            'email'         => Input::get('email'),
            'skype'         => Input::get('skype'),
            'country'       => Input::get('country'),
            'market_id'     => Input::get('marketplace')
        ];

        // Set the form validation rules
        $rules = [
            'market_id'     => 'required|numeric|min:1',
            'name'          => 'required|alpha_dash|min:3',
            'email'         => 'required|email|unique:clients',
            'skype'         => 'required|unique:clients',
            'country'       => 'required'
        ];

        // call validation class
        $validation = Validator::make($input, $rules);

        // Check the validation
        if($validation->fails()):
            //$messages = $validation->messages(); // get the error messages from the validator
            // if validation fails.return with errors
            return Redirect::to('clients')->withErrors($validation)->withInput();
        else:
            //$this->clients->user_id         = 1; // set client name
            $this->clients->name            = Input::get('name'); // set client name
            $this->clients->email           = Input::get('email'); // set email
            $this->clients->skype           = Input::get('skype'); // set skype
            $this->clients->country         = Input::get('country'); // set country
            $this->clients->market_id       = Input::get('marketplace'); // set marketplace
            $this->clients->save();
            Session::flash('success_message', Input::get('name')."'s"." information saved."); // set the flash message
            return Redirect::to('clients/all');
        endif;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $client_info = ClientstModel::find($id);
        $data = [
            'title'             => 'Edit client information', // page title
            'client_info'       => $client_info, // find client information by id
            'marketplaces'      => $this->marketplace->all() // all marketplaces
        ];
        if($client_info):
            return View::make('backend.edit_client')->with($data);
        else:
            Session::flash('flash_message', "Nothing found for {$id}"); // set the flash message
            $error_data = [
                'all_clients'       => $this->all_clients, // all clients information
                'marketplaces'      => $this->marketplace, // all marketplaces
                'title'             => 'Edit client information', // page title
            ];
            return View::make('backend.all_clients')->with($error_data);
        endif;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
        // all input values
        $input = Input::all();
        $id = Input::get('client_id');
        // Set the form validation rules
        $rules = [
            'name'          => 'required|min:3',
            'email'         => 'required|email',
            'skype'         => 'required',
            'country'       => 'required',
            'marketplace'   => 'required'
        ];

        // call validation class
        $validation = Validator::make($input, $rules);

        // Check the validation
        if($validation->fails()):
            // if validation fails.return with errors
            return Redirect::to("clients/{$id}")->withErrors($validation)->withInput();
        else:
            $update_client_info = ClientstModel::find($id);
            $update_client_info->name            = Input::get('name'); // set client name
            $update_client_info->email           = Input::get('email'); // set email
            $update_client_info->skype           = Input::get('skype'); // set skype
            $update_client_info->country         = Input::get('country'); // set country
            $update_client_info->market_place    = Input::get('marketplace'); // set marketplace
            $update_client_info->save();

            Session::flash('success_message', Input::get('name')."'s"." information updated."); // set the flash message
            return Redirect::to("clients/{$id}");
        endif;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        // delete the client information
        $clients = ClientstModel::find($id);
        $clients->delete();

        // redirect
        Session::flash('success_message', 'Successfully deleted the client!');
        return Redirect::to('clients/all');
	}


}

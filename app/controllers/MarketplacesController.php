<?php

class MarketplacesController extends \BaseController {
    // Properties initialize
    private $marketplace;

    public function __construct(){
        $this->marketplace = new MarketplacesModel;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function index(){
        $all = $this->marketplace->all(); // all clients
        $data = [
            //'all_marketplaces'      => $all,
            'all_marketplaces'      => MarketplacesModel::paginate(6),
            'title'                 => 'All clients information'
        ];

        return View::make('backend.all_marketplaces')->with($data);
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = [
            'title' => 'Add new marketplace'
        ];

        return View::make('backend.add_marketplace')->with($data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        // Store all input in a array
        $input = [
            'type'      => Input::get('marketplace_type'),
            'name'      => Input::get('name'),
            'url'       => Input::get('url')
        ];

        // Ser form validation rules
        $rules = [
            'type'      => 'required|alpha|min:7|max:8',
            'name'      => 'required|alpha_dash|min:5',
            'url'       => 'required|unique:marketplaces'
        ];

        // Check validation
        $validation = Validator::make($input, $rules);
        if($validation->fails()):
            return Redirect::to('marketplaces')->withErrors($validation)->withInput();
        else:
            $this->marketplace->type       = $input['type'];
            $this->marketplace->name       = $input['name'];
            $this->marketplace->url        = $input['url'];
            $this->marketplace->save();

            Session::flash('success_message', Input::get('name')." information saved."); // set the flash message
            return Redirect::to('marketplaces');
        endif;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $marketplaces = MarketplacesModel::find($id);
        $data = [
            'title'                 => 'Edit marketplace information', // page title
            'marketplaces'          => $marketplaces, // find client information by id
        ];
        //var_dump($marketplaces);
        if($marketplaces):
            return View::make('backend.edit_marketplace')->with($data);
        else:
            Session::flash('flash_message', "Nothing found for {$id}"); // set the flash message
            return View::make('backend.all_marketplaces')->with($data);
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
        // Store all input in a array
        //$input = Input::all();
        $marketplace_id = Input::get('marketplace_id');
        $input = [
            'type'      => Input::get('marketplace_type'),
            'name'      => Input::get('name'),
            'url'       => Input::get('url')
        ];

        // Ser form validation rules
        $rules = [
            'type'      => 'required|min:7|max:8',
            'name'      => 'required|min:5',
            'url'       => 'required'
        ];
        //var_dump($input);
        // Check validation
        $validation = Validator::make($input, $rules);
        if($validation->fails()):
            //var_dump($input);
            return Redirect::to("marketplaces/{$marketplace_id}")->withErrors($validation)->withInput();
        else:
            $marketplace = MarketplacesModel::find($marketplace_id);
            $marketplace->type       = $input['type'];
            $marketplace->name       = $input['name'];
            $marketplace->url        = $input['url'];
            $marketplace->save();
            //var_dump($rules);
            Session::flash('success_message', Input::get('name')."'s"." information updated."); // set the flash message
            return Redirect::to('marketplaces/all');
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
        $clients = MarketplacesModel::find($id);
        $clients->delete();
        // redirect
        Session::flash('success_message', 'Successfully deleted the marketplace!');
        return Redirect::to('marketplaces/all');
	}


}

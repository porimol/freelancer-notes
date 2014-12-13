<?php

class ProjectsController extends \BaseController {
    // Properties initialize
    private $projects;
    private $all_projects;
    private $clients;
    private $all_clients;
    private $marketplaces;
    private $all_marketplaces;

    public function __construct(){
        $this->projects = new ProjectsModel;
        $this->all_projects = $this->projects->all();
        $this->clients = new ClientstModel;
        $this->all_clients = $this->clients->all();
        $this->marketplaces = new MarketplacesModel; // all marketplaces
        $this->all_marketplaces = $this->marketplaces->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        $all = DB::table('clients')->Join('projects', 'clients.id', '=', 'projects.client_id')->paginate(10);
        $data = [
            'all_projects'   => $all,
            'title'         => 'All clients information'
        ];

        return View::make('backend.all_projects')->with($data);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{   $data = [
            'marketplaces' => $this->all_marketplaces,
            'clients'   => $this->all_clients, // all clients
            'title'     => 'New project information' // page title
        ];
		return View::make('backend.add_project')->with($data);
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
            'market_id'         => Input::get('marketplace'),
            'client_id'         => Input::get('client_id'),
            'project_name'      => Input::get('project_name'),
            'budget'            => Input::get('budget'),
            'started_date'      => Input::get('started_date'),
            'delivery_date'     => Input::get('delivery_date')
        ];

        // Ser form validation rules
        $rules = [
            'market_id'         => 'required|numeric|min:1',
            'client_id'         => 'required|numeric|min:1',
            'project_name'      => 'required|min:5',
            'budget'            => 'required|alpha_dash|min:2',
            'started_date'      => 'required|alpha_dash|min:5',
            'delivery_date'     => 'required|min:5'
        ];

        // Check validation
        $validation = Validator::make($input, $rules);
        if($validation->fails()):
            return Redirect::to('projects')->withErrors($validation)->withInput();
        else:
            $this->projects->market_id          = $input['market_id'];
            $this->projects->client_id          = $input['client_id'];
            $this->projects->project_name       = $input['project_name'];
            $this->projects->budget             = $input['budget'];
            $this->projects->started_date       = $input['started_date'];
            $this->projects->delivery_date      = $input['delivery_date'];
            $this->projects->save();
            // Set the flash message
            Session::flash('success_message', Input::get('project_name')."'s"." information saved.");
            return Redirect::to('projects');
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
        $project_info = ProjectsModel::find($id);
        $data = [
            'title'                 => 'Edit project information', // page title
            'project_info'          => $project_info, // find client information by id
            'clients'               => $this->all_clients // all marketplaces
        ];
        //var_dump($data);
        if($project_info):
            return View::make('backend.edit_project')->with($data);
        else:
            Session::flash('flash_message', "Nothing found for {$id}"); // set the flash message
            return View::make('backend.all_projects')->with($data);
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
        $input = Input::all();
        $project_id = Input::get('project_id');

        // Ser form validation rules
        $rules = [
            'client_id'         => 'required|numeric|min:1',
            'project_name'      => 'required|min:5',
            'budget'            => 'required|min:2',
            'started_date'      => 'required|min:5',
            'delivery_date'     => 'required|min:5'
        ];

        // Check validation
        $validation = Validator::make($input, $rules);
        if($validation->fails()):
            return Redirect::to("projects/{$project_id}")->withErrors($validation)->withInput();
        else:
            $project = ProjectsModel::find($project_id);
            $project->client_id          = $input['client_id'];
            $project->project_name       = $input['project_name'];
            $project->budget             = $input['budget'];
            $project->started_date       = $input['started_date'];
            $project->delivery_date      = $input['delivery_date'];
            $project->save();

            // Set the flash message
            Session::flash('success_message', Input::get('project_name')."'s"." information updated.");
            return Redirect::to('projects/all');
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
        // delete the project information
        $clients = ProjectsModel::find($id);
        $clients->delete();

        // redirect
        Session::flash('success_message', 'Successfully deleted the project!');
        return Redirect::to('projects/all');
	}


}

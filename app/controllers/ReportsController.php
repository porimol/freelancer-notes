<?php

class ReportsController extends \BaseController {
    // Properties initialize
    private $clients;
    private $marketplaces;

    public function __construct(){
        $this->clients = new ClientstModel;
        $this->marketplaces = new MarketplacesModel; // all marketplaces
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = [
            'title'             => 'Reports', // page title
            'clients'           => $this->clients->all(), // all clients
            'marketplaces'      => $this->marketplaces->all() // all marketplaces
        ];
		return View::make('backend.reports')->with($data);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
        $input = [
            'marketplace'   => Input::get('marketplace'),
            'client'        => Input::get('client'),
            'from_date'     => Input::get('from_date'),
            'to_date'       => Input::get('to_date')
        ];

        // Set the form validation rules
        $rules = [
            'from_date'    => 'required|date_format:"Y-m-d"',
            'to_date'      => 'required|date_format:"Y-m-d"'
        ];

        // call validation class
        $validation = Validator::make($input, $rules);

        // Check the validation
        if($validation->fails()):
            // if validation fails.return with errors
            return Redirect::to('reports')->withErrors($validation)->withInput();
        else:
            //Session::flash('The report is here.');
            //return Redirect::to('reports');
            $join_result = DB::table('clients')
                ->select('clients.*','projects.*','marketplaces.name as marketplace')
                ->join('projects', 'projects.client_id', '=', 'clients.id')
                ->join('marketplaces', 'marketplaces.id', '=', 'projects.market_id')
                ->whereBetween('projects.delivery_date', array($input['from_date'],$input['to_date']))
                ->orWhere('marketplaces.id', '=', $input['marketplace'])
                ->orWhere('clients.id', '=' ,$input['client'])
                ->get();

            $data = [
                'report_result'     => $join_result,
                'from'              => $input['from_date'],
                'to'                => $input['to_date'],
                'client'            => ClientstModel::find($input['client']),
                'marketplace'       => MarketplacesModel::find($input['marketplace']),
                'title'             => 'Reports'
            ];

            /*echo 'marketplace = '.Input::get('marketplace');
            echo '<br/>----------------------------------------------------------------------------------------<br/>';
            echo 'client = '.Input::get('client');
            echo '<br/>----------------------------------------------------------------------------------------<br/>';
            echo 'From = '.Input::get('from_date');
            echo '<br/>----------------------------------------------------------------------------------------<br/>';
            echo 'To = '.Input::get('to_date');
            echo '<br/>----------------------------------------------------------------------------------------<br/>';
            */

            if($input['from_date'] and $input['to_date'] and $input['client'] and $input['marketplace']):
                /*echo 'It\'s work for date 2 date, marketplace, client';
                echo '<br/>----------------------------------------------------------------------------------------<br/>';
                var_dump($join_result);*/
                return View::make('backend.reports_display_client_marketplace')->with($data);
            endif;

            if($input['from_date'] and $input['to_date'] and $input['client']==0 and $input['marketplace']!=0):
                /*echo 'It\'s work dor date 2 date, marketplace';
                echo '<br/>----------------------------------------------------------------------------------------<br/>';
                var_dump($join_result);*/
                return View::make('backend.reports_display_by_marketplace')->with($data);
            endif;

            if($input['from_date'] and $input['to_date'] and $input['client']!=0 and $input['marketplace']==0):
                /*echo 'It\'s work dor date 2 date, client';
                echo '<br/>----------------------------------------------------------------------------------------<br/>';
                var_dump($join_result);*/
                return View::make('backend.reports_display_by_client')->with($data);
            endif;

            if($input['from_date'] and $input['to_date'] and $input['client']==0 and $input['marketplace']==0):
                /*echo '<br/>It\'s work dor date 2 date';
                echo '<br/>----------------------------------------------------------------------------------------<br/>';
                var_dump($join_result);*/
                return View::make('backend.reports_display')->with($data);
            endif;
            //return View::make('backend.reports_display')->with($data);


            //var_dump($join_result);
            /*foreach($join_result as $join){
                echo  'Name : '.$join->name.'<br/>';
                echo  'Email : '.$join->email.'<br/>';
                echo  'Skype : '.$join->skype.'<br/>';
                echo  'Marketplace : '.$join->market_place.'<br/>';
                echo  'Country : '.$join->country.'<br/>';
                echo  'Project Name : '.$join->project_name.'<br/>';
                echo '--------------------<br/>';
            }*/
        endif;
	}
}

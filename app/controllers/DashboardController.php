<?php

class DashboardController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'DashboardController@create');
	|
	*/

	public function create()
	{
		// Retrive the values from database for project summery information
		$allinfo = DB::table('projects')
					->select(DB::raw('count(id) as total_ptoject'), DB::raw('count(status) as completed_ptoject'), DB::raw('count(client_id) as clients'), DB::raw('sum(budget) as budget'))
                    ->where('status','=','End')
                    ->get();

        // Retrive the values from database for bar chart
		$result = DB::table('projects')
					->select('client_id',DB::raw('DATE_FORMAT(delivery_date,"%M") as month'), DB::raw('count(client_id) as clients'), DB::raw('sum(budget) as income'))
                    ->groupBy(DB::raw('YEAR(delivery_date), MONTH(delivery_date)'))
                    ->get();

        $data = [
        	'title' 		=> 'Dashboard',
        	'jsondata'  	=> $result,
        	'projectsinfo' 	=> $allinfo
        ];

        return View::make('backend.dashboard')->with($data);

        //$result1 = array();
        /*foreach ($result as $value) {
	        $result1['uuu'] = (string) $value->clients;
	        $result1[] = $value->month;
	        $result1[] = $value->income;
	    }
        $js = json_encode($result);
        var_dump($js);*/
        
	}

}

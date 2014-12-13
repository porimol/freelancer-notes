<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ $title }} :: OOIS</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{ HTML::style('assets/css/bootstrap.min.css')}}
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        {{--  Morris chart --}}
        {{ HTML::style('assets/css/morris.css') }}
        <!-- DATA TABLES -->
        {{ HTML::style('assets/css/datatables/dataTables.bootstrap.css') }}
        {{-- Date Picker --}}
        {{ HTML::style('assets/css/datepicker.css') }}
        {{ HTML::style('assets/css/admin.css') }}
        {{-- Style css --}}
        {{ HTML::style('assets/css/style.css') }}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        {{ HTML::script('assets/js/jquery-2.0.2.min.js') }}
        
        <script>
            function ConfirmDelete(){
                var alertMessage = confirm("Are you sure want to delete?");
                if(alertMessage){
                    return true;
                }else{
                    return false;
                }
            }
        </script>
    </head>
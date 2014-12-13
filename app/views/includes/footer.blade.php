        

        <!-- jQuery UI 1.10.3 -->
        {{ HTML::script('assets/js/jquery-ui-1.10.3.min.js')}}
        <!-- Bootstrap -->
        {{ HTML::script('assets/js/bootstrap.min.js')}}
        <!-- DATA TABES SCRIPT -->
        {{ HTML::script('assets/js/jquery.dataTables.js') }}
        <!-- DATA tables page script -->
        <script type="text/javascript">
        $(function() {
            $('#gridtableview').dataTable({
                    "bPaginate": false,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
        
        <!-- Morris.js charts -->
        {{ HTML::script('assets/js/raphael-min.js') }}
        {{ HTML::script('assets/js/morris.min.js') }}
        <!-- AdminLTE App -->
        {{ HTML::script('assets/js/app.js') }}
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        {{ HTML::script('assets/js/dashboard.js') }}
        <!-- AdminLTE for demo purposes -->
        {{ HTML::script('assets/js/demo.js') }}
        <!--Date picker js-->
        {{ HTML::script('assets/js/bootstrap-datepicker.js')}}
        <script type="text/javascript">
            $('#dpd1').datepicker({
                format: "yyyy-mm-dd"
            });
            $('#dpd2').datepicker({
                format: "yyyy-mm-dd"
            });
        </script><!--end date picker js-->
    </body>
</html>
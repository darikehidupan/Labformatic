<!DOCTYPE html>
<html>
<head>
    <title>Date Picker</title>
    <link rel="stylesheet" type="text/css" href="asset/bootstrap.css" media="screen">
    <link rel="stylesheet" type="text/css" href="asset/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="asset/bootstrap-datepicker-1.6.1-dist/css/bootstrap-datepicker.min.css" media="screen">     
</head>	
<body>

<div class="container">
    <form action="PDF.php" method="post">
 <legend>Date Time Picker Bootstrap</legend>
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="dd-mm-yyyy">
                    <input class="form-control" size="10" type="text" name="dari">
     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
    </form>
</div>
<script type="text/javascript" src="asset/js/bootstrap.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="asset/jquery/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="asset/bootstrap-datepicker-1.6.1-dist/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="asset/bootstrap-datepicker-1.6.1-dist/locales/bootstrap-datepicker.id.min.js"></script>
<script type="text/javascript">
 $('.form_date').datepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1,
    });
</script>

</body>
</html>

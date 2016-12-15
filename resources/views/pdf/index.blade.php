
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
{{--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

  <style>
	body { font-family: DejaVu Sans;}
  .container{
    width: 100%;
    height: 700px;
    padding: 10px;
    border: 1px solid black;
    border-radius: 4px;
  }
  </style>
</head>
<body>

<div class="container">
  <h2>Well</h2>
  <div class="well">
  	<table class="table table-bordered">
    	<tr>
	        <td>{{ $application->id }}</td>
	        <td>{{ $application->company_name }}</td>
	        <td>{{ $application->created_at }}</td>
        </tr>
    </table>
  </div>
</div>

</body>
</html>


            


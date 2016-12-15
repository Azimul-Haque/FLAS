<!DOCTYPE html>
<html>
<head>
  <title><?php echo 'PDF_File_'. date('F_d_Y');?></title>
  <meta charset="utf-8">
  <style>
	table {
	    border-collapse: collapse;
	}

	table, td, th {
	    border: 1px solid black;
	}
	th, td{
		padding: 5px;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
	}
  </style>
</head>
<body>

<div class="container">
  <table class="table table-bordered">
	<tr>
	    <th>No</th><th>Company</th><th>Applicant</th><th>Issued</th><th>Status</th>
		<th width="280px">Address</th>
	</tr>
	@foreach ($applications as $application)
    <tr>
	    <td>{{ $application->id }}</td>
	    <td>{{ $application->company_name }}</td> 
		<td>{{ $application->user->name }}</td>
		<td>{{ date('F d, Y | h:i A', strtotime($application->created_at))}}, {{ $application->created_at->diffForHumans() }} </td>
		<td>{{ $application->application_status->display_name }}</td>
		<td>{{ $application->address }}</td> 
	</tr>
	@endforeach
</table>
</div>

</body>
</html>




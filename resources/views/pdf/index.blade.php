<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{$application->license_number}}</title>
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
  <center>
    <img style="width: 100%;" src="images/licenseheader.png">
    <h2 style="border-bottom: 1px solid black;">FIRE LICENSE</h2>
  </center>
  <div class="well" style="font-family: Courier New , Lucida Console, Monospace; text-align: justify;">
    In accordance with the applicable provisions of Bangladesh Fire Service And Civil Defence Authority Code of Bangladesh, and its rules and regulations; The respective Department hereby issues FIRE LICENSE for the following Company; Efective date: <?php echo date('F d, Y');?><br/><br/>

  	<table class="table table-bordered">
        <tr>
          <th width="30%">Company Name:</th>
          <td>{{ $application->company_name }}</td>
        </tr>
        <tr>
          <th>Company Address:</th>
          <td>{{ $application->address }}</td>
        </tr>
        <tr>
          <th>License Number:</th>
          <td>{{ $application->license_number }}</td>
        </tr>
    	  <tr>
	        <th>Expiry Date:</th>
	        <td>{{ date('F d, Y', strtotime($application->expiry_date))}}</td>
        </tr>
    </table><br/>

    This license is not transferable and is granted solely upon the jurisdiction under: <br/>
    {{ $application->owner }}, Owner; <br/>
    {{ $application->chairman }}, Chairman and <br/>
    {{ $application->ceo }}, CEO of, <br/>
    {{ $application->company_name }}<br/><br/>
    <div style="float: left;">
      <img style="width: 150px;" src="images/signature.png"><br/>
      <span style="border-top: 1px solid black;">Director, Operations &amp; Maintenance</span><br/>
      Bangladesh Fire Service and Civil Defence Authority
    </div>
  </div>
</div>

</body>
</html>


            


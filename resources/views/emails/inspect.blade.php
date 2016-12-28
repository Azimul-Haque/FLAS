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

<div style="font-family: Calibri; border:1px solid #90caf9  ">
	<div style="background: #e3f2fd ; padding: 5px; border-bottom: 1px solid #64b5f6">
		<center><h3>FLAS, BFSCD Applicaation Inspection Report</h3></center>
	</div>

	<div style="padding: 10px;">
		<div>
			<strong>নিচের ভুলগুলো সংশোধন করে রিসাবমিট করুন (Please consider these mistakes and update your application)</strong><br/>
			বার্তাঃ {{ $phase_1_message }}
		</div></br>

		<table class="table table-bordered" border="1" style="border-collapse: collapse; border: 1px solid black;">
			<tr> 
				<th style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">লেবেল</th>
				<th style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">মন্তব্য</th>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">প্রতিষ্ঠানের নাম</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_company_name }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">ইমেইল</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_email }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">ফোন নাম্বার</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_phone }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">স্বত্বাধিকারী</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_owner }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">চেয়ারম্যান</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_chairman }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">প্রধান নির্বাহী কর্মকর্তা</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_ceo }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">ঠিকানা</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_address }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">শ্রমিক সংখ্যা</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_employees }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">প্রতিষ্ঠার সাল</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_estd }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">আয়তন</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_area }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">অগ্নি নির্বাপকের সংখ্যা</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_fire_extinguisher }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">অগ্নি নির্বাপকের মেয়াদ</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_fire_extinguisher_exp_date }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">রড ব্রেকার সংখ্যা</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_rod_breaker }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">জরুরী বহির্গমন পথের সংখ্যা</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_emergency_exit }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">মোট তলা</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_storey }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">নিকটতম ভবন সংখ্যা</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_nearest_buildings }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">কোম্পানির লে-আউট প্ল্যান</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_layoutplan }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">স্বত্বাধিকারী সংক্রান্ত ডকুমেন্ট</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_ownershipdocument }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">ট্রেড লাইসেন্স</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_tradelicense }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">আয়কর সার্টিফিকেট</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_tinpaper }}</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">ব্যাংক সার্টিফিকেট</td>
				<td style="border: 1px solid black; padding: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;">{{ $initial_bankcertificate }}</td>
			</tr>
		</table>

		<p>Sent via {{ $from }}</p></br></br></br>

		<center><p style="color: gray;">&copy; {{ date('Y') }} Copyright Reserved, FLAS, BFSCD</p></center>
	</div> 
</div>
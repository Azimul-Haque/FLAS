<div style="font-family: Calibri; border:1px solid #90caf9  ">
	<div style="background: #e3f2fd ; padding: 5px; border-bottom: 1px solid #64b5f6">
		<center><h3>FLAS, BFSCD Applicaation Inspection Report</h3></center>
	</div>

	<div style="padding: 10px;">
		<div>
			<table>
				<tr>
					<th>Message</th>
					<td>: {{ $approval_message }}</td> 
				</tr>
				<tr>
					<th>License Number</th> 
					<td>: {{ $license_number }}</td>
				</tr>
				<tr> 
					<th>Expiry Date</th>
					<td>: {{ $expiry_date }}</td>
				</tr>
			</table>
		</div>

		<p>Sent via {{ $from }}</p></br></br></br>

		<center><p style="color: gray;">&copy; {{ date('Y') }} Copyright Reserved, FLAS, BFSCD</p></center>
	</div>
</div>
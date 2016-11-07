<div style="font-family: Calibri; border:1px solid #90caf9  ">
	<div style="background: #e3f2fd ; padding: 5px; border-bottom: 1px solid #64b5f6">
		<center><h3>You have new mail from the contact form</h3></center>
	</div>

	<div style="padding: 10px;">
		<p>Sent Via: {{ $email }}</p>
		<p>Message: {{ $bodyMessage }}</p>
		</br></br></br>

		<center><p style="color: gray;">&copy; {{ date('Y') }} Copyright Reserved, FLAS, BFSCD</p></center>
	</div>
</div>
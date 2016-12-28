@extends('main')

@section('title', 'FLAS | Report Generation')

@section('stylesheet')
  {!!Html::style('css/styles.css')!!}

@endsection


@section('content')

  <div class="row">
        <div class="col-lg-12 margin-tb">
            <ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#pending">Pending</a></li>
			  <li><a data-toggle="tab" href="#inspected">Inspected</a></li>
			  <li><a data-toggle="tab" href="#approved">Approved</a></li>
			  <li><a data-toggle="tab" href="#rejected">Rejected</a></li>
			  <li><a data-toggle="tab" href="#expired">Expired</a></li>
			</ul>

			<div class="tab-content">
			  <div id="pending" class="tab-pane fade in active">
			    <h3>Export <b>Pending</b> Applications (এক্সপোর্ট করুন)</h3>
				<span style="font-size: 15px">
					<i class="fa fa-file-excel-o" aria-hidden="true" style="font-size: 20px; color: green;"></i>
					<a href="{{ url('/reports/export/pending/excel') }}"> এক্সসেল ফরম্যাট(.xlsx) <i class="fa fa-download" aria-hidden="true"></i></a>
				</span>
				<span style="margin-left: 20px; font-size: 15px">
					<i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 20px; color: red;"></i>
					<a href="{{ url('/reports/export/pending/pdf') }}"> পিডিএফ ফরম্যাট(.pdf) <i class="fa fa-download" aria-hidden="true"></i></a>
				</span>
				<hr/>
			    <h3>Pending</h3>
			    <table class="table table-bordered">
			      <tr>
			        <th>No</th><th>Company</th><th>Applicant</th><th>Issued</th><th>Status</th>
			        <th width="280px">Address</th>
			      </tr>
			      @foreach ($pendings as $pending)
			      <tr>
			        <td>{{ $pending->id }}</td>
			        <td>{{ $pending->company_name }}</td>
			        <td>{{ $pending->user->name }}</td>
			        <td>{{ date('F d, Y | h:i A', strtotime($pending->created_at))}}, {{ $pending->created_at->diffForHumans() }} </td>
			        <td>{{ $pending->application_status->display_name }}</td>
			        <td>{{ $pending->address }}</td>
			      </tr>
			      @endforeach
			    </table>
			  </div>
			  <div id="inspected" class="tab-pane fade">
			    <h3>Export <b>Inspected</b> Applications (এক্সপোর্ট করুন)</h3>
				<span style="font-size: 15px">
					<i class="fa fa-file-excel-o" aria-hidden="true" style="font-size: 20px; color: green;"></i>
					<a href="{{ url('/reports/export/inspected/excel') }}"> এক্সসেল ফরম্যাট(.xlsx) <i class="fa fa-download" aria-hidden="true"></i></a>
				</span>
				<span style="margin-left: 20px; font-size: 15px">
					<i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 20px; color: red;"></i>
					<a href="{{ url('/reports/export/inspected/pdf') }}"> পিডিএফ ফরম্যাট(.pdf) <i class="fa fa-download" aria-hidden="true"></i></a>
				</span>
				<hr/>
			    <h3>Inspected</h3>
			    <table class="table table-bordered">
			      <tr>
			        <th>No</th><th>Company</th><th>Applicant</th><th>Issued</th><th>Status</th>
			        <th width="280px">Address</th>
			      </tr>
			      @foreach ($inspecteds as $inspected)
			      <tr>
			        <td>{{ $inspected->id }}</td>
			        <td>{{ $inspected->company_name }}</td>
			        <td>{{ $inspected->user->name }}</td>
			        <td>{{ date('F d, Y | h:i A', strtotime($inspected->created_at))}}, {{ $inspected->created_at->diffForHumans() }} </td>
			        <td>{{ $inspected->application_status->display_name }}</td>
			        <td>{{ $inspected->address }}</td> 
			      </tr>
			      @endforeach
			    </table>
			  </div>
			  <div id="approved" class="tab-pane fade">
			    <h3>Export <b>Approved</b> Applications (এক্সপোর্ট করুন)</h3>
				<span style="font-size: 15px">
					<i class="fa fa-file-excel-o" aria-hidden="true" style="font-size: 20px; color: green;"></i>
					<a href="{{ url('/reports/export/approved/excel') }}"> এক্সসেল ফরম্যাট(.xlsx) <i class="fa fa-download" aria-hidden="true"></i></a>
				</span>
				<span style="margin-left: 20px; font-size: 15px">
					<i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 20px; color: red;"></i>
					<a href="{{ url('/reports/export/approved/pdf') }}"> পিডিএফ ফরম্যাট(.pdf) <i class="fa fa-download" aria-hidden="true"></i></a>
				</span>
				<hr/>
			    <h3>Approved</h3>
			    <table class="table table-bordered">
			      <tr>
			        <th>No</th><th>Company</th><th>Applicant</th><th>Issued</th><th>Status</th>
			        <th width="280px">Address</th>
			      </tr>
			      @foreach ($approveds as $approved)
			      <tr>
			        <td>{{ $approved->id }}</td>
			        <td>{{ $approved->company_name }}</td>
			        <td>{{ $approved->user->name }}</td>
			        <td>{{ date('F d, Y | h:i A', strtotime($approved->created_at))}}, {{ $approved->created_at->diffForHumans() }} </td>
			        <td>{{ $approved->application_status->display_name }}</td>
			        <td>{{ $approved->address }}</td>  
			      </tr>
			      @endforeach
			    </table>
			  </div>
			  <div id="rejected" class="tab-pane fade">
			    <h3>Export <b>Rejected</b> Applications (এক্সপোর্ট করুন)</h3>
				<span style="font-size: 15px">
					<i class="fa fa-file-excel-o" aria-hidden="true" style="font-size: 20px; color: green;"></i>
					<a href="{{ url('/reports/export/rejected/excel') }}"> এক্সসেল ফরম্যাট(.xlsx) <i class="fa fa-download" aria-hidden="true"></i></a>
				</span>
				<span style="margin-left: 20px; font-size: 15px">
					<i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 20px; color: red;"></i>
					<a href="{{ url('/reports/export/rejected/pdf') }}"> পিডিএফ ফরম্যাট(.pdf) <i class="fa fa-download" aria-hidden="true"></i></a>
				</span>
				<hr/>
			    <h3>Rejected</h3>
			    <table class="table table-bordered">
			      <tr>
			        <th>No</th><th>Company</th><th>Applicant</th><th>Issued</th><th>Status</th>
			        <th width="280px">Address</th>
			      </tr>
			      @foreach ($rejecteds as $rejected)
			      <tr>
			        <td>{{ $rejected->id }}</td>
			        <td>{{ $rejected->company_name }}</td>
			        <td>{{ $rejected->user->name }}</td>
			        <td>{{ date('F d, Y | h:i A', strtotime($rejected->created_at))}}, {{ $rejected->created_at->diffForHumans() }} </td>
			        <td>{{ $rejected->application_status->display_name }}</td>
			        <td>{{ $rejected->address }}</td>  
			      </tr>
			      @endforeach
			    </table>
			  </div>
			  <div id="expired" class="tab-pane fade">
			    <h3>Export <b>Expired</b> Applications (এক্সপোর্ট করুন)</h3>
				<span style="font-size: 15px">
					<i class="fa fa-file-excel-o" aria-hidden="true" style="font-size: 20px; color: green;"></i>
					<a href="{{ url('/reports/export/expired/excel') }}"> এক্সসেল ফরম্যাট(.xlsx) <i class="fa fa-download" aria-hidden="true"></i></a>
				</span>
				<span style="margin-left: 20px; font-size: 15px">
					<i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 20px; color: red;"></i>
					<a href="{{ url('/reports/export/expired/pdf') }}"> পিডিএফ ফরম্যাট(.pdf) <i class="fa fa-download" aria-hidden="true"></i></a>
				</span>
				<hr/>
			    <h3>Expired</h3>
			    <table class="table table-bordered">
			      <tr>
			        <th>No</th><th>Company</th><th>Applicant</th><th>Issued</th><th>Status</th>
			        <th width="280px">Address</th>
			      </tr>
			      @foreach ($expireds as $expired)
			      <tr>
			        <td>{{ $expired->id }}</td>
			        <td>{{ $expired->company_name }}</td>
			        <td>{{ $expired->user->name }}</td>
			        <td>{{ date('F d, Y | h:i A', strtotime($expired->created_at))}}, {{ $expired->created_at->diffForHumans() }} </td>
			        <td>{{ $expired->application_status->display_name }}</td>
			        <td>{{ $expired->address }}</td>   
			      </tr>
			      @endforeach
			    </table>
			  </div>
			</div>
        </div>
  </div>
    
@endsection

@section('script')
  {!!Html::script('')!!}
@endsection
@extends('admin.layout.app')



@section('title',"Dashboard")



@section('breadcrumb')

	<a href="{{ url('/') }}">Dashboard</a>

@endsection

@section('css')

	<link href="{{ url('public/') }}/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

	<link href="{{ url('/public') }}/assets/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

@endsection





@section('content')

<!--begin:: Widgets/Stats-->

@include('admin.layout.flash')

@hasanyrole("admin|partner")

<div class="row">

	<div class="col-xl-12">

		<div class="m-portlet m-portlet--full-height  m-portlet--unair">

			<div class="m-portlet__head">

				<div class="m-portlet__head-caption">

					<div class="m-portlet__head-title">

						<h3 class="m-portlet__head-text">

							Application

						</h3>

					</div>

				</div>

				<div class="m-portlet__head-tools">

						<input type="text" class="form-control text-filter m-input" id="year" name="year" value="{{ Session::has('year') && !empty(Session::get('year')) ? Session::get('year') : date('Y') }}" placeholder="Year">

					</ul>

				</div>

			</div>

			<div class="m-portlet__body">

				<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">

					<thead>
						@hasrole('admin')
						<tr>
							<th>
								@hasrole('admin')
								<select name="partner" id="partner" class="form-control select-filter m-input">
									<option value="">Select Partner</option>
									@foreach($partners as $partner)
										<option value="{{ $partner->user_id }}" >{{ ucfirst($partner->name) }}</option>
									@endforeach
								</select>
								@endhasrole
							</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						@endhasrole

						<tr>

							@hasrole('admin')

							<th>Partner</th>

							@endhasrole

							@hasrole('partner')

							<th>Collector</th>

							@endhasrole

							<th>Pre Test Pending</th>

							<th>Pre Test Completed</th>

							<th>Post Test Pending</th>

							<th>Done</th>
							<th>NA</th>
							<th>Pre No Permission</th>
							<th>Post No Permission</th>

							<th>Dropout</th>
							@hasrole('admin')

							<th>Remaining</th>

							@endhasrole

							@hasrole('partner')

							<th>Total/Partner</th>

							@endhasrole

							<th>Total</th>

						</tr>

					</thead>

				</table>

			</div>

		</div>

	</div>

</div>

@endhasanyrole



@endsection





@section('js')

	<script src="{{ url('/public') }}/assets/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

	<script src="{{ url('/public') }}/assets/app/js/dashboard.js" type="text/javascript"></script>

	<script src="{{ url('public/') }}/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

	@hasanyrole("admin|partner")

		<script>

			$(function() {

				getPartner();

				$('#year').datepicker({

		            todayHighlight: true,

		            autoclose: true,

		            viewMode: "years",

    				minViewMode: "years",

		            format: 'yyyy',

		            defaultDate: new Date(year)

		        });

		        $('#partner').change(function(){
		        	getPartner();
		        });



		        $('#year').change(function(){

		        	window.location.href = "{{ url('save-filter') }}"+"/"+$(this).val();

		        })

			});

		</script>

	@endhasanyrole

	<script>



		function getPartner(){

		    $('#m_table_1').DataTable({

		        processing: true,

		        serverSide: true,

		        ordering:true,

		        destroy: true,

		        ajax: {

		        	url: '{!! route('loadDashboard') !!}',

		        	method: 'post',

		        	data: {

				        "_token": "{{ csrf_token() }}",
				        "partner": $('#partner').val()

			        }

		        },

		        columns: [

		            { data: 'name', name: 'name' },
		            { data: 'pre_test_pending', name: 'pre_test_pending' ,sortable : false},
		            { data: 'pending', name: 'pending' ,sortable : false},
		            { data: 'in_prgress', name: 'in_prgress' ,sortable : false},
		            { data: 'completed', name: 'completed' ,sortable : false},
		            { data: 'na', name: 'na' ,sortable : false},
		            { data: 'pre_np', name: 'pre_np' ,sortable : false},
		            { data: 'post_np', name: 'post_np' ,sortable : false},
		            { data: 'dropout', name: 'dropout' ,sortable : false},
		            { data: 'remaining', name: 'remaining' ,sortable : false},
		            { data: 'total', name: 'total' ,sortable : false},

		        ]

		    });

		}

	</script>

@endsection
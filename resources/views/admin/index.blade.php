@include("template.header")
		<div class="main-area mainmenu-area">
			<div class="container-fluid">
				<div class="navbar-header">
					<button id="collapse" type="button" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
				</div>
				<div id="collapse_div" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li  id="dropdown_prod" class="dropdown nav-menus text-center">
							<a href="#">PROPOSAL SYSTEM ADMIN</a>
						
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</div>
		<section id="main-page" class="section-padding1" style="margin-top:10px;margin-bottom:50px">
			<div class="container-fluid">
				<div class="row">
					<form id="submit_search" class="form-group">
						<div class="col-md-12">
							<div class="col-md-12 backgroundwhite shadow radius">
								<div class="col-md-12"><br></div>
								<div class="col-md-12">
									<h4>PRICE LIST</h4>
								</div>
								<div class="col-md-12">
									<div class="col-md-4">
										<div class="form-group">
											<label >PRODUCT</label> 
											<!-- <select class="form-control" id=""> -->
											<select id="product" class="form-control radius dropdown-center">
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label >INSURANCE COVERABILITY</label> 
											<select class="form-control" id="insurance">
												<option value="" selected disabled>- Please Select -</option>
												<option value="1">No Insurance Benefit</option>
												<option value="0">With Insurance Benefit</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label >AGE RANGE</label>
											<select class="form-control" id="age_range">
												<option value="" selected disabled>- Please Select -</option>
											</select>
										</div>
									</div>
									<div class="col-md-10">
										
									</div>
									<div class="col-md-2">
										<button id="search_data" class="btn btn-success btn-block btn-lg" type="button">SEARCH</button>
									</div>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-12">
									<table id="price_list" class="table table-bordered table-hover" width="100%">
										<thead>
											<tr class="chsi-color text-white">
												<th><small>#</small></th>
												<th><center><small>PLAN/NO OF UNITS</small></center></th>
												<th><center><small>CONTRACT PRICE</small></center></th>
												<th><center><small>SPOT CASH</small></center></th>
												<th><center><small>ANNUAL</small></center></th>
												<th><center><small>SEMI-ANNUAL</small></center></th>
												<th><center><small>QUARTERLY</small></center></th>
												<th><center><small>MONTHLY</small></center></th>
											</tr>
										</thead>
										<tbody>
										
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
@include("template.footer2")
@include("admin.edit")
<script>
	$(document).ready(function()
    {
		$('#product').select2();
		$('#insurance').select2();
		$('#age_range').select2();
		load()
		$('[data-mask]').inputmask()
	});
	$("#search_data").click(function(event)
    { 
		if($('#product').val() &&
			$('#insurance').val() &&
			$('#age_range').val())
		{
			price_list()
		}
		else
		{
			alertmessage('Please complete the selection')
		}
	});
	function load()
	{
		event.preventDefault();
		$.ajax({
			url:'{{ route('loaddata')}}',
			type:'get',
			data: 
			{
				'_token': $('meta[name="csrf-token"]').attr('content'),
			},
			success:function(data)
			{
				var obj = JSON.parse(data);
				$('#product').empty();
				var product = document.getElementById("product");
				var yoption = document.createElement("option");
				yoption.text =  "";
				yoption.value =  "";
				yoption.datatokens = "";
				yoption.selected = true; 
				product.add(yoption);
				product[0].disabled = true;

				for(i in obj.product)
				{
					var product = document.getElementById("product");
					var yoption = document.createElement("option");
					yoption.value = obj.product[i].iid;
					yoption.text =  obj.product[i].description;
					yoption.datatokens = obj.product[i].description;
					product.add(yoption);
				}
				$('#product').select2();
			}
		})
	}
	$('#product').change(function(){
		if($("#insurance").val())
		{
			get_age_coverage()
		}
	})
	$('#insurance').change(function(){
		if($("#product").val())
		{
			get_age_coverage()
		}
	})
	function get_age_coverage()
	{
		$.ajax({
			url:'{{ route('get_agerange')}}',
			type:'get',
			data: 
			{
				prod_iid : $('#product').val(),
				insurance : $("#insurance").val(),
				'_token': $('meta[name="csrf-token"]').attr('content'),
			},
			success:function(data)
			{
				var obj = JSON.parse(data);
				$('#age_range').empty();
				var product = document.getElementById("age_range");
				var yoption = document.createElement("option");
				yoption.text =  "";
				yoption.value =  "";
				yoption.datatokens = "";
				yoption.selected = true; 
				product.add(yoption);
				product[0].disabled = true;

				for(i in obj)
				{
					var product = document.getElementById("age_range");
					var yoption = document.createElement("option");
					yoption.value = obj[i].age_range;
					yoption.text =  obj[i].age_range;
					yoption.datatokens = obj[i].age_range;
					product.add(yoption);
				}
				$('#age_range').select2();
			}
		})
	}
	function price_list()
	{
		$("#price_list").DataTable().destroy();
		$('#price_list').DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			pageLength: 10, 
			autoWidth   : false,
			ajax: 
			{
				url:'{{ route('price_list') }}',
				type:'get',
				data: 
				{
					product : $("#product").val(),
					insurance : $("#insurance").val(),
					age_range : $("#age_range").val(),
					'_token': $('meta[name="csrf-token"]').attr('content'),
				},
			},
			columnDefs: [
				{targets: [0,1,2,3,4,5,6,7]},
				{"className": "text-right", "targets": [2,3,4,5,6,7]},
				{"className": "bold-text","targets": [2,3,4,5,6,7]}
			],
			columns: 
			[
				{ data: 'DT_Row_Index', orderable: true, searchable: false },
				{ data: 'plan_name', name: 'plan_name', orderable: true, searchable: true },
				{ data: 'contract_price', name: 'contract_price', orderable: true, searchable: true },
				{ data: 'spot_cash', name: 'spot_cash', orderable: true, searchable: true },
				{ data: 'annual', name: 'annual', orderable: true, searchable: true },
				{ data: 'semi_annual', name: 'semi_annual', orderable: true, searchable: true },
				{ data: 'quarterly', name: 'quarterly', orderable: true, searchable: true },
				{ data: 'monthly', name: 'monthly', orderable: true, searchable: true },
			],
		});
	}
	function edit(ref)
	{
		$.ajax({
			url:'{{ route('get_data')}}',
			type:'get',
			data: 
			{
				ref : ref,
				'_token': $('meta[name="csrf-token"]').attr('content'),
			},
			success:function(data)
			{
				var obj = JSON.parse(data);
				$("#reference").html(obj[0].iid);
				$("#product_description").html(obj[0].product);
				$("#plan").html(obj[0].plan_name);
				$("#mode").html(obj[0].mode);
				$("#current_price").html(obj[0].price);
				$("#edit_price").modal("show");
			}
		})
	}
</script>
</body>
</html>
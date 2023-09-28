</div>

	<div class="row">
		<div id="snackbar" style="border:1px solid gray;">
			<div class="row">
				<div class="col-md-12 pull-left">
					<img src="{{URL::asset('img/caritas.png')}}" class="user-image" style="width:50px;height:50px" alt="User Image">
				</div>
				<div class="col-md-12 pull-left" style="margin:5px">
					<span class="text text-default" id="message-alert"></span>
				</div>
			</div>
		</div>
	</div>
	<!-- {!! Html::script('asset/materialized/js/materialize.js') !!}
	{!! Html::script('asset/materialized/js/materialize.min.js') !!} -->
	{!! Html::script('js/jquery.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
	{!! Html::script('toastr/toastr.min.js') !!}
	{!! Html::script('vendor/datatables/js/jquery.dataTables.min.js') !!}
	{!! Html::script('vendor/datatables-plugins/dataTables.bootstrap.min.js') !!}
	{!! Html::script('vendor/datatables-responsive/dataTables.responsive.js') !!}

	{!! Html::script('plugins/input-mask/jquery.inputmask.js') !!}
    {!! Html::script('plugins/input-mask/jquery.inputmask.date.extensions.js') !!}
    {!! Html::script('plugins/input-mask/jquery.inputmask.extensions.js') !!}

	{!! Html::script('vendor/select2/bootstrap-select.js') !!}
    {!! Html::script('vendor/select2/select2.js') !!}

	{!! Html::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
	
	<script>
		function alertmessage(N,classname,type) 
        {
            var x = document.getElementById("snackbar");
            x.className = "show col-md-2 c"+classname;
            document.getElementById("message-alert").innerHTML = '<small>'+N+'</small>';
            setTimeout(function()
            { 
                x.className = x.className.replace("show", ""); 
                if(type)
                {
                    location.reload();
                }
            }, 3000);
        }
		
		
	</script>
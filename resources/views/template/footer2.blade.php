    </div>
    <div class="row">
        <div id="snackbar" style="border:1px solid gray;">
            <div class="row">
                <div class="col-md-12 pull-left">
                    <img src="{{URL::asset('img/caritas.png')}}" class="user-image" style="width:50px;height:50px" alt="User Image">
                </div>
                <div class="col-md-12 pull-left" style="margin:5px">
                    <span class="text text-info" id="message-alert"></span>
                </div>
            </div>
        </div>
    </div>
    <div><br></div>
    <div class="footerset" style="margin-bottom:0px">
        <div class="text-center" style="margin-bottom:0px">
            <p  style="font-family: 'Proxima Medium';font-size: 12px; margin-bottom:0px" class="footer-text">© Copyright 2021. All contents cannot be reproduced without the written consent of CARITAS HEALTH SHIELD.<br><br>
            </p>
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
    {!! Html::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
    
    {!! Html::script('vendor/select2/bootstrap-select.js') !!}
    {!! Html::script('vendor/select2/select2.js') !!}

    {!! Html::script('vendor/input-mask/jquery.inputmask.js') !!}
    {!! Html::script('vendor/input-mask/jquery.inputmask.date.extensions.js') !!}
    {!! Html::script('vendor/input-mask/jquery.inputmask.extensions.js') !!}
	<script>
		function alertmessage(N,classname,type) 
        {
            var x = document.getElementById("snackbar");
            x.className = "show col-md-2 alert alert-"+classname;
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
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

        $("#collapse").click(function(){
            if($("#collapse_div").hasClass("in"))
            {
                $("#collapse_div").removeClass('in');
            }
            else
            {
                $("#collapse_div").addClass('in');
            }
        })
        function menu_item(product,plan)
        {
            
        }
    </script>
</body>
</html>
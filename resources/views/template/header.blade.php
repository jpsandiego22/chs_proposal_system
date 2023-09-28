<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/ico" href="{{URL::asset('img/chsi_logo.png')}}">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- <title>{{ $data['title'] or 'CARITAS HEALTH SHIELD' }}</title> -->
	<title> {{$data['page']}} | Caritas Proposal </title>
	<link rel="icon" type="image/ico" href="{{URL::asset('img/chsi_logo.png')}}">
	<!-- Tell the browser to be responsive to screen width -->
	<add http-equiv="X-Frame-Options" content="deny">
    <add name="X-Frame-Options" value="SAMEORIGIN" />
	<!-- Google Fonts -->
	{!! Html::style('css/notification.css') !!}
	{!! Html::style('css/bootstrap.min.css') !!}
	{!! Html::style('css/font-awesome.min.css') !!}
	{!! Html::style('css/owl.carousel.css') !!}
	{!! Html::style('css/style.css') !!}
	{!! Html::style('css/customized.css') !!}
	{!! Html::style('css/responsive.css') !!}
	{!! Html::style('css/loader.css') !!}
	{!! Html::style('toastr/toastr.min.css') !!}
	{!! Html::style('vendor/datatables-plugins/dataTables.bootstrap.css') !!}
	{!! Html::style('vendor/datatables-responsive/dataTables.responsive.css') !!}
	{!! Html::style('css/proxima.css') !!}
	{!! Html::style('css/googleapis.css') !!}
	{!! Html::style('css/proposalcopy.css') !!}
	{!! Html::style('vendor/select2/select2.css') !!}
	{!! Html::style('vendor/select2/select2-bootstrap.css') !!}

	{!! Html::style('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
	
	<style>
		.hidden-xs{display:none!important}
		.open-button 
		{
			background-color: red;
			color: white;
			padding: 10px 10px;
			border: none;
			cursor: pointer;
			/* opacity: 0.8; */
			position: fixed;
			bottom: 0px;
			right: 5px;
			width: 100px;
		}
		/* The popup chat - hidden by default */
		.chat-popup {
			display: none;
			position: fixed;
			bottom: 0;
			right: 5px;
			border: 3px solid #f1f1f1;
			z-index: 9;
		}
		.form-container {
			max-width: 300px;
			padding: 10px;
			background-color: white;
		}
		.company {
			font-size: 72px;
			background: -webkit-linear-gradient(#eee,#043E95, #043E95);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;

		}
		.carousel.slide img {
			width:100%;
			height:auto;
		}
		.footerset {
			position: fixed;
			padding-top:10px;
			width: 100%;
			background-color: #0b1f8d;
			color: white;
			margin-bottom:0px;
			padding-bottom:0px;
			bottom: 0px;
			/* text-align: center;
			text-size: 12; */
			
		}
		.background { 
			background: url('{{URL::asset('img/back.jpg')}}') no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		div.bottom-right {
			background: url({{URL::asset('img/bottom-lining.png')}}) no-repeat center bottom; 
			background-size: 100% 90%;
		}
		div.fixed {
			position: fixed;
			bottom: 0px;
		} 
		/* .carousel-control {
			background-color:transparent;
		} */
		#myOverlay{position:fixed;width:100%;}
		#myOverlay{background:black;opacity:.5;z-index:2;display:none;}
		

		/* windows.load */
		.no-js #loader { display: none;  }
		.js #loader { display: block; position: absolute; left: 100px; top: 0; }
		.se-pre-con {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url('{{URL::asset('img/loader2.gif')}}') center no-repeat #fff;
		}
		.se-pre-con2 {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url('{{URL::asset('img/loader2.gif')}}') center no-repeat #fff;
		}
	
		
	</style>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
	{!! Html::script('js/jquery.min.js') !!}
	<!-- {!! Html::script('js/bootstrap.min.js') !!} -->
	<!-- <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
	{!! Html::script('js/loadImg.js') !!}
	<script>
		//paste this code under the head tag or in a separate js file.
		// Wait for window load
		$(window).load(function() {
			// Animate loader off screen
			$(".se-pre-con").fadeOut("slow");
		});
	</script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" class="background" data-offset="60" style="margin-top:0px;margin-bottom:0px;padding-bottom:0px" width="100%">
	<div class="se-pre-con"></div>	
	
	<div class="wrapper" style="margin-top:0px;margin-bottom:0px;padding-bottom:0px" >
		<span id="myOverlay" style="margin:0px">
		<div class="se-pre-con2"></div>	
		</span>
		<div class="loader-wrap">
			<div class="loader">
			  <div class="loader-inner"></div>
			</div>
		</div>

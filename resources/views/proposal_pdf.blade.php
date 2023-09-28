<html>
    <head>
        <title>{{{{$collect[0]->plan_name}}}} | Caritas Health Shield, Inc.</title>
        <link rel="icon" type="image/ico" href="{{URL::asset('assets/img/caritas.png')}}">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
        {!! Html::style('css/proxima.css') !!}
        <style>
            @page { margin: 0.05in 0.25in 30px; margin-bottom: 50px;}
            
            .page
            {
                width:687px; 
                height:934px;
            }
            .page-break
            {
                page-break-after: always;
            }
           
            .header {
                border-bottom: 1px solid #ddd; 
                padding-bottom:2px;
                margin-bottom: 10px;
                position: relative; /*updated 2017-03-24*/
                height: 40px; /*updated 2017-03-24*/
                border-bottom-color: #000; /*updated 2017-03-24*/
            }
            .footer {
                margin:10px;
                margin-left:5px;
                margin-right:5px;
                position: fixed; 
                bottom: 50px; 
                left: 0px; 
                right: 0px;
                height: 5px;
                /* float: middle; */
                /** Extra personal styles **/
                color: gray;
                text-align: center;
                line-height: 15px;
            }
            .footer_left_img{
                margin:10px;
                margin-left:20px;
                margin-right:5px;
                position: fixed; 
                float: left;
                bottom: 23px; 
                left: 20px; 
                right: 0px;
                height: auto;
                /* z-index:2; */
            }
            .footer_right_img{
                margin:10px;
                margin-left:5px;
                margin-right:20px;
                position: fixed; 
                float: right;
                /* float: bottom; */
                bottom: 26px; 
                left: 0px; 
                right: 20px;
                height: auto;
                /* z-index:2; */
            }
            .logo-caritas {
                width: 50%;
                height:110%;
                position: absolute; /*updated 2017-03-24*/
                top: 0px !important; /*updated 2017-03-24*/
                left: 25%; /*updated 2017-03-24*/
                background-color: #fff;  /*updated 2017-03-24*/
                padding:0 20px; 

                /*border: 2px solid #000;
                border-radius:6px;*/
            }
            .logo{
                width: 35px;
            }	
            .header > p {
                position: absolute;
                top: 25px;
                padding-left: 5px; 
            }
            .xx-small {
                font-size: xx-small !important;
            }
            .footer .page:after { content: counter(page) " of 2";} 

            .w-wo-caritas {
                border:1px solid #000;
                border-radius: 6px;

            }
            /*table for plan description*/

            .title{
                margin-top: 8px;
                margin-bottom: 5px;
                font-size: 16px;
                white-space: nowrap;
            }
            .ol-bold {
                font-weight: bold;
            }
            .table-va-top tr td {
                vertical-align: top;
            }
            
            /*------------------------------*/
            /*table for schedule of benefits*/

            .table-sched > thead > tr > th, 
            .table-sched > tbody > tr > th {
                text-align: right;
                border:0.5px solid black;
                
            }
		    .table-sched > thead > tr > th:first-child, 
            .table-sched > tbody > tr > th:first-child {
                text-align: right;
                border:none;
                padding-right:10px;
            }
            .table-sched > thead > tr:last-child > th {
                border-bottom-width: 5px;
            }
            .table-sched > tbody > tr:first-child > td {
                border-bottom-width: 5px;
            }
            .table-sched > tbody > tr > td {
                text-align: center;
                font-weight: lighter;
            }
            .table-sched > tbody > tr > td,
            .table-sched > tbody > tr > th,
            .table-sched > thead > tr > td,
            .table-sched > thead > tr > th  {
                font-size: 11px;
            }
            .page-2 > .container {
                margin-top: 0.20in !important;
            }
            .container-indent {
                /*background-color: #ddd;*/
                margin: 10px 5px 0;
                text-align: justify;
                text-justify: inter-word;
            }
            .container{
                /*background-color: #ddd;*/
                margin-bottom: 10px;
                /*margin-bottom: 10px;*/
            }
            .container-closing {
                font-size: 15px !important;
            }
        
            .bg-green {
                background: rgb(0,255,0);
            }
            .bg-blue {
                background: rgb(153,204,255);
            }
            .page-2 > .container {
                margin-top: 0.20in !important;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <p><b style="font-size: 12px; padding-bottom:10px">{{$collect[0]->description}} PLAN PROPOSAL </b></p>
            <img src="{{URL::asset('img/proposal/caritas-pdf.png')}}" class="logo-caritas">
        </div>
        <div class="body-style" style="width:100%;text-align: justify;padding-left:5px;font-size: 18px; line-height: 1.2;" >
        
            {{$collect[0]->date_created}}
            <br>
            {{$collect[0]->payor}}
            <br>
            {{$collect[0]->address1}}
            <br>
            {{$collect[0]->address}}
        </div>
        <br>
        <div class="body-style" style="width:100%;text-align: justify;padding-left:5px;font-size: 18px; line-height: 1.2;" >
            <p>Dear @if($collect[0]->gender == 'Male') Sir,@else Madame, @endif <br>
            Thank you for considering Caritas Health Shield to attend to your health insurance needs.<br> 
            Below is the proposed plan package and modes of payment to choose from.</p>
        </div>
        <div class="body-style" style="width:100%;text-align: justify;padding-left:5px;padding-top:20px;font-size: 16px;" >
            <table width="100%">
                <tr>
                    <td width="50%">
                        <img src="{{URL::asset('img/proposal/w-wo-caritas-thin.jpg')}}" class="w-wo-caritas">
                        
                        <p class="title ol-bold">I. PLAN DESCRIPTION</p>

						<table style="border:1px solid black;" width="100%">
                            <tr>
                                <th style="border:1px solid black;padding-left:10px" width="50%">Plan Name</th>
                                <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->plan_name}}</center></td>
                            </tr>
                            <tr>
                                <th style="border:1px solid black;padding-left:10px" width="50%">Policy Type</th>
                                <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->plan_type}}</center></td>
                            </tr>
                            @if($collect[0]->product_type == 1)
                                <tr>
                                    <th style="border:1px solid black;padding-left:10px" width="50%">Name of Kid</th>
                                    <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->kiddie_name}}</center></td>
                                </tr>
                            @endif
                            <tr>
                                <th style="border:1px solid black;padding-left:10px" width="50%">Birthdate</th>
                                <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->date_of_birth}}</center></td>
                            </tr>
                            <tr>
                                <th style="border:1px solid black;padding-left:10px" width="50%">Age</th>
                                <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->age}}</center></td>
                            </tr>
                            <tr>
                                <th style="border:1px solid black;padding-left:10px" width="50%">Member Age Range</th>
                                <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->age_range}}</center></td>
                            </tr>
						</table>
                    </td>
                    <td width="50%" valign="top" style="padding-left:10px">
                        <p class="ol-bold">II. CONTRACT PRICE AND INSTALLMENTS</p>
						<table style="border:1px solid black;" width="100%">
                            <tr>
                                <th style="border:1px solid black;padding:8px" width="60%">CONTRACT PRICE</th>
                                <td style="border:1px solid black;padding:8px" width="40%" align="right">{{$collect[0]->contract_price}}</td>
                            </tr>
                            <tr>
                                <th style="border:1px solid black;padding:8px" width="60%">SPOT CASH</th>
                                <td style="border:1px solid black;padding:8px" width="40%" align="right">{{$collect[0]->spot_cash}}</td>
                            </tr>
                            <tr>
                                <th style="border:1px solid black;padding:8px" width="60%">ANNUAL</th>
                                <td style="border:1px solid black;padding:8px" width="40%" align="right">{{$collect[0]->annual}}</td>
                            </tr>
                            <tr>
                                <th style="border:1px solid black;padding:8px" width="60%">SEMI-NNUAL</th>
                                <td style="border:1px solid black;padding:8px" width="40%" align="right">{{$collect[0]->semi_annual}}</td>
                            </tr>
                            <tr>
                                <th style="border:1px solid black;padding:8px" width="60%">QUARTERLY</th>
                                <td style="border:1px solid black;padding:8px" width="40%" align="right">{{$collect[0]->quarterly}}</td>
                            </tr>
                        </table>
                        <center><small>*Except for Spot Cash, add P200 Policy Fee on first payment.</small></center>
                    </td>
                </tr>
            </table>
            <p class="title ol-bold">III. SCHEDUE OF BENIFITS</p>
            <table width="100%" class=" table-sched" style="font-size: 11px;">
                <tr>
                    <th></th>
                    <th colspan='{{$collect[0]->paying_period}}'><center>Paying Period</center></th>
                    <th colspan='{{$collect[0]->bonus_period}}'><center>Bonus Period</center></th>
                </tr>
                <tr>
                    <th>Policy Year</th>
                    @for ($i=1; $i <= $collect[0]->paying_period  ; $i++) 
                    <th class="bg-blue"><center>{{$i}}</center></th>
                    @endfor
                    @for ($o=0; $o < $collect[0]->bonus_period  ; $o++) 
                    <th class="bg-green"><center>{{$o + $i}}</center></th>
                    @endfor
                   
                </tr>
                <tr>
                    <th>sample's Age</th>
                    @for ($i=1; $i <= $collect[0]->policy_year  ; $i++) 
                        <th><center>{{$collect[0]->age++}}</center></th>
                    @endfor
                </tr>
                <tr>
                    <th>Max. Coverage Per Year</th>
                    @foreach($collect[0]->coverage_roomrate as $row)
                        <th><center>{{$row->max_coverage}}</center></th>
                    @endforeach
                    
                </tr>
                <tr>
                    <th>Max. Daily Room rate</th>
                    @foreach($collect[0]->coverage_roomrate as $row)
                        <th><center>{{$row->room_rate}}</center></th>
                    @endforeach
                </tr>
            </table>
        </div>
        
        <div class="footer">
            <small class="xx-small">
                This proposal is generated on <?php echo "<b>".date('F j, Y')."</b>"; ?><br>
                Rates, Terms and Condition are subject to change depending on the date when this proposal letter was generated.<br>
                page <span class="page"></span>
            </small>
            <br>
            <br>
            <span><img width="100%" height="auto" src="{{URL::asset('img/proposal/footer-for-proposal-system-line.png')}}"></span>        
            <img width="50px" class="footer_left_img" src="{{URL::asset('img/proposal/20years-ribbon.png')}}">
            <img width="50px" class="footer_right_img" src="{{URL::asset('img/proposal/trusted-ribbon.png')}}">
        </div>

        
        <!-- PAGE 2 -->
        <div class="body-style" style="page-break-before: always;width:100%;padding-left:5px;padding-top:20px;margin-left:5px">
            <p class="title ol-bold">IV. HEALTHCARE BENIFITS</p>
            <table width="100%">
                <tr>
                    <td width="37%" style="font-size: 14px;">
                        <b>1.   Medical Expenses Benefits</b> 
                        <br>
                        <b>A.   Hospitalization Benefits (in CARITAS-accredited hospitals)</b> 
                        <br>
                        <div style="padding-left:10px;font-size: 12px;">
                            Room & board
                            <br>
                            
                        </div>
                    </td>
                    <td width="33%">d</td>
                    <td width="30%">s</td>
                </tr>
            </table>
        </div>
    </body>
</html>
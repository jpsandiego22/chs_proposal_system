<html>
    <head>
        <title>{{$collect[0]->page}} | Caritas Health Shield, Inc.</title>
        <link rel="icon" type="image/ico" href="{{URL::asset('assets/img/caritas.png')}}">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> -->
        {!! Html::style('css/sbootstrap.min.css') !!}
        
        <style>
            @font-face {
                font-family: 'Proxima';
                font-style: normal;
                font-weight: normal;
                src:url('../fonts/Proxima Nova Soft Font/FontsFree-Net-Proxima-Nova-Soft-W03-Regular.ttf') format("truetype");
            }
            @font-face {
                font-family: 'Proxima Bold';
                font-style: normal;
                font-weight: normal;
                src:url('../fonts/Proxima Nova Soft Font/FontsFree-Net-Proxima-Nova-Soft-W03-Semibold.ttf') format("truetype");
            }
            .proxima{
                font-family: 'Proxima';
                
            }
            .tbproxima{
                font-family: 'Proxima Bold';
                font-size: 16px;
            }
            .mbproxima{
                font-family: 'Proxima Bold';
                font-size: 11px;
                line-height: 0.8;
            }
            .lmbproxima{
                font-family: 'Proxima Bold';
                font-size: 13px;
                line-height: 0.8;
            }
            .cbproxima{
                font-family: 'Proxima Bold';
            }
            .cbproxima_with_h{
                font-family: 'Proxima Bold';
                line-height: 0.8;
            }
            @page { margin: 0.05in 0.25in 30px; margin-bottom: 50px;}
            
            .page
            {
                width:687px; 
                height:934px;
            }
            /* .page-break
            {
                page-break-after: always;
            } */
            .bg-green {
                background: rgb(0,255,0);
            }
            .bg-blue {
                background: rgb(153,204,255);
            }
            .page:after { content: counter(page) " of 2";} 
            .footer {
                margin:10px;
                margin-left:5px;
                margin-right:5px;
                position: fixed; 
                bottom: 10px; 
                left: 0px; 
                right: 0px;
                height: 5px;
                /* float: middle; */
                /** Extra personal styles **/
                color: gray;
                text-align: center;
                line-height: 15px;
            }
            .title{
                margin-top: 8px;
                margin-bottom: 5px;
                font-size: 16px;
                white-space: nowrap;
                font-family: 'Proxima';
            }
            .ol-bold {
                font-weight: bold;
                font-family: 'Proxima';
            }
            .keep_right{
                position: fixed; 
                bottom: 10px; 
                right: 10px; 
                text-align: right;
                padding-right:50px;
            }
        </style>
    </head>
    <body class="proxima">
        <div style="border-bottom:1px solid black;padding-bottom:1px">
            <table width="100%">
                <tr>
                    <td class="proxima" width="40%" valign="bottom">
                        <font style="font-size: 12px;">{{$collect[0]->description}} PLAN PROPOSAL</font>
                    </td>
                    <td width="60%">
                        <img src="{{URL::asset('img/header_pdf.jpg')}}" style="height:40px;width:auto">
                    </td>
                </tr>   
            </table>
        </div>
        <div style="padding:1px">
            <p style="font-size: 12px;line-height: 0.8;">
                {{$collect[0]->date_created}}
                <br>
                {{$collect[0]->payor}}
                <br>
                {{$collect[0]->address1}}
                <br>
                {{$collect[0]->address}}
            </p>
            <p style="font-size: 12px;">
                Dear @if($collect[0]->gender == 'Male') Sir,@else Madame, @endif 
            <p>
            <p style="font-size: 12px;line-height: 0.8;">
                @if($collect[0]->product_type == 1)
                    Thank you for considering Caritas Health Shield to attend to {{$collect[0]->kiddie_name}}'s health care needs.<br> 
                    Below are the proposed plan package and modes of payment for you to choose from.
                @else 
                    Thank you for considering Caritas Health Shield to attend to your health care needs.<br> 
                    Below are the proposed plan package and modes of payment for you to choose from.
                @endif 
            </p>
        </div>
        <br>
        <table width="100%">
            <tr>
                <td width="50%" valign="top" style="padding-right:20px">
                
                    <div style="margin-top:20px;">
                        <img src="{{URL::asset('img/proposal/Mission-Vision-571x136.png')}}" style="width:360;" alt="Italian Trulli">
                    </div>
                    <div style="padding:1px">
                        <p class="tbproxima" style="padding-bottom:1px;margin-bottom:1px">
                            I. PLAN DESCRIPTION
                        </p>
                        <table style="border:1px solid black;" width="100%">
                            <tr>
                                <td class="cbproxima" style="border:1px solid black;padding-left:10px" width="50%">
                                    <span class="cbproxima">Plan Name</span>
                                </td>
                                <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->plan_name}}</center></td>
                            </tr>
                            <tr>
                                <td class="cbproxima" style="border:1px solid black;padding-left:10px" width="50%">
                                    Policy Type
                                </td>
                                <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->plan_type}}</center></td>
                            </tr>
                            @if($collect[0]->product_type == 1)
                            <tr class="cbproxima">
                                <td class="cbproxima" style="border:1px solid black;padding-left:10px" width="50%">
                                    Child's Name
                                </td>
                                <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->kiddie_name}}</center></td>
                            </tr>
                            @endif
                            <tr>
                                <td class="cbproxima" style="border:1px solid black;padding-left:10px" width="50%">
                                    Birthdate
                                </td>
                                <td style="border:1px solid black;" width="50%">
                                    <center>
                                        <table width="100%">
                                            <tr>
                                                <td style="border-right:1px solid black" width="35%">
                                                    <center>{{$collect[0]->p_month}} </center>
                                                </td>
                                                <td width="30%">
                                                    <center>{{$collect[0]->p_day}} </center>
                                                </td>
                                                <td style="border-left:1px solid black" width="35%">
                                                    <center>{{$collect[0]->p_year}} </center>
                                                </td>
                                            </tr>
                                        </table>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td  class="cbproxima" style="border:1px solid black;padding-left:10px" width="50%">Age</td>
                                @if($collect[0]->product_type == 1)
                                    <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->kiddie_age}}</center></td>
                                @else
                                    <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->age}}</center></td>
                                @endif
                            </tr>
                            <tr>
                                @if($collect[0]->product_type == 1)
                                    <td class="cbproxima" style="border:1px solid black;padding-left:10px" width="50%">Member's Age Range</td>
                                @else
                                    <td class="cbproxima" style="border:1px solid black;padding-left:10px" width="50%">Age Range</td>
                                @endif
                                <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->age_range}}</center></td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td width="50%" valign="top" style="padding-left:10px;padding-right:30px">
                    <div style="padding:1px">
                        <p class="tbproxima" style="padding-top:10px;padding-bottom:1px;margin-bottom:1px">
                            II. CONTRACT PRICE & INSTALLMENTS
                        </p>
                        <table style="border:1px solid black;" width="100%">
                            <tr>
                                <td  class="cbproxima" style="border:1px solid black;padding:8px" width="60%">CONTRACT PRICE</td>
                                <td style="border:1px solid black;padding:8px" width="40%" align="right">{{$collect[0]->contract_price}}</td>
                            </tr>
                            <tr>
                                <td  class="cbproxima" style="border:1px solid black;padding:8px" width="60%">SPOT CASH</td>
                                <td style="border:1px solid black;padding:8px" width="40%" align="right">{{$collect[0]->spot_cash}}</td>
                            </tr>
                            <tr>
                                <td  class="cbproxima" colspan="2" style="border:1px solid black;padding:8px;background-color:#C8C7CB"></td>
                            </tr>
                            <tr>
                                <td  class="cbproxima" style="border:1px solid black;padding:8px" width="60%">ANNUAL</td>
                                <td style="border:1px solid black;padding:8px" width="40%" align="right">{{$collect[0]->annual}}</td>
                            </tr>
                            <tr>
                                <td  class="cbproxima" style="border:1px solid black;padding:8px" width="60%">SEMI-ANNUAL</td>
                                <td style="border:1px solid black;padding:8px" width="40%" align="right">{{$collect[0]->semi_annual}}</td>
                            </tr>
                            <tr>
                                <td  class="cbproxima" style="border:1px solid black;padding:8px" width="60%">QUARTERLY</td>
                                <td style="border:1px solid black;padding:8px" width="40%" align="right">{{$collect[0]->quarterly}}</td>
                            </tr>
                            @if($collect[0]->monthly != 'null')
                            <tr>
                                <td  class="cbproxima" style="border:1px solid black;padding:8px" width="60%">MONTHLY</td>
                                <td style="border:1px solid black;padding:8px" width="40%" align="right">{{$collect[0]->monthly}}</td>
                            </tr>
                            @endif
                        </table>
                        <center><small>*Except for Spot Cash, add P200.00 Policy Fee on the first payment.</small></center>
                    </div>
                </td>
            </tr>
        </table>
        <p class="tbproxima" style="padding-top:3px;padding-bottom:1px;margin-bottom:1px">
            III. SCHEDULE OF BENEFITS
        </p>
        <table width="100%" class=" table-sched" style="font-size: 11px;">
            <tr>
                <th></th>
                <td class="cbproxima" style="border:1px solid black;" colspan='{{$collect[0]->paying_period}}'><center>Paying Period</center></td>
                <td class="cbproxima" style="border:1px solid black;" colspan='{{$collect[0]->bonus_period}}'><center>Bonus Period</center></td>
            </tr>
            <tr>
                <td class="cbproxima">Policy Year</td>
                @for ($i=1; $i <= $collect[0]->paying_period  ; $i++) 
                <td class="bg-blue" style="border:1px solid black;"><center>{{$i}}</center></td>
                @endfor
                @for ($o=0; $o < $collect[0]->bonus_period  ; $o++) 
                <td class="bg-green" style="border:1px solid black;"><center>{{$o + $i}}</center></td>
                @endfor
            </tr>
            <tr>
                <td class="cbproxima" style="line-height: 0.8;">
                    @if($collect[0]->product_type == 1)
                        {{$collect[0]->kiddie_name}}'s Age
                    @else
                        {{str_replace('Ms.','',str_replace('Mr.','',$collect[0]->payor))}}'s Age
                    @endif
                </td>
                @for ($i=1; $i <= $collect[0]->policy_year  ; $i++) 
                    <td style="border:1px solid black;"><center>{{$collect[0]->age++}}</center></td>
                @endfor
            </tr>
            <tr>
                <td></td>
                <td class="cbproxima" colspan='{{$collect[0]->policy_year}}' style="border:1px solid black;padding:2px;background-color:#C8C7CB"></td>
            </tr>
            <tr>
                <td class="cbproxima">Max. Coverage Per Year</td>
                @foreach($collect[0]->coverage_roomrate as $row)
                    <td style="border:1px solid black;"><center>{{$row->max_coverage}}</center></td>
                @endforeach
            </tr>
            <tr>
                <th></th>
                <td colspan='{{$collect[0]->policy_year}}' style="border:1px solid black;padding:2px;background-color:#C8C7CB"></td>
            </tr>
            <tr>
                <td class="cbproxima">Max. Daily Room Rate</td>
                @foreach($collect[0]->coverage_roomrate as $row)
                    <td style="border:1px solid black;"><center>{{$row->room_rate}}</center></td>
                @endforeach
            </tr>
        </table>
        <div class="footer">
            <p class="title ol-bold"><center><span id="page" class="page"></span></center></p>
            <table width="100%" class=" table-sched" style="font-size: 11px;">
                <tr>
                    <td valign="middle" width="100%" class="bg-blue">
                        <font color="black">
                            <center>
                                <img src="{{URL::asset('img/proposal/internet.png')}}" style="margin-top:2px" width="10px" height="auto">&nbsp;
                                caritashealthshield.com.ph 
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <img src="{{URL::asset('img/proposal/fb.png')}}" style="margin-top:2px" width="10px" height="auto">&nbsp;
                                @caritashealthshieldhmo
                            </center>
                        </font>
                    </td>
                </tr>
            </table>
        </div>
        <div style="page-break-before: always;width:100%;padding-left:5px;padding-top:1px;margin-left:5px">
            <p class="tbproxima" style="margin-bottom:1px">IV. HEALTH CARE BENEFITS</p>
            @if($collect[0]->product_type == 0)
                @if($collect[0]->product_iid == 11)
                    @include("health_care_benefits.u_core10")
                @else
                    @include("health_care_benefits.core")
                @endif
            @else
                @include("health_care_benefits.kiddie")
            @endif
        </div>
    </body>
</html>

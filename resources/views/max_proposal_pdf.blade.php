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
                line-height: 0.8;
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
            .bg-yellow {
                background: #DAB708;
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
            .benefits_left{
                border: 1px solid black;
                border-right:none;
                padding-left:5px;
            }
            .benefits_right{
                border: 1px solid black;
                border-left:none;
                padding-right:5px;
            }
            .benefits_l_left{
                border-left: 1px solid black;
                border-right:none;
                padding-left:5px;
            }
            .benefits_lr_left{
                border-left: 1px solid black;
                border-right: 1px solid black;
                /* border-right:none; */
                padding-left:5px;
            }
            .benefits_lrt_left{
                border-left: 1px solid black;
                border-right: 1px solid black;
                border-top: 1px solid black;
                /* border-right:none; */
                padding-left:5px;
            }
            .benefits_r_left{
                border-right: 1px solid black;
                border-left:none;
                padding-right:5px;
            }
            .benefits_rt_left{
                border-right: 1px solid black;
                border-top: 1px solid black;
                border-left:none;
                padding-right:5px;
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
            <!-- <p style="font-size: 12px;">
               
            <p> -->
            <p style="font-size: 12px;line-height: 0.8;">
                Dear @if($collect[0]->gender == 'Male') Sir,@else Madame, @endif <br>
                Thank you for considering Caritas Health Shield to attend to your health care needs.<br> 
                Below are the proposed plan package and modes of payment for you to choose from.
            </p>
        </div>
        <table width="100%">
            <tr>
                <td width="50%" valign="top" style="padding-right:20px;vertical-align: top;" >
                    <div style="margin-top:5px;margin-bottom:2px">
                        <img src="{{URL::asset('img/proposal/Mission-Vision-571x136.png')}}" style="width:360;" alt="Italian Trulli">
                    </div>
                    <div style="padding:1px">
                        <p class="tbproxima" style="padding-bottom:1px;margin-bottom:1px;">
                            I. PLAN DESCRIPTION
                        </p>
                        <table style="border:1px solid black;" width="100%">
                            <tr>
                                <td class="cbproxima" style="border:1px solid black;padding-left:10px;" width="50%">
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
                                <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->age}}</center></td>
                            </tr>
                            <tr>
                                <td class="cbproxima" style="border:1px solid black;padding-left:10px" width="50%">Member's Age Range</td>
                                <td style="border:1px solid black;" width="50%"><center>{{$collect[0]->age_range}}</center></td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td width="50%" valign="top" style="padding-left:10px;padding-right:30px;valign: top;">
                    <div style="padding:1px">
                        <p class="tbproxima" style="padding-top:0px;padding-bottom:1px;margin-bottom:1px">
                            II. CONTRACT PRICE & INSTALLMENTS
                        </p>
                        <table style="border:1px solid black;" width="100%">
                            <tr>
                                <td  class="cbproxima" style="border:1px solid black;padding:5px" width="60%">CONTRACT PRICE</td>
                                <td style="border:1px solid black;padding:5px" width="40%" align="right">{{$collect[0]->contract_price}}</td>
                            </tr>
                            <tr>
                                <td  class="cbproxima" style="border:1px solid black;padding:5px" width="60%">SPOT CASH</td>
                                <td style="border:1px solid black;padding:5px" width="40%" align="right">{{$collect[0]->spot_cash}}</td>
                            </tr>
                            <tr>
                                <td  class="cbproxima" colspan="2" style="border:1px solid black;padding:7px;background-color:#6E6D6B"></td>
                            </tr>
                            <tr>
                                <td  class="cbproxima" style="border:1px solid black;padding:5px" width="60%">ANNUAL</td>
                                <td style="border:1px solid black;padding:5px" width="40%" align="right">{{$collect[0]->annual}}</td>
                            </tr>
                            <tr>
                                <td  class="cbproxima" style="border:1px solid black;padding:5px" width="60%">SEMI-ANNUAL</td>
                                <td style="border:1px solid black;padding:5px" width="40%" align="right">{{$collect[0]->semi_annual}}</td>
                            </tr>
                            <tr>
                                <td  class="cbproxima" style="border:1px solid black;padding:5px" width="60%">QUARTERLY</td>
                                <td style="border:1px solid black;padding:5px" width="40%" align="right">{{$collect[0]->quarterly}}</td>
                            </tr>
                        </table>
                        <center><small>*Except for Spot Cash, add P200.00 Policy Fee on the first payment.</small></center>
                    </div>
                </td>
            </tr>
        </table>
        <p class="tbproxima" style="padding-bottom:1px;margin-bottom:1px;">
            III. SCHEDULE OF BENEFITS
        </p>
        <table width="100%" class=" table-sched" style="font-size: 11px;">
            <tr>
                <th></th>
                <td class="cbproxima" style="border:1px solid black;" colspan='{{$collect[0]->paying_period}}'><center>Paying Period</center></td>
                <td class="cbproxima" style="border:1px solid black;" colspan='{{$collect[0]->bonus_period}}'><center>Bonus Period</center></td>
            </tr>
            <tr>
                <td class="cbproxima" align="right"  style="padding-right:3px">Policy Year</td>
                @for ($i=1; $i <= $collect[0]->paying_period  ; $i++) 
                <td class="bg-blue" style="border:1px solid black;"><b><center>{{$i}}</center></b></td>
                @endfor
                @for ($o=0; $o < $collect[0]->bonus_period  ; $o++) 
                <td class="bg-green" style="border:1px solid black;"><b><center>{{$o + $i}}</center></b></td>
                @endfor
            </tr>
            <tr>
                <td class="cbproxima" style="line-height: 0.8;padding-right:3px"  align="right">
                    <!-- {{str_replace('Ms.','',str_replace('Mr.','',$collect[0]->payor))}}'s Age -->
                    Member's Age
                </td>
                @for ($i=1; $i <= $collect[0]->policy_year  ; $i++) 
                    <td style="border:1px solid black;"><b><center>{{$collect[0]->age++}}</center></b></td>
                @endfor
            </tr>
            <tr>
                <td></td>
                <td class="cbproxima" colspan='{{$collect[0]->policy_year}}' style="border:1px solid black;padding:2px;background-color:#C8C7CB"></td>
            </tr>
            <tr>
                <td class="cbproxima" align="right" style="padding-right:3px" nowrap>Max. Coverage Per Illness/Per year</td>
                <?php 
                    $paying_period = 0;
                    $bonus_period = 0;
                    $p = 0;
                ?>
                @foreach($collect[0]->coverage_roomrate as $row)
                    @if($p >= 0 && $p <= 4)
                        <?php $paying_period = $paying_period + $row->max_coverage1; ?>
                    @elseif($p >= 5 && $p <= 10)
                        <?php $bonus_period = $bonus_period + $row->max_coverage1; ?>
                    @endif
                    <td style="border:1px solid black;padding:0px" align='center'>{{number_format(str_replace(',','',$row->max_coverage))}}</td>
                    <?php $last_coverage = $row->max_coverage; $p++;?>

                @endforeach
            </tr>
            <tr>
                <th></th>
                <td colspan='{{$collect[0]->policy_year}}' style="border:1px solid black;padding:2px;background-color:#C8C7CB"></td>
            </tr>
            <tr>
                <td class="cbproxima" align="right" style="padding-right:3px">Max. Daily Room Rate</td>
                @foreach($collect[0]->coverage_roomrate as $row)
                    <td style="border:1px solid black;"><center>{{number_format(str_replace(',','',$row->room_rate))}}</center></td>
                @endforeach
            </tr>
            <!-- <tr>
                <td></td>
                <td class="cbproxima" colspan='{{$collect[0]->policy_year}}' style="border:1px solid black;padding:2px;background-color:#C8C7CB"></td>
            </tr> -->
            <!-- Maximized Period -->
            <tr>
                <th></th>
                <td class="cbproxima" colspan='{{$collect[0]->policy_year}}' style="padding-top:3px"></td>
            </tr>
            <tr>
                <th></th>
                <td class="cbproxima" colspan='{{$collect[0]->policy_year}}' style="border:1px solid black;"><center>Maximized Period</center></td>
            </tr>
            <tr>
                <td class="cbproxima" style="line-height: 0.8;padding-right:3px"  align="right">
                    Policy Year
                </td>
                @for ($i= $collect[0]->policy_year + 1; $i <=20   ; $i++) 
                    <td class="bg-yellow" style="border:1px solid black;"><b><center>{{$i}}</center></b></td>
                @endfor
            <tr>
                <td class="cbproxima" style="line-height: 0.8;padding-right:3px"  align="right">
                     <!-- {{str_replace('Ms.','',str_replace('Mr.','',$collect[0]->payor))}}'s Age -->
                     Member's Age
                </td>
                @for ($i=1; $i <= $collect[0]->policy_year  ; $i++) 
                    <td style="border:1px solid black;"><b><center>{{$collect[0]->age++}}</center></b></td>
                @endfor
            </tr>
            <tr>
                <th></th>
                <td colspan='{{$collect[0]->policy_year}}' style="border:1px solid black;padding:2px;background-color:#C8C7CB"></td>
            </tr>
            <tr>
                <td class="cbproxima" style="line-height: 1.1;padding-right:3px"  align="right">
                    Medical Benefit Fund
                </td>
                <?php 
                    $last_coverage = doubleval(str_replace(",", "", $last_coverage));
                    $total = $last_coverage; 
                ?>
                @for ($i=1; $i <= $collect[0]->policy_year  ; $i++) 
                    @if($i == 1)
                        <td style="border:1px solid black;line-height: 1.1;vertical-align: top;"><center>{{number_format(round($last_coverage),0)}}</center></td>
                    @else
                        <?php 
                            $last_coverage = ($total * (0.02)) + $last_coverage;
                            $total = $last_coverage;
                        ?>
                        <td style="border:1px solid black;line-height: 1.1;vertical-align: top;"><center>{{number_format(round($total),0)}}</center></td>
                    @endif
                @endfor
            </tr>
            <tr>
                <th></th>
                <td colspan='{{$collect[0]->policy_year}}' style="border:1px solid black;padding:2px;background-color:#C8C7CB"></td>
            </tr>
            <tr>
                <th></th>
                <td class="cbproxima " colspan='{{$collect[0]->policy_year}}' style="border:1px solid black;line-height: 1.1;font-size: 13px;"> 
                    <center>
                        Member's Choice of Room
                    </center>
                </td>
            </tr>
            <tr>
                <th></th>
                <td class="" colspan='{{$collect[0]->policy_year}}' style="line-height: 0.8;padding-top:5px"> 
                    <center>
                        <i>In case the MBF is exhausted, Caritas shall no longer be liable and the Member shall be responsible for all excess charges.<br>
                        This agreement shall then be considered terminated and all obligations of CARITAS deemed fully complied with.( Art VI.2.a.2 )</i>
                    </center>
                </td>
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
        <div style="page-break-before: always;width:100%;padding-left:5px;padding-top:10px;margin-left:5px">

            <p class="tbproxima" style="margin-bottom:1px">IV. HEALTH CARE BENEFITS</p>
            @if($collect[0]->product_type == 0)
                @include("health_care_benefits.max")
            @endif
        </div>
    </body>
</html>

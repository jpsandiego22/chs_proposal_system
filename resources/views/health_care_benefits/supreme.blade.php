
<table width="100%" style="font-size: 11px;font-family: Arial, Helvetica, sans-serif;" class="we">
    <tr>
        <td width="45%" valign="top" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">1. Medical Expense Benefits (MEB)</p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">A. Hospitalization Benefits (in CARITAS-accredited hospitals)</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Room and board<br>
                Services of an accredited physician or specialist<br>
                Laboratory tests, X-rays, and other indicated diagnostics<br>
                Use of surgical or medical equipment and facilities,<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;namely operating and recovery room, <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Intensive Care Unit, etc. <br>
                Administration of anesthesia and/or oxygen<br>
                Transfusion of hospital-provided blood products<br>
                Dressing, plaster of Paris, and other medical supplies<br>
                Prescribed drugs and other medication used during confinement
            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">B. Emergency Care <span>(Notify Caritas within 24 hours)</span></p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">C. Special Therapeutic and Surgical Procedures</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Chemotherapy/Radiotherapy<br>
                Hemodialysis<br>
                Cataract extraction<br>
                Outpatient major surgery<br>
                Minor surgery (not requiring hospital or similar facilities)<br>
                Extracorporeal Shock Wave Lithotripsy (ESWL)<br>
                Other outpatient special therapeutic procedures deemed appropriate<br>
                by CARITAS

            </p>
            <br>
        </td>
        <td style="padding-left:10px;padding-right:10px" width="55%" valign="top">
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">2. Membership Privileges (MP)</p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">A. Annual Physical Examination (APE)</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Taking of medical history<br>
                Medical examination<br>
                Chest X-ray (PA)<br>
                Complete Blood Count (CBC)<br>
                Fasting Blood Sugar (FBS)<br>
                Urinalysis and Fecalysis<br>
                Electrocardiogram (for 35 y.o. and above)<br>
                Pap Smear (for 35 y.o. and above)
            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">B. Tucked in Benefits</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Medical Benefit Fund increase of 1% or 2%<br>
                Convalescence Fund<br>
                Transferable<br>
                Assignable
            </p>
            <br>
            @if($collect[0]->insurance_coverability == 0)
                <p class="lmbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">V. INSURANCE BENEFITS</p>
                <p class="cbproxima_with_h" style="font-size: 12px;line-height: 1;padding-left:10px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:10px">
                    A. Credit Life<br>
                    B. Waiver of Installment due to Disability<br>
                    C. Term Life<br>
                    D. Accidental Death<br>
                    E. Memorial Assistance Advantage<br>
                </p>
            @endif
        </td>
    </tr>
</table>
<table width="100%" style="font-size: 11px;font-family: Arial, Helvetica, sans-serif;" class="we">
    <tr>
        <td width="34%" valign="top" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
            <table width="100%">
                <tr>
                    <td style="border:1px solid black" colspan="2" align="center">
                        <b>{{str_replace('Ms.','',str_replace('Mr.','',$collect[0]->payor))}}'s Benefits</b>
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black;padding-left:5px;" colspan="2" align="left">
                        <b>Medical Expense Benefit</b>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_left" align="left" width="70%">
                        Medical Expense Benefit
                    </td>
                    <td class="benefits_right" align="right" width="30%">
                        {{number_format(round($total),0)}}
                    </td>
                </tr>
                <tr>
                    <td class="benefits_left" align="left" width="70%">
                        Paying Period Coverage
                    </td>
                    <td class="benefits_right" align="right" width="30%">
                        {{number_format($paying_period,0)}}
                    </td>
                </tr>
                <tr>
                    <td class="benefits_left" align="left" width="70%">
                        Bonus Period Coverage
                    </td>
                    <td class="benefits_right" align="right" width="30%">
                        {{number_format($bonus_period,0)}}
                    </td>
                </tr>
                <tr>
                    <td class="benefits_left" align="left" width="70%">
                        <b>Total Medical Expense Benefit</b>
                    </td>
                    <td class="benefits_right" align="right" width="30%">
                        <b>{{number_format($paying_period + $bonus_period + $total,0)}}</b>
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black;padding-left:5px;" colspan="2" align="left">
                        <b>Membership Privileges</b>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_left" align="left" width="70%">
                        Annual Physical Exam
                    </td>
                    <td class="benefits_right" align="right" width="30%">
                        {{$collect[0]->membership_previleges[0]['ape-up']}}
                    </td>
                </tr>
                <tr>
                    <td class="benefits_left" align="left" width="70%">
                        <b>Total Membership Privileges for 10 years</b>
                    </td>
                    <td class="benefits_right" align="right" width="30%">
                        <b>{{$collect[0]->membership_previleges[0]['total_mp']}}</b>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_left" align="left" width="70%">
                        <b>Total Benefits for 20 years</b>
                    </td>
                    <td class="benefits_right" align="right" width="30%">
                        <b>{{number_format($paying_period + $bonus_period + $total + str_replace(',','',$collect[0]->membership_previleges[0]['total_mp']),0)}}</b>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_left" align="left" width="70%">
                        <b>All for a Total Contract Price of </b>
                    </td>
                    <td class="benefits_right" align="right" width="30%">
                        <b>{{number_format(str_replace(',','',$collect[0]->contract_price),0)}}</b>
                    </td>
                </tr>
            </table>
        </td>
        <td width="34%" valign="top" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
            
            <div style="padding:2px;margin:50px 10px 5px 10px;border:1px solid black;">
                <p class="mbproxima" style="padding-left:10px;padding-right:10px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">24-Hour Medical Hotline Numbers</p>
                <p style="font-size: 12px;line-height: 1.1;padding-left:10px;padding-right:10px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                    Landline: 8868-7000<br>
                    Mobile Nos.:<br>
                    0969-5881623 / 0945-3694180 / 0945-3687305<br>
                    0956-0895230 / 0945-3693891 / 0945-3694120<br>
                    0945-3693942 / 0945-3694140 / 0945-3693945<br>
                    0917-3103327 / 0917-5081023 / 0917-8563401
                </p>
            </div>
        </td>
        <td width="32%" valign="top" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
            <div id="hc" style="padding:2px;;margin-top:50px;border:1px solid black">
                <p class="mbproxima" style="padding-left:10px;padding-right:10px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">Sincerely,</p>
                <br>
                <div style="margin:auto;width:80%;border-bottom:1px solid black">
            
                </div>
                <div style="margin:auto;width:80%;">
                    <p style="font-size: 14px;line-height: 1.1;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                        {{$collect[0]->hc_name}}
                        <br>
                        {{$collect[0]->hc_designation}}
                        <br>
                        {{$collect[0]->hc_contact}}
                        <br>
                        {{$collect[0]->hc_branch}}
                    </p>
                </div>
            </div>
        </td>
    </tr>
</table>

<center>
    <p style="font-size: 11px; color:black">
        <i>
            This proposal is generated on {{date("F d, Y")}}.
            <br>
            The Rates, Terms and Conditions are subject to change 
            depending on the date when this proposal letter was generated.
        </i>
        <br>
        <br>
        <span class="keep_right">{{$collect[0]->version}}</span>
    </p>
</center>
<table width="100%" style="font-size: 11px;margin-top:1px;margin-bottom:1px">
    <tr>
        <td width="34%" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">1. Medical Expense Benefits (MEB)</p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">A. Hospitalization Benefits<br>&nbsp;&nbsp;&nbsp;&nbsp;(in CARITAS-accredited hospitals)</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Room and board<br>
                Services of an accredited physician or specialist<br>
                Laboratory tests, X-rays and other indicated diagnostics<br>
                Use of surgical or medical equipment and facilities,<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;namely operating and recovery room, <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Intensive Care Unit, etc. <br>
                Administration of anesthesia and/or oxygen<br>
                Transfusion of hospital-provided blood products<br>
                Dressing, plaster of Paris, and other medical supplies<br>
                Prescribed drugs and other medication used during confinement

            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">B. MEB Outpatient Services</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Treatment of minor injury or illness<br>
                Minor surgery (not requiring hospital facilities)<br>
                Eye, ear, nose, and throat treatment<br>
                Circumcision (for male) and ear piercing (for female)

            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">C. Emergency Care <span>(Notify Caritas within 24 hours)</span></p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">D. Special Diagnostics & Laboratory Procedures</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                X-ray<br>
                Computed Tomography (CT) Scan<br>
                2D Echocardiography with Doppler<br>
                Ultrasound<br>
                Magnetic Resonance Imaging (MRI)<br>
                Electromyelography (EMG)<br>
                Other procedures deemed appropriate by CARITAS

            </p>
            <table width="100%" style="font-size: 11px;">
                <tr>
                    <td style="border:1px solid black" colspan="2" align="center">
                        <b>@if($collect[0]->product_type == 1)
                            {{$collect[0]->kiddie_name}}
                        @else
                            {{str_replace('Ms.','',str_replace('Mr.','',$collect[0]->payor))}}
                        @endif
                        's Benefits</b>
                    </td>
                </tr>
                <tr>
                    <td align="left" style="border:1px solid black;padding-left:2px;margin-top:1px" width="70%">
                        Medical Expense Benefits for {{$collect[0]->policy_year}} years    
                    </td>
                    <td align="right" style="border:1px solid black;" width="30%">
                        <b>{{$collect[0]->max_coverage_per_year}} </b> 
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black;padding-left:2px;" width="70%" >
                        Membership Privileges
                    </td>
                    <td style="border-left:1px solid black;border-right:1px solid black" width="30%">
                    
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black;padding-left:5px;" width="70%">
                        Consultations
                    </td>
                    <td align="right" style="border-left:1px solid black;border-right:1px solid black;" width="30%">
                        <b><i>{{$collect[0]->membership_previleges[0]['consultation']}}</i></b>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black;padding-left:5px;" width="70%">
                            Annual Well Kiddie Check-Up
                    </td>
                    <td align="right" style="border-left:1px solid black;border-right:1px solid black" width="30%">
                        <b><i>{{$collect[0]->membership_previleges[0]['annual_well_kiddie_check-up']}}</i></b>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black;padding-left:5px;" width="70%">
                            Dental Care
                    </td>
                    <td align="right" style="border-left:1px solid black;border-right:1px solid black" width="30%">
                            <b><i>{{$collect[0]->membership_previleges[0]['dental_care']}}</i></b>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black;padding-left:5px;" width="70%">
                            Immunization Injection Fee and Consultation
                    </td>
                    <td align="right" style="border-left:1px solid black;border-right:1px solid black" width="30%">
                        <b><i>{{$collect[0]->membership_previleges[0]['immunization']}}</i></b>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black;padding-left:2px;padding-top:0px" width="70%">
                            Total Membership Privileges for {{$collect[0]->policy_year}} years
                    </td>
                    <td align="right" style="font-size: 12px;border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;padding-top:0px" width="30%">
                            <b>{{$collect[0]->membership_previleges[0]['total_mp']}}</b>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;padding-left:2px;" width="70%">
                        Total Benefits for {{$collect[0]->policy_year}} years
                    </td>
                    <td align="right" style="font-size: 12px;border-left:1px solid black;border:1px solid black;border-top:2px solid black;" width="30%">
                        <b>{{$collect[0]->total_benefits}}</b>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;padding-left:2px" width="70%">
                        All for a Total Contract Price of only
                    </td>
                    <td align="right" style="border-left:1px solid black;border:1px solid black;" width="30%">
                        <b><i>{{$collect[0]->contract_price}}</i></b>
                    </td>
                </tr>
            </table>
        </td>
        <td style="padding-left:20px;padding-right:10px" width="34%" valign="top">
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">2. Membership Privileges (MP)</p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">A. MP Outpatient Services</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Up to twelve (12) consultations per year<br>
            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">B. Annual Well Kiddie Check-Up</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Taking of medical history<br>
                Medical examination<br>
                Growth assessment<br>
                Nutritional assessment<br>
                Developmental milestone assessment
            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">C. Preventive Health Care</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Periodic monitoring of health problems<br>
                Consultation on diet, exercise, and other healthful habits<br>
                Immunization excluding cost of drugs or vaccines
            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">D. Dental Care (excluding procedures <br>
            &nbsp;&nbsp;&nbsp;&nbsp;requiring inhalational or intravenous <br>
            &nbsp;&nbsp;&nbsp;&nbsp;anesthesia/general anesthesia)</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Up to four (4) consultations per year<br>
                Annual oral prophylaxis, (after at least three (3) months <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;from the date of effectivity of this agreement)<br>
                Tooth extraction, up to four (4) times per year<br>
                Temporary filling or recementation, up to four (4) times<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;per year <br>
                Treatment of oral pain, lesions, wounds and burns
            </p>
            <br>
            <div style="padding:2px;border:1px solid black">
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
        <td style="padding-left:20px;padding-right:10px" width="32%" valign="top">
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">E. Other Services</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:60px">
                Twenty-four  (24) hour/seven (7) days a week <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;telephone assistance <br>
                Discounts on non-covered health services at<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;selected hospitals, clinics, and laboratories 

            </p>
            <br>
            @if($collect[0]->insurance_coverability == 0)
            <p class="lmbproxima" style="padding-top:1px;padding-left:40px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">V. INSURANCE BENEFITS</p>
            <p class="cbproxima_with_h" style="font-size: 12px;line-height: 1.1;padding-left:50px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:20%">
                1. Credit Life<br>
                2. Waiver of Installment due to <br>
                &nbsp;&nbsp;&nbsp;&nbsp;Disability<br>
            </p>
            @endif
            <div id="hc" style="padding:2px;border:1px solid black">
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
<br>
<center>
    <p style="font-size: 11px; color:black;line-height: 0.8;">
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
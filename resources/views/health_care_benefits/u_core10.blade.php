<table width="100%" style="font-size: 11px;font-family: Arial, Helvetica, sans-serif;" class="we">
    <tr>
        <td width="34%" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">1. Medical Expense Benefits (MEB)</p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">A. Hospitalization Benefits<br>&nbsp;&nbsp;&nbsp;&nbsp;(in CARITAS-accredited hospitals)</p>
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
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">B. MEB Outpatient Services</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Treatment of minor injury or illness<br>
                Minor surgery (not requiring hospital facilities)<br>
                Eye, ear, nose, and throat treatment
            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">C. Emergency Care <span>(Notify Caritas within 24 hours)</span></p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">D. Special Diagnostics & Laboratory Procedures</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                X-ray<br>
                Basic Mammography<br>
                Ultrasound<br>
                Treadmill test<br>
                2D Echocardiography with Doppler<br>
                Electromyography (EMG)<br>
                Computed Tomography (CT) Scan<br>
                Nuclear Imaging<br>
                Magnetic Resonance Imaging (MRI)<br>
                Other procedures deemed appropriate by CARITAS

            </p>
            <br>
            <table width="100%">
                <tr>
                    <td style="border:1px solid black" colspan="2" align="center">
                        <b>@if($collect[0]->product_type == 1)
                            {{$collect[0]->kiddie_name}}'s Benefits
                        @else
                            {{str_replace('Ms.','',str_replace('Mr.','',$collect[0]->payor))}}'s Benefits
                        @endif</b>
                    </td>
                </tr>
                <tr>
                    <td align="left" style="border:1px solid black" width="70%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            <b>Medical Expense Benefits for {{$collect[0]->policy_year}} years    </b>
                        </p>
                    </td>
                    <td align="right" style="border:1px solid black" width="30%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            <b>{{$collect[0]->max_coverage_per_year}}</b>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black" width="70%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            <b>Membership Privileges </b>
                        </p>
                    </td>
                    <td style="border-left:1px solid black;border-right:1px solid black" width="30%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black" width="70%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            Outpatient
                        </p>
                    </td>
                    <td align="right" style="border-left:1px solid black;border-right:1px solid black" width="30%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            <b><i>{{$collect[0]->membership_previleges[0]['outpatient']}}</i></b>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black" width="70%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            APE
                        </p>
                    </td>
                    <td align="right" style="border-left:1px solid black;border-right:1px solid black" width="30%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            <b><i>{{$collect[0]->membership_previleges[0]['ape-up']}}</i></b>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black" width="70%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            Preventive Health Care
                        </p>
                    </td>
                    <td align="right" style="border-left:1px solid black;border-right:1px solid black" width="30%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            <b><i>{{$collect[0]->membership_previleges[0]['preventive_health_care']}}</i></b>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black" width="70%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            Dental Care
                        </p>
                    </td>
                    <td align="right" style="border-left:1px solid black;border-right:1px solid black" width="30%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            <b><i>{{$collect[0]->membership_previleges[0]['dental_care']}}</i></b>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black" width="70%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            Dependent's Consults
                        </p>
                    </td>
                    <td align="right" style="border-left:1px solid black;border-right:1px solid black" width="30%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            <b><u><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$collect[0]->membership_previleges[0]['dependent_consult']}}</i></u></b>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black" width="70%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            Total Membership Privileges for {{$collect[0]->policy_year}} years
                        </p>
                    </td>
                    <td align="right" style="border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black" width="30%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                        <b><i>{{$collect[0]->membership_previleges[0]['total_mp']}}</i></b>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black" width="70%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            Total Benefits
                        </p>
                    </td>
                    <td align="right" style="border-left:1px solid black;border:1px solid black;" width="30%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            <b>{{$collect[0]->total_benefits}}</b>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black" width="70%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            All for a Total Contract Price of only
                        </p>
                    </td>
                    <td align="right" style="border-left:1px solid black;border:1px solid black;" width="30%">
                        <p style="padding-left:2px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                            <b><i>{{$collect[0]->contract_price}}</i></b>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
        <td style="padding-left:20px;padding-right:10px" width="34%" valign="top">
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">2. Membership Privileges (MP)</p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">A. MP Outpatient Services</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                *Upgraded plans are entitled to Outpatient<br>  
                &nbsp;Consultation at our designated hospitals<br>
                <br>
                &nbsp;Up to twelve (12) consultations per year<br>
                &nbsp;Up to ten (10) pre/postnatal consultations per pregnancy
            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">B. Annual Physical Exam (APE)</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Taking of medical history<br>
                Medical examination<br>
                Chest X-ray (PA)<br>
                Complete Blood Count (CBC)<br>
                Fasting Blood Sugar (FBS)<br>
                Urinalysis and Fecalysis<br>
                Electrocardiogram (ECG) ( for 35 y.o. and above)<br>
                Pap Smear (for 35 y.o. and above)

            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">C. Preventive Health Care</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Periodic monitoring of health problems<br>
                Consultation on diet, exercise, and other healthful habits<br>
                Counselling on family planning<br>
                Flu and Pneumonia immunization, excluding cost of drugs <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or vaccines<br>
                Enrollment in company-sponsored health seminars

            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">D. Dental Care</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Up to four (4) consultations per year<br>
                Annual oral prophylaxis, (after at least three (3) months <br>
                from the date of effectivity of this Agreement)<br>
                Tooth extraction excluding surgery for impaction<br>
                Temporary filling or recementation<br>
                Treatment of oral pain and lesions

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
                24/7 medical hotline assistance<br>
                Discounts on non-covered health services at <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;selected hospitals, clinics, and laboratories<br>
                Up to four (4) medical consultations per year for <br>
                one (1) pre-designated dependent, who is qualified<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;as such under the SSS Law (RA 8282)

            </p>
            <br>
            @if($collect[0]->insurance_coverability == 0)
                <p class="lmbproxima" style="padding-top:1px;padding-left:50px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">V. INSURANCE BENEFITS</p>
                <p class="cbproxima_with_h" style="font-size: 12px;line-height: 1.1;padding-left:60px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:30%">
                    1. Credit Life<br>
                    2. Accidental Death<br>
                    3. Term Life<br>
                    4. Waiver of Installment due to Disability<br>
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
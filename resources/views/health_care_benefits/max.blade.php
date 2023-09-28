<table width="100%" style="font-size: 11px;font-family: Arial, Helvetica, sans-serif;" class="we">
    <tr>
        <td width="34%" valign="top" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
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
                Prescribed drugs and other medication used during    <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;confinement

            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">B. MEB Outpatient Services</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Treatment of minor injury or illness<br>
                Minor surgery (not requiring hospital facilities)<br>
                Eye, ear, nose, and throat treatment

            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">C. Emergency Care <span>(Notify Caritas within 24 hours)</span></p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">D. Special Diagnostic and Therapeutic Procedures</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                X-ray, Thyroid Function Test (FT3, FT4, TSH), <br>
                Mammography, Ultrasound, Treadmill test, <br>
                2D Echo with Doppler, EMG, CT Scan, <br>
                Nuclear Imaging, MRI, Chemotherapy/Radiotherapy<br>
                Hemodialysis, Cataract extraction, ESWL, Colonoscopy, <br>
                Gastroscopy, and other procedures deemed <br>
                appropriate by Caritas

            </p>
            <br>
            <table width="100%">
                <tr>
                    <td style="border:1px solid black" colspan="2" align="center">
                        <b>{{str_replace('Ms.','',str_replace('Mr.','',$collect[0]->payor))}}'s Benefits</b>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_lr_left" colspan="2" align="left">
                        <b>Medical Expense Benefit</b>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_l_left" align="left" width="70%">
                        Maximized Period of Coverage
                    </td>
                    <td class="benefits_r_left" align="right" width="30%">
                        <i><b>{{number_format(round($total),0)}}</b></i>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_l_left" align="left" width="70%">
                        Paying Period Coverage
                    </td>
                    <td class="benefits_r_left" align="right" width="30%">
                        <i><b>{{number_format($paying_period,0)}}</b></i>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_l_left" align="left" width="70%">
                        Bonus Period Coverage
                    </td>
                    <td class="benefits_r_left" align="right" width="30%">
                        <i><b>{{number_format($bonus_period,0)}}</b></i>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_l_left" align="left" width="70%">
                        <b>Total Medical Expense Benefit</b>
                    </td>
                    <td class="benefits_rt_left" align="right" width="30%">
                        <i><b>{{number_format($paying_period + $bonus_period + $total,0)}}</b></i>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_lrt_left" colspan="2" align="left">
                        <b>Membership Privileges</b>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_l_left" align="left" width="70%">
                        Outpatient
                    </td>
                    <td class="benefits_r_left" align="right" width="30%">
                        <i><b>{{$collect[0]->membership_previleges[0]['outpatient']}}</b></i>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_l_left" align="left" width="70%">
                        APE
                    </td>
                    <td class="benefits_r_left" align="right" width="30%">
                        <i><b>{{$collect[0]->membership_previleges[0]['ape-up']}}</b></i>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_l_left" align="left" width="70%">
                        Preventive Healthcare
                    </td>
                    <td class="benefits_r_left" align="right" width="30%">
                        <i><b>{{$collect[0]->membership_previleges[0]['preventive_health_care']}}</b></i>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_l_left" align="left" width="70%">
                        Dental Care
                    </td>
                    <td class="benefits_r_left" align="right" width="30%">
                        <i><b>{{$collect[0]->membership_previleges[0]['dental_care']}}</b></i>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_l_left" align="left" width="70%">
                        Other Services
                    </td>
                    <td class="benefits_r_left" align="right" width="30%">
                        <i><b>{{$collect[0]->membership_previleges[0]['other_services']}}</b></i>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_l_left" align="left" width="70%">
                        <b>Total Membership Privileges for 10 years</b>
                    </td>
                    <td class="benefits_r_left" align="right" width="30%">
                        <i><b>{{$collect[0]->membership_previleges[0]['total_mp']}}</b></i>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_l_left" align="left" width="70%">
                        <b>Total Benefits for 20 years</b>
                    </td>
                    <td class="benefits_rt_left" align="right" width="30%">
                        <i><b>{{number_format($paying_period + $bonus_period + $total + str_replace(',','',$collect[0]->membership_previleges[0]['total_mp']),0)}}</b></i>
                    </td>
                </tr>
                <tr>
                    <td class="benefits_left" align="left" width="70%">
                        <b>All for a Total Contract Price of </b>
                    </td>
                    <td class="benefits_right" align="right" width="30%">
                        <i><b>{{number_format(str_replace(',','',$collect[0]->contract_price),0)}}</b></i>
                    </td>
                </tr>
            </table>
        </td>
        <td style="padding-left:10px;padding-right:10px" width="34%" valign="top">
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">2. Membership Privileges (MP)</p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">A. MP Outpatient Services</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Up to fifteen (15) consultations per year, <br>
                up to fifteen (15) pre/postnatal consultations <br>
                per pregnancy, up to six (6) sessions of <br>
                physical therapy per year (P3,000.00 per year),<br>
                Special Diagnostic & Lab Procedures for members <br>
                aged 35 y.o. and above, if medically indicated <br>
                (up to twice a year for each test) <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lipid Profile, SGPT, Creatinine, Uric Acid,  <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Two-Hour Post-Prandial Test

            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">B. Annual Physical Examination (APE)</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Taking of medical history <br>
                Medical examination<br>
                Chest X-ray (PA)<br>
                Complete Blood Count (CBC)<br>
                Fasting Blood Sugar (FBS)<br>
                Urinalysis and Fecalysis<br>
                Electrocardiogram (for 30 y.o. and above)<br>
                Pap Smear (for 30 y.o. and above)<br>
                Transvaginal Ultrasound (for 45 y.o. and above)<br>
                Prostate Ultrasound (for 50 y.o. and above)

            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">C. Preventive Health Care</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
            Periodic monitoring of health problems<br>
            Consultation on diet, exercise, and other healthful habits<br>
            Counselling on family planning<br>
            Flu (Influenza) and Pneumonia (Pneumococcal) Immunization, <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;excluding cost of drugs or vaccines<br>
            Enrollment in company-sponsored health seminars<br>
            Consultation with a nutritionist

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
        <td style="padding-left:10px;padding-right:10px" width="32%" valign="top">
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">D. Dental Care ( excluding procedures <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;requiring inhalational or intravenous<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;anesthesia/general anesthesia)</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">
                Up to six (6) consultations per year<br>
                Semi-Annual oral prophylaxis, after at least three (3) <br>
                months from the date of effectivity of this Agreement<br>
                Tooth extraction excluding surgery for impaction<br>
                Temporary filling or recementation<br>
                Treatment of oral pain and lesions

            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">E. Other Services</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:10px">
                Twenty-four (24) hours/seven (7) days a week <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;telephone assistance<br>
                Discounts on non-covered health services at selected <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hospitals, clinics, and laboratories<br>
                Up to eight (8) medical or dental consultations per year <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for one (1) pre-designated dependent, who is <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;qualified as such under the SSS Law (RA 8282)

            </p>
            <p class="mbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">F. Tucked in Benefits</p>
            <p style="line-height: 1.1;padding-left:20px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:5px">
                Medical Benefit Fund increase of 1% or 2%<br>
                Convalescence Fund<br>
                Transferrable<br>
                Assignable
            </p>
            <br>
            @if($collect[0]->insurance_coverability == 0)
                <p class="lmbproxima" style="padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:1px">V. INSURANCE BENEFITS</p>
                <p class="cbproxima_with_h" style="font-size: 12px;line-height: 1;padding-left:10px;padding-top:1px;padding-bottom:1px;margin-top:1px;margin-bottom:10px">
                    1. Credit Life Insurance<br>
                    2. Waiver of Installment due to <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disability<br>
                    3. Term Life<br>
                    4. Accidental Death<br>
                    5. Memorial Assistance Advantage<br>
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
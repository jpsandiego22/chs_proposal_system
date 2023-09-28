<div class="modal fade" id="confirmation" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header chsi-color">
                <h3 class="text-white">
                        Confirmation
                    <button type="button" class="close" onclick="close_confirmation()">&times;</button>
                </h3>
            </div>
            <div class="modal-body">
                <input type="text" id="confirmmodule" hidden>
                <input type="text" id="val1" hidden>
                <input type="text" id="val2" hidden>
                <input type="text" id="val3" hidden>
                <input type="text" id="val4" hidden>
                <input type="text" id="val5" hidden>
                <input type="text" id="val6" hidden>
                <p><span id="confirmbody"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="close_confirmation()" class="btn btn-secondary btn-sm">Close</button>
                <button id="confirmaction" type="button" onclick="proceed_data_with_confirm()" class="btn btn-primary btn-sm">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    function close_confirmation()
    {
        var type = $("#confirmmodule").val();
        if(type=="UpdateOrSkip")
        {
            
            $("#confirmation").modal('hide');
        }
        else
        {
            $("#confirmation").modal('hide');
        }
    }
    function showcon(type,val1,val2,val3,val4,val5,val6)
    {
        // alert(val4);
        document.getElementById('confirmmodule').value = type;
        document.getElementById('val1').value = val1;
        document.getElementById('val2').value = val2;
        document.getElementById('val3').value = val3;
        document.getElementById('val4').value = val4;
        document.getElementById('val5').value = val5;
        document.getElementById('val6').value = val6;
        if(type=="letsgettoknowyou")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure all the data you provided is correct?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="save_personal_information")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure all the data you provided is correct?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="UpdateOrSkip")
        {
            document.getElementById('confirmbody').innerHTML = "Do you want to update the data that you provided?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="change_plan")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure you want to update the plan of your application?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="change_insurable")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure you want to change the insurance of your application?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="change_hcno")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure you want to update the health counselor of your application?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="plan_information")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure you want to update your plan information?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="update_payors_information")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure you want to update your payors information?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="update_pdd_information")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure you want to update your Pre-designated Dependent?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="update_pb_information")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure you want to update your Plan Beneficiary?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="update_insurance_beneficiary_information")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure you want to update your Insurance Beneficiary?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="update_personal_history")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure all the data you provided is correct?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="update_plan_information")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure all the data you provided is correct?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="update_medical_1")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure all the medical data you provided is correct?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="update_attachment")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure all the data you provided is correct?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="update_guardian_information")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure all the data you provided is correct?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="update_medical_2")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure all the medical data you provided is correct?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="approved_maf")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure you want to approved this application?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="request_maf")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure you want to request MAF # in this application?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        else if(type=="cancel_application")
        {
            document.getElementById('confirmbody').innerHTML = "Are you sure you want to cancel this application?";
            document.getElementById('confirmaction').innerHTML = "Proceed";
            $("#confirmation").modal("show");
        }
        
        
    }
    function proceed_data_with_confirm()
    {
        var type = $("#confirmmodule").val();
       
        if(type=="letsgettoknowyou")
        {
            information_check();
            $("#confirmation").modal("hide");
        }
        else if(type=="save_personal_information")
        {
            save_personal_information();
            $("#confirmation").modal("hide");
        }
        else if(type=="UpdateOrSkip")
        {
            update_personal_information();
            $("#confirmation").modal("hide");
        }
        else if(type=="change_plan")
        {
            update_plan_hc_insurable($("#val2").val(),$("#val1").val(),1)
            $("#confirmation").modal("hide");
        }
        else if(type=="change_insurable")
        {
            update_plan_hc_insurable($("#val2").val(),$("#val1").val(),2)
            $("#confirmation").modal("hide");
        }
        else if(type=="change_hcno")
        {
            update_plan_hc_insurable($("#val2").val(),$("#val1").val(),3)
            $("#confirmation").modal("hide");
        }
        else if(type=="plan_information")
        {
            update_plan_hc_insurable($("#val2").val(),$("#val1").val(),4,$("#val3").val(),$("#val4").val(),$("#val5").val(),$("#val6").val())
            $("#confirmation").modal("hide");
        }
        else if(type=="update_payors_information")
        {
            update_payors_information();
            $("#confirmation").modal("hide");
        }
        else if(type=="update_pdd_information")
        {
            update_pdd_information();
            $("#confirmation").modal("hide");
        }
        else if(type=="update_pb_information")
        {
            update_pb_information();
            $("#confirmation").modal("hide");
        }
        else if(type=="update_insurance_beneficiary_information")
        {
            update_insurance_beneficiary_information();
            $("#confirmation").modal("hide");
        }
        else if(type=="update_personal_history")
        {
            update_personal_history();
            $("#confirmation").modal("hide");
        }
        else if(type=="update_plan_information")
        {
            update_plan_information();
            $("#confirmation").modal("hide");
        }
        else if(type=="update_medical_1")
        {
            update_medical_1();
            $("#confirmation").modal("hide");
        }
        else if(type=="update_attachment")
        {
            update_attachment();
            $("#confirmation").modal("hide");
        }
        else if(type=="update_guardian_information")
        {
            update_guardian_information();
            $("#confirmation").modal("hide");
        }
        else if(type=="update_medical_2")
        {
            update_medical_2();
            $("#confirmation").modal("hide");
        }
        else if(type=="approved_maf")
        {
            approved_maf();
            $("#confirmation").modal("hide");
        }
        else if(type=="request_maf")
        {
            process_request_maf($("#val1").val());
            $("#confirmation").modal("show");
        }
        else if(type=="cancel_application")
        {
            cancel_application($("#val1").val());
            $("#confirmation").modal("show");
        }
    }
</script>
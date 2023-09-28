@include("template.header")
        <section id="main-page" class="section-padding">
            <div class="container-fluid ">
                <form id="login">
                    <div class="radius shadow card relative auto-center backgroundwhite" style="max-width: 1000px;background-col: white">
                        <div class="ribbon"><span>PROPOSAL MAKER</span></div>
                        <div class="card-heading-main ">
                            <div class="float-link">
                                <a href="{{'https://'.$_SERVER['SERVER_NAME']}}"><span class="fa fa-arrow-circle-o-left "></span> Back to Homepage</a>
                            </div>
                            <h1>
                                <img src="{{URL::asset('img/header.jpg')}}" width="100%" height="auto" />
                            </h1>
                            <div class="card-body">
                        
                                <div id="validate" class="row">
                                    <div class="col-md-12">
                                        <div class="sub-card card-carmine-red">
                                            <div class="card-heading text-left">
                                                <label>PRODUCTS PACKAGE <small>( All fields are required )</small></label>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5 text-left">
                                                    <div class="form-group">
                                                        <label class="form-label">This proposal is intended for <span>*</span></label> 
                                                        <select class="form-control check" id="product_iid">
                                                            <option value="" selected disabled>- Please Select -</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group text-left">
                                                        <label class="form-label">Insurance Coverability <span>*</span></label>
                                                        <div id="div_plan_type" style="padding:5px">
                                                            <div class='radio-inline'>
                                                                <label>
                                                                    <input type='radio' name='plan_type_iid' value="0">With Insurance Benefit
                                                                </label>
                                                            </div><div class='radio-inline'>
                                                                <label>
                                                                    <input type='radio' name='plan_type_iid' value="1">No Insurance Benefit
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row  text-left">
                                                <div id="plan_name_id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12  text-left">
                                        <div class="sub-card card-sky-blue">
                                            <div class="card-heading card-heading-green">
                                                <label>PROPOSED MEMBER'S DETAILS <small>( All fields are required )</small></label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="form-label" id="label_member">Proposed Member's Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control check" placeholder="Name of payor" id="payor_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group text-left">
                                                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                        <div id="div_gender" style="padding:5px">
                                                            <div class="radio-inline">
                                                                <label>
                                                                    <input type="radio" name="gender" value="Male">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio-inline">
                                                                <label>
                                                                    <input type="radio" name="gender" value="Female">
                                                                    Female
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="div_kid_name" class="row hidden-xs">
                                                <div class="col-md-8">
                                                    <div class="form-group text-left">
                                                        <label class="form-label">Proposed Kiddie's Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" Placeholder="Kiddie's Name" id="kiddie_name" >
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" id="birthdate_validate">
                                                        <label class="form-label">Proposed Member's Birthdate <span class="text-danger">*</span></label>
                                                        <input type="date" data-date-format="yyyy-mm-dd" id="date_of_birth" class="form-control check" placeholder="YYYY-MM-DD">
                                                    </div>
                                                </div>
                                                <div class=" col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Age</label>
                                                        <input type="text" class="form-control check" placeholder="Age" readonly="true" id="text_age">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-left">
                                                <label class="form-label">Residence <span class="text-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-12">
                                                        <input type="text" class="form-control check" placeholder="Street" id="address1">
                                                    </div>
                                                    <div class="col-lg-4 col-sm-4">
                                                        <input type="text" class="form-control check" placeholder="City" id="address2">
                                                    </div>
                                                    <div class="col-lg-4 col-sm-4">
                                                        <input type="text" class="form-control check" placeholder="Province" id="address3">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-12  text-left">
                                        <div class="card-carmine-red sub-card">
                                            <div class="card-heading card-heading-orange">
                                                <label>COUNSELOR DETAILS <small>( To be filled out by counselors / Optional)</small></label>
                                            </div>
                                            <div class="text-left form-group">
                                                <!-- <label class="form-label">Counselor Code</label>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="input-group">
                                                            <input id="counselor_code" type="text" class="form-control">
                                                            <span class="input-group-btn">
                                                            <button id="counselor_search" type="button" class="btn btn-info btn-flat"><span class="fa fa-search"></span></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row"><br></div> -->
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <select id="counselor_title" class="form-control form-group">
                                                            <option value="">- Title -</option>
                                                            <option value="Ms.">Ms.</option>
                                                            <option value="Mrs.">Mrs.</option>
                                                            <option value="Mr.">Mr.</option>
                                                            <option value="Dr.">Dr.</option>
                                                            <option value="Atty.">Atty.</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input id="counselor_firstname" type="text" class="form-control form-group" Placeholder="First Name">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input id="counselor_middleinitial" type="text" class="form-control form-group" Placeholder="Middle Name">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input id="counselor_lastname" type="text" class="form-control form-group" Placeholder="Last Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group text-left">
                                                        <label class="form-label">Choose your designation</label>
                                                        <select class="form-control" id="counselor_designation">
                                                            <option></option>
                                                            <option value="Health Counselor">Health Counselor</option>
                                                            <option value="Cluster Manager">Cluster Manager</option>
                                                            <option value="Agency Manager">Agency Manager</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group text-left">
                                                        <label class="form-label">Contact No.</label>
                                                        <input id="counselor_number_daytime" type="number" class="form-control" Placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group text-left">
                                                        <label class="form-label">Type your branch below</label>
                                                        <input id="counselor_branch" type="text" class="form-control" Placeholder="Branch name">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 unseen" hidden>
                                                    <div class="form-group text-left">
                                                        <label class="form-label">Nightime Contact No.</label>
                                                        <input id="counselor_number_nighttime" type="number" class="form-control" Placeholder="">
                                                    </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12  text-left">
                                        <p class="help-block"> <span class="text-danger" style="font-size:20px">*</span><i> Indicates required field. You must fill them all to generate proposal.</i></p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" target="_blank" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#modal_clear">Clear Fields</button>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- <button id="btn_generate" type="button" target="_blank" class="btn btn-navy btn-block btn-lg" data-toggle="modal" data-target="#modal_proposal" disabled>Generate Proposal</button> -->
                                                <button class="btn btn-success btn-block btn-lg" type="button" id="submit_data">Generate Proposal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>  
        @include("data_privacy")
        @include("template.footer")
     
        <script>
            $("#submit_data").click(function(event){
                var count = 0; 
                $('#validate').find('input').each(function()
                {
                    if($(this).hasClass("check"))
                    {
                        if ($(this).val()) 
                        {
                            $(this).removeClass('borderred')
                        }
                        else
                        {
                            alertmessage('Please fill out the fields with red borders.','danger');
                            $(this).addClass('borderred')
                            count++;
                        }
                    }
                   
                });
                if($("#product_iid").val())
                {
                    $("#product_iid").removeClass('borderred')
                }
                else
                {
                    alertmessage('Please fill out the fields with red borders.2','danger');
                    $("#product_iid").removeClass('borderred')
                    count++;
                }
                if($("#div_kid_name").hasClass("hidden-xs"))
                {

                }
                else
                {
                    if($("#kiddie_name").val())
                    {
                        $("#kiddie_name").removeClass('borderred')
                    }
                    else
                    {
                        alertmessage('Please fill out the fields with red borders.2','danger');
                        $("#kiddie_name").removeClass('borderred')
                        count++;
                    }

                }  
                if($('input[name="plan_type_iid"]:checked').val())
                {
                    $("#div_plan_type").removeClass('borderred')
                }
                else
                {
                    alertmessage('Please fill out the fields with red borders.3','danger');
                    $("#div_plan_type").addClass('borderred');
                    count++;
                }
                if($('input[name="gender"]:checked').val())
                {
                    $("#div_gender").removeClass('borderred')
                }
                else
                {
                    alertmessage('Please fill out the fields with red borders.4','danger');
                    $("#div_gender").addClass('borderred');
                    count++;
                }
                if($('input[name="plan_name"]').length)
                {
                    if($('input[name="plan_name"]:checked').val())
                    {
                        $("#plan_name_id").removeClass('borderred')
                        $("#plan_name_id").removeClass('cpadding')
                    }
                    else
                    {
                        alertmessage('Please select plan in the table.','danger');
                        $("#plan_name_id").addClass('borderred');
                        $("#plan_name_id").addClass('cpadding')
                        count++;
                    }
                }

                if(count == 0)
                {
                    $.ajax({
                        url:'{{ route('new_entry') }}',
                        type:'get',
                        data: 
                        {
                            product_iid : $("#product_iid").val(),
                            plan_type_iid : $('input[name="plan_type_iid"]:checked').val(),
                            plan_name : $('input[name="plan_name"]:checked').val(),
                            payor_name : $("#payor_name").val(),
                            kiddie_name : $("#kiddie_name").val(),
                            gender : $('input[name="gender"]:checked').val(),
                            date_of_birth : $("#date_of_birth").val(),
                            text_age : $("#text_age").val(),
                            address1 : $("#address1").val(),
                            address2 : $("#address2").val(),
                            address3 : $("#address3").val(),
                            counselor_title : $("#counselor_title").val(),
                            counselor_firstname : $("#counselor_firstname").val(),
                            counselor_middleinitial : $("#counselor_middleinitial").val(),
                            counselor_lastname : $("#counselor_lastname").val(),
                            counselor_designation : $("#counselor_designation").val(),
                            counselor_number_daytime : $("#counselor_number_daytime").val(),
                            // counselor_number_nighttime : $("#counselor_number_nighttime").val(),
                            counselor_branch : $("#counselor_branch").val(),
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success:function(data)
                        {
                            var obj = JSON.parse(data);
                            alertmessage(obj.message,obj.info)
                            if(obj.status == "success")
                            {
                                // alert(obj.url);
                                window.location = obj.url;
                            }
                        }
                    })
                }  
            })

            $(document).ready(function()
            {
                // jQuery.noConflict();
                $('#product_menu').carousel();
                $("#data_privacy").modal("show");
                get_product()
                $(document).ajaxStart(function()
                {
                    
                    var html = document.documentElement;
                    $('#myOverlay').show();
                    $('#myOverlay').height(html.clientHeight);
                    $('#myOverlay').width(screen.width);
                    $("#wait").css("display", "block");
                });
                $(document).ajaxComplete(function()
                {
                    $('#myOverlay').hide();
                    $("#wait").css("display", "none");
                });
                $(document).ajaxError(function()
                {
                    alert("An error occurred! System will refresh the page [JPSD]");
                    // location.reload();
                });
            });
            function get_product()
            {
                $.ajax({
                    url:'{{ route('get_product') }}',
                    type:'get',
                    data: 
                    {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success:function(data)
                    {
                        var obj = JSON.parse(data);

                        for(i in obj.data)
                        {
                            var product = document.getElementById("product_iid");
                            var yoption = document.createElement("option");
                            yoption.value = obj.data[i].iid;
                            yoption.text =  obj.data[i].description;
                            yoption.datatokens = obj.data[i].description;
                            product.add(yoption);
                        }
                        $('#product_iid').select2({
                            sortResults: data => data.sort((a, b) => a.text.localeCompare(b.text)),
                        });
                    }
                })
            }
            $("#product_iid").change(function()
            {
                $.ajax({
                    url:'{{ route('get_plan') }}',
                    type:'get',
                    data: 
                    {
                        iid : $("#product_iid").val(),
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success:function(data)
                    {
                        var obj = JSON.parse(data);
                        $("#plan_name_id").empty();
                        $("#plan_name_id").append(obj.table);
                        if(obj.product.type == 1)
                        {
                            $("#label_member").html('Payor\'s Name');
                            $("#div_kid_name").removeClass('hidden-xs');
                            
                        }
                        else
                        {
                            $("#label_member").html('Proposed Member\'s Name');
                            $("#div_kid_name").removeClass('hidden-xs');
                            $("#div_kid_name").addClass('hidden-xs');
                            
                        }
                    }
                });
            });
            
            $("#date_of_birth").change(function(){
                $("#text_age").val(calcAge(this.value)); 
            })
            function calcAge(dateString) 
            {
                var birthday = +new Date(dateString);
                return ~~((Date.now() - birthday) / (31557600000));
            }
            $("#counselor_search").click(function(){
                $.ajax({
                    url:'{{ route('get_counselor_details') }}',
                    type:'get',
                    data: 
                    {
                        code : $("#counselor_code").val(),
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success:function(data)
                    {
                        var obj = JSON.parse(data);

                       alert(data);
                    }
                });
            })
        </script>
        
    </body>
</html>

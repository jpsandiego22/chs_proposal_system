@include("template.header")
    <section id="main-page" class="section-padding1" style="margin-top:10%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 backgroundwhite shadow radius">
                    <form id="login" class="form-group">
                        <center><img src="{{URL::asset('img/header_pdf.jpg')}}" style="height:40px;width:auto"></center>
                        <br>
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>USERNAME</label>
                                <input id="username" type="text" class="form-control radius" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label>PASSWORD</label>
                                <input id="password" type="password" class="form-control radius" placeholder="Password">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-success btn-sm text-blue pull-right" type="submit">LOGIN</button>
                                    <a href="{{ url('/') }}" type="button" class="btn btn-default btn-sm text-blue pull-right" style="margin-right:5px"><b>CANCEL</b></a>
                                </div>
                            </div>
                            <div class="col-md-12"><br></div>

                        </div>
                        <div class="col-md-1"></div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
@include("template.footer2")
<script>
     $("#login").submit(function(event)
    { 
        var a = 0;
        event.preventDefault();
        if($("#username").val())
        {
            $("#username").removeClass('border-red');
        }
        else
        {
            a = 1;
            $("#username").removeClass('border-red');
            $("#username").addClass('border-red');
        }
        if($("#password").val())
        {
            $("#password").removeClass('border-red');
        }
        else
        {
            a = 1;
            $("#password").removeClass('border-red');
            $("#password").addClass('border-red');
        }

        if(a==0)
        {
            $.ajax({
                url:'{{ route('submit_login')}}',
                type:'get',
                data: 
                {
                    username : $("#username").val(),
                    password : $("#password").val(),
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(data)
                {
                    var obj = JSON.parse(data);
                    alertmessage(obj.message,obj.info)
                    if(obj.status == "success")
                    {
                        window.location = '{{ route('admin_index') }}';
                    }
                    
                }
            })
        }
    });
</script>
<div class="modal fade" id="edit_price">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">EDIT PRICE</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <span id="reference" class="unseen"></span>
                        <div class="col-md-12">
                            <label>Product : </label>    
                            <span id="product_description"></span>
                        </div>
                        <div class="col-md-12">
                            <label>Plan : </label>    
                            <span id="plan"></span>
                        </div>
                        <div class="col-md-12">
                            <label>Mode of payment : </label>
                            <span id="mode"></span>
                        </div>
                        <div class="col-md-12">
                            <label>Current Price : </label>
                            <span id="current_price"></span>
                        </div>
                        <div class="col-md-12">
                            <label>New Price</label><br>
                            <input id="new_price" type="number" class="form-control radius" placeholder="0.00">
                        </div>
                        <div class="col-md-12"><br></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button id="save_changes" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#save_changes").click(function(){
        if($("#new_price").val())
        {
            $("#edit_price").modal("hide");
            $("#confirm").modal("show");
            $("#new_price").addClass("borderred");
        }
        else
        {
            $("#new_price").removeClass("borderred");
            $("#new_price").addClass("borderred");
        }
    });
</script>
<div class="modal fade" id="confirm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">CONFIRMATION</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">Are you sure you want to update this price?</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button id="modal_proceed" type="button" class="btn btn-primary">Proceed</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#modal_proceed").click(function(){
        if($("#new_price").val())
        {
            $.ajax({
                url:'{{ route('proceed_update')}}',
                type:'get',
                data: 
                {
                    ref : $("#reference").html(),
                    new_price : $("#new_price").val(),
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(data)
                {
                    var obj = JSON.parse(data);
                    if(obj.status == "success")
                    {
                        price_list()
                    }
                    alertmessage(obj.message,obj.info);
                    $("#confirm").modal("show");
                }
            })
        }
        else
        {
           alertmessage('No Value Given in Price.','danger');
        }
    });
</script>



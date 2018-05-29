<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Transactions</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Transactions</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add-transaction"   class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Add New Transaction</a>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Transaction Records</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Payment Mode</th>
                        <th>Cheque Number</th>
                        <th>Cheque Dated</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($transactions)) 
                    {
                        foreach ($transactions as $key => $value) 
                        {
                            ?>
                                <tr class="gradeX" id="transaction-<?=$value->transaction_id?>">
                                    <td><?=$value->name;?></td>
                                    <td><?=$value->payment_mode;?></td>
                                    <td><?=$value->cheque_number;?></td>
                                    <td class="center"><?=$value->cheque_dated;?></td>
                                    <td class="center"><?=$value->amount;?></td>
                                    <td class="center"><?=$value->note;?></td>
                                    <td class="center"><?=$value->created_date;?></td>
                                    <td>
                                        
                                        <a href="javascript:{}" class="btn btn-danger delete-transaction" data-index="<?=$value->transaction_id?>" name="delete-transaction">Delete</a><br></td>
                                </tr>
                            <?php
                        }
                    }
                    ?>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            
        </div>

    <!-- Add New Customer modal content -->
    <div id="add-transaction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url();?>add-transaction" method="post">
                   
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">New Transaction</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text"  name="name"  required="" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Payment Mode:</label>
                                <br>
                                <label class="radio-inline">
                                    <input type="radio" name="payment_mode" class="styled" checked="checked" value="cash">
                                    Cash
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="payment_mode" class="styled" value="cheque">
                                    Cheque
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount:</label>
                                <?php echo form_input(['name'=>'amount','class'=>'form-control','placeholder'=>'Rs.999/-','id'=>'amount'])?>
                            </div>
                        </div>
                        

                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-6" id="cheque_number_div" style="display: none;">
                            <div class="form-group">
                                <label>Cheque Number:</label>
                                <?php echo form_input(['name'=>'cheque_number','class'=>'form-control','placeholder'=>'9999999999','id'=>'cheque_number'])?>
                            </div>
                        </div>
                        <div class="col-md-6" id="cheque_dated_div" style="display: none;">
                            <div class="content-group">
                                <label>Cheque Dated</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                    <?php echo form_input(['name'=>'cheque_dated','class'=>'form-control datepicker-format','placeholder'=>'Pick a date&hellip;','id'=>'cheque_dated'])?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Note:</label>
                                <?php echo form_textarea(['name'=>'note','class'=>'form-control','id'=>'summernote','row'=>'3','style'=>'height:40px;'])?>
                            </div>
                        </div>
                    </div>

                        

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Transaction</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    

<script>
     $("a[name=delete-transaction]").on("click", function () { 
            var transaction_id = $(this).data("index"); 
            $.ajax({
                url: 'delete-transaction',
                type: 'POST',
                data:  { 'id' : transaction_id},
                success: function(response,status,xhr) {
                    console.info(response);
                    if (response) 
                    {
                              $(".delete-transaction").closest("#transaction-"+transaction_id).remove();
                              setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 4000
                                    };
                                    toastr.success('Good Work', 'transaction Deleted Successfully');

                                }, 1300);
                    }
                    else
                    {
                              setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 4000
                                    };
                                    toastr.error('Oops', 'Something went wrong');

                                }, 1300);
                    }

                }
            }); 
        });
</script>

<?php
if($error = $this->session->flashdata('add_success'))
{
?>
    <script>
        setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('<?php echo $this->session->flashdata('add_success'); ?>', 'Success');

            }, 1300);
    </script>
<?php
}
elseif($error = $this->session->flashdata('add_failed'))
{
?>
    <script>
        setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('<?php echo $this->session->flashdata('add_failed'); ?>', 'Error');

            }, 1300);
    </script>
<?php
}
?>
<script>
    $(document).ready(function(){
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='payment_mode']:checked").val();

            if(radioValue != 'cheque')
            {
                $("#cheque_number_div").css({'display':'none'});
                $("#cheque_dated_div").css({'display':'none'});
                
            }
            else
            {
                $("#cheque_number_div").css({'display':'block'});
                $("#cheque_dated_div").css({'display':'block'});

            }
           
        });
        
    });

</script>
<script src="<?= base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/datatables/dataTables.bootstrap.js"></script>

<!-- Products Modal Start -->
<div class="modal fade" id="ProductsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Message</h4>
            </div>
            <div class="modal-body">
                <div class="product-item animated fadeIn" style="display: inline;">
                    <div class="row">
                        <div class="modal-body">
                            <p><b>Name:</b></p>
                            <p id='name'></p>
                            <br>
                            <p><b>Email:</b></p>
                            <p id='email'></p>
                            <br>
                            <p><b>Message:</b></p>
                            <p id='message'></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Products Model End -->


<div class="modal fade bs-example-modal-md v" id="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2695B9; color: white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="content-page">   
    <div class="content">   
        <div class="container"> 
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="<?php echo base_url() ?>dashboard">Mr Andersons Cigar - Admin</a></li>
                        <li class="active">Support Messages</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Support Messages</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- <div class="col-sm-6">
                                    <div class="m-b-30">
                                        <form method="POST" action="<?php echo base_url() ?>addfaqs">
                                            <button type="submit" id="addToTable" class="btn btn-success waves-effect waves-light"> Add <i class="fa fa-plus"></i></button>
                                        </form>
                                    </div>
                                </div> -->
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Message</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                $i=1;
                                                foreach($contact as $row)
                                                {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $i ?>.</td>
                                                        <td><?php echo ucwords($row['name']) ?></td>
                                                        <td><?php echo $row['email'] ?></td>
                                                        <td><?php echo mb_strimwidth($row['message'], 0, 100, "...") ?></td>
                                                        <td class="actions">
                                                            <!-- <a data-togle="v" data-target="#modal" class="on-default edit-row" onclick="myFunction('<?php echo $row['name'] ?>','<?php echo $row['email'] ?>','<?php echo $row['message'] ?>')"><i class="fa fa-eye"></i></a> -->
                                                            <a data-togle="v" data-target="#modal" class="on-default edit-row" onclick="view_message(<?= $row['id']?>)"><i class="fa fa-eye"></i></a>
                                                            <a href="<?php echo base_url() ?>deletemessage/<?php echo $row['id'] ?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                            <?php 
                                                    $i++;
                                                }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CUSTOM JS -->
<script type="text/javascript">
    // function myFunction(name, email, message)
    // {
    //     // alert('dcfg');
    //     $('#name').html(name);
    //     $('#email').html(email);
    //     $('#message').html(message);
    //     $("#ProductsModal").modal('show');
    // }

    function view_message(id)
    {
        $.ajax(
        {
            type: "POST",
            url: "<?= base_url().'view'?>",  
            data: {
                'id' : id
            },
            success: function(response)
            {
                var con = jQuery.parseJSON(response);
                   
                if(con.res=="yes")
                {
                    $('#name').html(con.data.name);
                    $('#email').html(con.data.email);
                    $('#message').html(con.data.message);
                    $("#ProductsModal").modal('show');
                }
                else
                {
                    alert("error");
                }
            }
        });
    }

    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
    
</script>
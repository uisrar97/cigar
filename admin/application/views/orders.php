         <script src="<?= base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/datatables/dataTables.bootstrap.js"></script>
                <div class="content-page">   
                    <div class="content">   
                        <div class="container"> 
                            <div class="row">
                                <div class="col-sm-12">
                                    <ol class="breadcrumb pull-left">
                                        <li><a href="<?php echo base_url() ?>dashboard">Mr Andersons Cigar - Admin</a></li>
                                        <li class="active">Orders</li>
                                    </ol>
                                </div>
                            </div>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Pending Orders</h3>
                                    </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                    </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table id="datatable" class="table table-striped ">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Order Date</th>
                                                            <th>Customer Name</th>
                                                            <th>Order Total</th>
                                                            <th>Shipping Address</th>
                                                            <th>Order Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                     <?php
                                                     $i=1;
                                                     foreach($displayorder as $row) 
                                                     {
                                                        if($row['order_status'] == 0)
                                                        {
                                                             $row['order_status'] = 'Pending';
                                                        }
                                                            
                                                     ?>
                                                    <tr>
                                                    <td><?php echo $i ?>.</td>
                                                    <td><?php echo $row['date'] ?></td>
                                                    <td><?php echo ucwords($row['user_first_name']); echo " "; echo ucwords($row['user_last_name']);?></td>
                                                    <td><?php echo $row['order_total'] ?></td>
                                                    <td><?php echo $row['shipping_phone']; echo ", "; echo ucwords($row['shipping_street_address']); echo ", "; echo ucwords($row['shipping_city']); echo ", "; echo ucwords($row['shipping_state']); echo ", "; echo ucwords($row['shipping_country']); echo ", "; echo $row['shipping_zip']; ?>.</td>
                                                    <td><?php echo $row['order_status']; ?></td>
                                                    <td class="actions">
                                                        <a name="status" href="<?php echo base_url() ?>editpendingstatus/<?=$row['id'] ?>"  class='on-default edit-row'><i class='fa fa-eye'></i></a>
                                                        <a href="<?php echo base_url() ?>deleteorder/<?=$row['id'] ?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                     </tr>
                                                     <?php $i++;
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
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
         <script src="<?= base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/datatables/dataTables.bootstrap.js"></script>
                <div class="content-page">   
                    <div class="content">   
                        <div class="container"> 
                            <div class="row">
                                <div class="col-sm-12">
                                    <ol class="breadcrumb pull-left">
                                        <li><a href="<?php echo base_url() ?>dashboard">Mr Andersons Cigar - Admin</a></li>
                                        <li class="active">Products</li>
                                    </ol>
                                </div>
                            </div>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Products</h3>
                                    </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="m-b-30">
                                                            <form method="" action="<?php echo base_url() ?>addproducts">
                                                                <button type="submit" id="addToTable" class="btn btn-success waves-effect waves-light"> Add <i class="fa fa-plus"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="table-responsive">
                                                            <table id="datatable" class="table table-striped ">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Price per Package</th>
                                                                        <th>Price per Cigar</th>
                                                                        <th>Image</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                 <?php
                                                                 $i=1;
                                                                 foreach($displayproducts as $row)
                                                                 {
                                                                   
                                                                 ?>
                                                                 <tr>
                                                                 <td><?php echo $i ?>.</td>
                                                                 <td><?php echo ucwords($row['name']) ?></td>
                                                                 <td><?php echo $row['price_package'] ?> Kr</td>
                                                                 <td><?php echo $row['price_cigar'] ?> Kr</td>
                                                                 <td style="text-align:center;"><img style="height: 55px" src="<?php echo base_url('uploads/products/'. $row['image']);?>" /></td>
                                                                    <td class="actions">
                                                                    <a href="<?php base_url() ?>editproduct/<?php echo $row['id']  ?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                                    <a href="<?php echo base_url() ?>deleteproduct/<?php echo $row['id'] ?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
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
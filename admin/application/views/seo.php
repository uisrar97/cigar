<script src="<?= base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/datatables/dataTables.bootstrap.js"></script>
<div class="content-page">   
    <div class="content">   
        <div class="container"> 
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="<?php echo base_url() ?>dashboard">Mr Andersons Cigar - Admin</a></li>
                        <li class="active">SEO</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">SEO</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="m-b-30">
                                        <form method="" action="<?php echo base_url() ?>addseo">
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
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i=1;
                                                    foreach($seo as $row)
                                                    {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $i ?>.</td>
                                                            <td><?php echo ucwords($row['meta_title']) ?></td>
                                                            <td><?php echo mb_strimwidth($row['meta_description'], 0, 20, "...") ?></td>
                                                            <td class="actions">
                                                                <a href="<?php base_url() ?>editseo/<?php echo $row['id']  ?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                                <!-- <a href="<?php echo base_url() ?>welcome/deleteseo/<?php echo $row['id'] ?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a> -->
                                                            </td>
                                                        </tr>
                                                <?php 
                                                        $i++;
                                                    }
                                                ?>
                                            </tbody>
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
    $(document).ready(function()
    {
        $('#datatable').dataTable();
    } );
</script>
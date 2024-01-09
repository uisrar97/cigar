				<div class="content-page">   
					<div class="content">	
                        <div class="container">	
                            <div class="row">
                            <div class="col-sm-12">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="<?php echo base_url() ?>dashboard">Mr Andersons Cigar - Admin</a></li>
                                    <li class="active">Homepage</li>
                                </ol>
                            </div>
                        </div>
						  <div class="row">
							<div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Slider Table</h3>
                                    </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                        <!--<div class="m-b-30">
                                            <form method="" action="<?php echo base_url() ?>welcome/homepage">   
                                            <button type="submit" id="addToTable" class="btn btn-success waves-effect waves-light"> Add <i class="fa fa-plus"></i></button>
                                            </form>
                                        </div> -->
                                    </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped ">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Title</th>
                                                                    <th>Heading</th>
                                                                    <th>Sub Heading</th>
                                                                    <th>Image</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                          									 <?php
                                                             $i=1;
															 foreach($displayrecords as $row)
															 {
                                                             ?>
                                                             <tr>
															 <td><?php echo $i ?>.</td>
															 <td><?php echo ucwords($row['title']) ?></td>
															 <td><?php echo ucwords($row['heading']) ?></td>
															 <td><?php echo ucwords($row['sub_heading']) ?></td>
															 <td><img style="width: 70px;" src="<?php echo base_url('uploads/'. $row['image']);?>" /></td>
                                                                <td class="actions">
                                                                <a href="<?php base_url() ?>editslider/<?php echo $row['id']  ?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                                <!--<a href="<?php base_url() ?>deletelist/<?php echo $row['id'] ?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a> -->
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
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-sm-4 ">
                    <div class="box-content  text-white" style="background-color:#e98180 !important">
						<div class="statistics-box with-icon">
							<i class="ico small fa fa-file"></i>
							<p class="text text-white">Total Vehicles</p>
							<h2 class="counter"><?php echo $total ?></h2>
						</div>
					</div>
                <!-- /.box-content -->
            </div>
            <div class="col-sm-4 ">
                     <div class="box-content bg-warning text-white"style="background-color:#287e7f !important">
						<div class="statistics-box with-icon">
                            <i class="ico small fa fa-file"></i>
							<p class="text text-white">Geofence Vehicles</p>
							<h2 class="counter"><?php echo $geofence ?></h2>
						</div>
					</div>
               

                <!-- /.box-content -->
            </div>
            <div class="col-sm-4 ">
                     <div class="box-content  text-white"style="background-color:#a3a353 !important">
						<div class="statistics-box with-icon">
                            <i class="ico small fa fa-file"></i>
							<p class="text text-white">Not Geofence Vehicles</p>
							<h2 class="counter"><?php echo $total-$geofence ?></h2>
						</div>
					</div>
                
            </div>
            <!-- /.box-content -->

            <!-- /.col-xl-3 col-12 -->

        </div>
        <!-- /.row small-spacing -->
        <div class="col-xs-12">
            <h4 class="box-title mb-20">Reports</h4>
            <br><br>
            <div class="box-content mb-20" style="margin-bottom:5%">
                <div class="table-responsive">
                    <table id="example" class="table  table-bordered display table-hover table-responsive table-striped" style="width:100%">
                        <thead style="    background: #1790c9;color: white;">
                            <tr>
                                <th>S.No</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>License Plate</th>
                                <th>Unit Name</th>
                                <th>Current Location </th>
                                <th>City </th>
                                <th>Geofence </th>
                                <th>VIN </th>
                                <th>Updated Time </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($reports as $list) { ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $list->brand ?></td>
                                    <td><?php echo $list->model ?></td>
                                    <td><?php echo $list->license_plate ?></td>
                                    <td><?php echo $list->vehicle_no ?></td>
                                    <td><?php echo $list->current_location ?></td>
                                    <td><?php echo $list->city ?></td>
                                    <?php if ($list->geofence == 'Yes') { ?>
                                        <td>YES</td>
                                    <?php } else { ?>
                                        <td>NO</td>
                                    <?php } ?>
                                    <td><?php echo $list->VIN ?></td>
<td><?php echo date("d-m-Y H:i:s", strtotime($list->created_date)); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        
                    </table>
                </div>
                
            </div>
            <!-- /.box-content -->
           
            
        </div>
        

    </div><br><br><br>
   
    <footer class="foot" style="position:fixed;bottom:0px;background-color:black;width:100%;padding:1%;color:white;">
                <p style="text-align:center;">2023 © Designed & Developed By <a href="https://www.transglobalgeomatics.com/">Trans Global Geomatics Pvt Ltd.</a></p>
     </footer>
    <!-- /.main-content -->
</div><!--/#wrapper -->

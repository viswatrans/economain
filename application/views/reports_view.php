<div id="wrapper">
    <div class="main-content">


        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">Reports</h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>Dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Reports
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="box-content">
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
                                    <th>Updated Time</th>
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
            </div>
        </div>
    </div><br><br><br>
    <footer style="position:fixed;bottom:0px;background-color:black;width:100%;padding:1%;color:white;">
                <p style="text-align:center;">2023 © Designed & Developed By <a href="https://www.transglobalgeomatics.com/">Trans Global Geomatics Pvt Ltd.</a></p>
     </footer>
</div>

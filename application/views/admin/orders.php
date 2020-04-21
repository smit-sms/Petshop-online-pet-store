            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Orders</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url()?>Admin/Dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-shopping-cart"></i> Orders</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead align="center">
                                            <tr>
                                                <th>ORDER ID</th>
                                                <th>USER NAME</th>   
                                                <th>PRODUCT ID</th>
                                                <th>PRODUCT NAME</th>                                             
                                            </tr>
                                        </thead>
                                        <tbody align="center">                                
                                            <?php foreach($orders as $data){ ?>
                                                <tr>
                                                    <td><?php echo $data['order_id']; ?></td>
                                                    <td><?php echo $data['first_name']." ".$data['last_name']; ?></td>
                                                    <td><?php echo $data['prod_id']; ?></td>
                                                    <td><?php echo $data['prod_name']; ?></td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()?>assets/adminassets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()?>assets/adminassets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url()?>assets/adminassets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()?>assets/adminassets/demo/datatables-demo.js"></script>        
    </body>
</html>
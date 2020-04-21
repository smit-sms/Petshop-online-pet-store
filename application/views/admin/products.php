            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url()?>Admin/Dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-boxes"></i> Products
                                <button class="btn btn-primary btn-sm" style="float: right;" onclick="window.location.href='<?php echo base_url()?>Admin/Add-Product'"><i class="fas fa-plus"></i> Add new</button>
                            </div>
                            <div class="card-body">
                                <div class="card-deck">
                                    <div class="row row-cols-1 row-cols-md-3">
                                        <?php foreach($prod as $products){?>
                                            <div class="col mb-4">
                                                <div class="card border-dark h-100">
                                                    <div class="card-header border-dark"><b><?php echo strtoupper($products['prod_name']);?></b></div>
                                                    <img src="<?php echo base_url()?>assets/img/<?php echo $products['prod_img'];?>" class="card-img-top" style="height: 300px;">
                                                    <div class="card-body">                                                        
                                                        <h5><p class="card-text"><?php echo $products['prod_desc']; ?></p></h5>
                                                    </div>
                                                    <div class="card-footer border-dark">
                                                        <h4>₹ <?php echo $products['prod_price'];?>
                                                            <button class="btn btn-danger btn-sm" style="float: right" onclick="Deletedata('<?php echo $products['prod_id']?>')" >Delete</button>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
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

<script>
    function Deletedata(prod_id){
        $.post("<?php echo base_url()?>Admin_cont/deleteprod",{
            prod_id:prod_id,
        },function(data){
            alert("Product deleted successfully!");
            window.location.href = "<?php echo base_url()?>Admin/Products";
        });
    }
</script>

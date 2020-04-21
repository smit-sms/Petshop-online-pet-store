            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Sub-Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url()?>Admin/Dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sub-Category</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-tags"></i> Sub-Categories
                                <button class="btn btn-primary btn-sm" style="float: right;" data-toggle="modal" data-target="#ADD"><i class="fas fa-plus"></i> Add new</button>

                                <div class = "modal fade" id = "ADD" tabindex = "-1" role = "dialog" aria-labelledby = "ModalLabel" aria-hidden = "true">
                                    <div class = "modal-dialog" role = "document">
                                        <div class = "modal-content">
                                            <div class = "modal-header">
                                                <h3 class = "modal-title">Add New Sub-Category</h3>
                                                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                                                    <span aria-hidden = "true">&times;</span>
                                                </button>
                                            </div>
                                            <div class = "modal-body">
                                                <form method = "POST" name="addnew" class="addnew">
                                                    <div class = "form-group">
                                                        <label>CATEGORY</label>
                                                        <select class="form-control">
                                                            <option>Select Category</option>
                                                            <?php foreach($cat as $category){?>
                                                                <option name="cat_id" id="cat_id" value="<?php echo $category['cat_id'];?>">
                                                                    <?php echo $category['cat_name'];?>                                  
                                                                </option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class = "form-group">
                                                        <label>NAME</label>
                                                        <input type = "text" class = "form-control" id = "name" name = "name">
                                                    </div>
                                                    <div class = "modal-footer">
                                                        <button type = "submit" name = "save" id="save" class = "btn btn-primary">Save</button>
                                                        <button type = "button" class = "btn btn-secondary" data-dismiss = "modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead align="center">
                                            <tr>
                                                <th>ID</th>
                                                <th>SUB - CATEGORY NAME</th>   
                                                <th>CATEGORY ID</th>
                                                <th>ACTIONS</th>                                             
                                            </tr>
                                        </thead>
                                        <tbody align="center">                                
                                            <?php foreach($subcat as $data){ ?>
                                                <tr>
                                                    <td><?php echo $data['sub_id']; ?></td>
                                                    <td><?php echo $data['sub_name']; ?></td>
                                                    <td><?php echo $data['cat_id']; ?></td>
                                                    <td>
                                                        <input type="button" class="btn btn-danger btn-sm" name="del" id="del" value="delete" onclick="Deletedata('<?php echo $data['sub_id']?>')">
                                                    </td>
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

<script>
    $("#save").on('click',function(){
        var name   = $("#name").val();
        var cat_id = $("#cat_id").val();
        if (name!="" && cat_id!= ""){
            $.post("<?php echo base_url();?>Admin_cont/addsubcat",{
                name:name,
                cat_id:cat_id,
            },function(data){
                window.location.href = "<?php echo base_url()?>Admin/Sub-Category";
            })
        }
        else{
            alert("Please select/fill all fields!");
        }
    });

    function Deletedata(sub_id){
        $.post("<?php echo base_url()?>Admin_cont/deletesubcat",{
            sub_id:sub_id,
        },function(data){
            window.location.href = "<?php echo base_url()?>Admin/Sub-Category";
        });
    }
</script>

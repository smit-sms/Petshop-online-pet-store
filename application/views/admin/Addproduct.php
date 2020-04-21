            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url()?>Admin/Dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url()?>Admin/Products">Products</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-boxes"></i> &nbsp;Add a new product</div>
                            <div class="card-body">
                                <form name="addnew" class="addnew" enctype="multipart/form-data">
                                    <div class = "form-group">
                                        <div class = "row">
                                            <div class="col">
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
                                            <div class="col">
                                                <label>SUB-CATEGORY</label>
                                                <select class="form-control">
                                                    <option>Select Sub-Category</option>
                                                    <?php foreach($subcat as $subcategory){?>
                                                        <option name="sub_id" id="sub_id" value="<?php echo $subcategory['sub_id'];?>">
                                                            <?php echo $subcategory['sub_name'];?>                                  
                                                        </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "form-group">
                                        <label>PRODUCT NAME</label>
                                        <input type = "text" class = "form-control" id = "prod_name" name = "prod_name">
                                    </div>
                                    <div class = "form-group">
                                        <label>PRODUCT DESCRIPTION</label>
                                        <textarea  class = "form-control" id = "prod_descp" name = "prod_descp" rows="3"></textarea>
                                    </div>
                                    <div class = "row">
                                        <div class="col">
                                            <div class = "form-group">
                                                <label>PRODUCT PRICE</label>
                                                <input type = "text" class = "form-control" id = "prod_price" name = "prod_price">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>UPLOAD IMAGE</label>
                                                <input type="file" class="form-control" id="prod_img" name="prod_img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "form-group">
                                        <button type = "submit" name = "save" id="save" class = "btn btn-primary">Add Product</button>
                                    </div>
                                </form>
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
    $("#save").on('click',function()
    {
        var cat_id     = $("#cat_id").val();
        var sub_id     = $("#sub_id").val();
        var prod_name  = $("#prod_name").val();
        var prod_descp = $("#prod_descp").val();
        var prod_price = $("#prod_price").val();
        var prod_img   = $('#prod_img').prop('files')[0];
        
        if(cat_id!= "" && sub_id!= "" && prod_name!= "" && prod_descp!= "" && prod_price!= "" && prod_img!= ""){
            var form_data = new FormData();
            form_data.append("cat_id",cat_id);
            form_data.append("sub_id",sub_id);
            form_data.append("prod_name",prod_name);
            form_data.append("prod_descp",prod_descp);
            form_data.append("prod_price",prod_price);
            form_data.append("prod_img", prod_img);

            // for(let [name, value] of form_data) {
            //     alert(`${name} = ${value}`); // key1=value1, then key2=value2
            // }

            $.ajax({
                url: "<?php echo base_url('Admin_cont/addprod');?>",
                dataType: "json", 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: "POST",
                success: function (data) {
                    alert("Successfully added the new product!");
                },
                error: function (response) {
                    alert("Error in adding the product. PLease try again.");  
                    window.loaction.href="<?php echo base_url()?>Admin/Add-product";
                }
            }); 
        }
        else{
            alert("All fields mandatory, Please fill again.");
            window.loaction.href="<?php echo base_url()?>Admin/Add-product";
        }
    });

</script>

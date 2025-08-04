<?php
session_start();

require_once "../classes/User.php";

$edit_obj = new User;
$edit     = $edit_obj->getObject();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editproduct</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css -->
    <link rel="stylesheet" href="../assets/css/style.css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid w-25 mt-5">

            <div class="card-body">
                <div class="card-header y text-light text-center bg-transparent border-0">
                <h1 class="text-warning"><i class="fa-solid fa-pen-to-square"></i> Edit Product</h1>
            </div>
                <form action="../actions/edit-product.php?id=<?=$edit['id']?>" method="post">
                    <!-- ../actions/edit-product.phpに、?=$edit['id']?>の情報を持ったまま飛べる$editはgetObjectで入手したDBの情報１行目を持っている-->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="" class="form-label text-secondary">Product Name</label>
                            <input type="text" value="<?=$edit['product_name']?>" class="form-control" name="product_name" >
                        </div>

                    </div>    

                    <div class="row mb-3">
                        <div class="col">
                            <label for="" class="form-label text-secondary">Price</label>
                            <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" name="price" value="<?=$edit['price']?>" class="form-control" >
                                </div>
                        </div>
                        <div class="col">
                            <label for="" class="form-label text-secondary">Quantity</label>
                            <input type="number" class="form-control" value="<?=$edit['quantity']?>" name="quantity" >
                        </div>
                    </div>    

                    <input type="submit" name="Edit_btn" value="Edit" class="btn btn-warning w-100">
                    <!-- value="Log in" 文字入れたいだけ -->

                </form>

            </div>
    
    </div>






</body>
</html>




<?php
session_start();

require_once "../classes/User.php";

$product_obj = new User;
$all_products =$product_obj->getAllProducts();

//$all_users is an object containing all the users from the users table
//→テーブルつくる

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css -->
    <link rel="stylesheet" href="../assets/css/style.css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand navbar-light " style="margin-bottom:80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <i class="fa-solid fa-house-chimney"></i>
            </a>
            <div class="navbar-nav mx-auto">
                <span class="navbar-text">Welcome <?=$_SESSION['username']?> </span>
                
            </div>

            <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0"><i class="fa-solid fa-user-xmark"></i></button>
                </form>
        </div>
    </nav>

    <!-- Users　List -->
    <main class="row justify-content-center gx-0">
        <div class="col-6">
            <h2 class="text-start">Product List 
                <a href="#" class="btn  btn-border-0 " title="Add" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="text-info fa-solid fa-plus fa-2x"></i>
                </a>
            </h2>
           
         <?php
        if($all_products->num_rows !=0){
          ?>
            <table class="table table-hover align-middle">
                <thead>
                    <tr class="bg-dark text-light">
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th><!-- for action buttons --></th>
                        <th><!-- for casher --></th>
                    </tr>
                </thead>

                    <tbody>
                        <?php
                        while($product = $all_products->fetch_assoc()){
                        ?>
                        <!-- allGetsの全れるの情報を１行ずつ表示 -->

                            <tr class="bg-dark text-light">
                                
                                <td><?=$product ['id']?></td>
                                <td><?=$product ['product_name']?></td>
                                <td><?=$product ['price']?></td>
                                <td><?=$product ['quantity']?></td>
                                <td>
                                 
                                        <a href="edit-product.php?id=<?=$product['id']?>" 
                                        
                                        class="btn btn-outline-warning" title="Edit">
                                        <!--?id=→それぞれのボタンに番号振って、この商品のidに対応したボタンを1つ1つ作成している感じ。$_GET とセット。→次の行先edit-product.phpにidの情報を引き継ぐ(idの情報はgetAllProductsからもらって、whileで1つずつ表示されている）-->
                                        <!-- 表示されている編集ページは見た目は同じだが、idがそれぞれ振られている＝違うページ その商品専用ページに！-->
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <a href="../actions/delete-product.php?id=<?=$product['id']?>" class="btn btn-outline-danger" title="Delete">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </a>

                                   
                                </td>
                                <td>
                                    <a href="../views/buy-product.php?id=<?=$product['id']?>" class="btn btn-outline-success">
                                        <!-- 一旦viewに飛ばす。
                                         後でアクション "../actions/buy-product.php?id=?=$product['id']?>-->
                                        <i class="fa-solid fa-cash-register"></i>
                                    </a>
                                    
                                </td>
                                
                            </tr>

                            <?php } ?>
                    </tbody>
            </table>

            <?php
              } else {
            ?>
                <div class="bg-dark text-danger text-center">
                        <h2>No Records found</h2>
                        <i class="fa-regular fa-circle-xmark fa-10x mb-2"></i>
                </div>

            <?php } ?>

        </div>



    </main>

    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">

      


    <div class="container-fluid">

            <div class="card-body">
                <div class="card-header y text-light text-center bg-transparent border-0">
                <h1 class="text-info"><i class="fa-solid fa-boxes-stacked text-info"></i> Add Product</h1>
            </div>
                <form action="../actions/addproduct.php" method="post">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="" class="form-label text-secondary">Product Name</label>
                            <input type="text" class="form-control" name="product_name" >
                        </div>

                    </div>    

                    <div class="row mb-3">
                        <div class="col">
                            <label for="" class="form-label text-secondary">Price</label>
                            <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" name="price" class="form-control" >
                                </div>
                        </div>
                        <div class="col">
                            <label for="" class="form-label text-secondary">Quantity</label>
                            <input type="number" class="form-control" name="quantity" >
                        </div>
                    </div>    

                        
                    </div>

                    <input type="submit" name="Add_btn" value="Add" class="btn btn-info w-100">
                    <!-- value="Log in" 文字入れたいだけ -->

                </form>

            </div>
    
    </div>
</body>
</html>
<?php
require_once "Database.php";//import Database class

class User extends Database{

    //CREATE
    // store all data of the user in the database
    public function store($request){//request is equal to $_POST
        $first_name = $request['first_name'];
        $last_name  =$request['last_name'];
        $username   =$request['username'];
        $password   =$request['password'];
        //$requestは何でもおk

        $password = password_hash($password,PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (`first_name`,`last_name`,`username`,`password`)
                VALUES('$first_name','$last_name','$username','$password')";

        if($this->conn->query($sql)){
            header('location:../views');//go to index.php
            exit;                       //same die

        }else{
            die('Error creating the user'.$this->conn->error);
        }
    }

    //READ
    //authenticate the login details
    public function login($request){
        $username = $request['username'];
        $password = $request['password'];

        $sql = "SELECT*FROM users WHERE username ='$username'";

        $result = $this->conn->query($sql);
        // print_r($result);この時点では読み辛い

        //1.Check the users
        if($result->num_rows == 1){
            //2.Check if the password is correct
            $user = $result->fetch_assoc();//transforms the data from the database into associative array
            // print_r($user);fetchのおかげで読みやすくなってる
            // Array ( [id] => 3 [first_name] => Naoki [last_name] => Uto [username] => naoki [password] => $2y$10$8trOGusFnbU9JuggzCBS1ueWSlY3h1ylmD9NQIqs7lmiBjp2h2696 [photo] => )

            if(password_verify($password,$user['password'])){
                //Create session variables for future use
                session_start();
                $_SESSION['id']             = $user['id'];
                $_SESSION['username']       = $user['username'];
                $_SESSION['full_name']      = $user['first_name']." ".$user['last_name'];

                header('location: ../views/dashboard.php');
                exit;
            }else{
                die('Password is inccorect');
            }
        }else{
            die('Username not found.');
        }
    }
    //Add items

    public function add($request){//request is equal to $_POST
        $product_name = $request['product_name'];
        $price        =$request['price'];
        $quantity     =$request['quantity'];

        $sql = "INSERT INTO products (`product_name`,`price`,`quantity`)
                VALUES('$product_name','$price','$quantity')";

        if($this->conn->query($sql)){
            header('location:../views/dashboard.php');//go to index.php
            exit;                       //same die

        }else{
            die('Error creating the product'.$this->conn->error);
        }
    }


    //logouts the user and remove user details

    public function logout(){
        session_start();
        session_unset();//remove session start
        session_destroy();//stop all session start

        header('location: ../views');
        exit;
    }

    //READ
    //retrieve all users from the database

    public function getAllproducts(){
        $sql = "SELECT * FROM products";

        if($result = $this->conn->query($sql)){
            return $result;

        }else{
            die('Error retrieving all users:'.$this->conn->error);
        }
    }

    //READ
    //get the details of the logged in user
    public function getObject(){
        $id=$_GET['id'];

        $sql = "SELECT* FROM products WHERE id =$id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();//expecting one record
        }else{
            die('Error retrieving the object; ' .$this->conn->error);
        }
    }

    //UPDATE
    //update user details
    public function update($request){
        //$request₌変数₌上のカッコの中に書かないと動かない　
        // 変数＝その値が何なのか定義されてないもの
        //下で教えてあげる
        $id           =$_GET['id'];
        // ?id=**で入手した情報→$id
        $product_name =$request['product_name'];
        $price        =$request['price'];
        $quantity     =$request['quantity'];
        

        $sql= "UPDATE products
               SET 
                  product_name = '$product_name',
                   price = '$price',
                   quantity ='$quantity'
               WHERE id =$id";

        if($this->conn->query($sql)){
            header('location:../views/dashboard.php');
            // ダッシュボードのリンクでアクションに飛ぶ、アクションに飛んでこのファンクションが呼ばれる→ファンクション内で機能実行＆元来た場所に戻る☆
            exit;
        }else{
            die('Error updating the user:'. $this->conn->error);
        }
    }

    //DELETE
       public function delete(){
        $id = $_GET['id'];

        $sql= "DELETE FROM products WHERE id =$id";
        
        if($this->conn->query($sql)){
           header('location:../views/dashboard.php');
            exit;
        }
    }

    public function quantity($request){
        $_SESSION['buy_quantity'] = $request['buy_quantity'];
        //ポストされたbuy_quantity＝$_SESSION['buy_quantity'
        
    }

    
}
?>
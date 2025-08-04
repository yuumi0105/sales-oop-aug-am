<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div style="height:100vh;">
        <div class="row h-100 m-0">
              <div class="card w-25 mx-auto my-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center text-primary">LOGIN<i class="fa-solid fa-right-to-bracket"></i></h1>
                </div>

                <div class="card-body">
                    <form action="../actions/login.php" method="post">
                        <!-- Bold to add emphasis -->
                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="username" class="form-label fw-bold text-secondary pt-2">Username</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="username" id="username" class="form-control " placeholder="USERNAME" autofocus required>
                            </div>
                            
                        </div>


                        <div class="row mb-5">
                            <div class="col-3">
                                    <label for="password" class="form-label fw-bold text-secondary pt-2">Password</label>
                            </div>

                            <div class="col-9">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Log in</button>
                        <div class="text-center">
                            <button type="button" class="btn btn-danger  mt-2 " data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Create an Account
                            </button>
                        </div>

                    </form>


                    


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid">
        

            <div class="card-body">
                <div class="card-header y text-light text-center bg-transparent border-0">
                <h1 class="text-danger"><i class="fa-solid fa-user-plus text-danger"></i>Registration</h1>
            </div>
                <form action="../actions/register.php" method="post">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" >
                        </div>

                        <div class="col">
                            <label for="" class="form-label">Last name</label>
                            <input type="text" class="form-control" name="last_name" >
                        </div>
                    </div>    

                    <div class="row mb-3">
                        <div class="col">
                            <label for="" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" >
                        </div>
                    </div>    

                        <div class="col">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" >

                        </div>
                    </div>

                    <input type="submit" name="Register_btn" value="Register" class="btn btn-danger w-100">
                    <!-- value="Log in" 文字入れたいだけ -->

                </form>

            </div>
    
    </div>


    
</body>


</html>

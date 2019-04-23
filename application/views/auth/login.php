<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coffe Break - Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/')?>vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url('assets/')?>img/favicon.png?3">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page-holder d-flex align-items-center">


      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="<?= base_url('assets/')?>img/illustration.svg" alt="" class="img-fluid"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">Coffe Break</h1>
            <h2 class="mb-4">Welcome back!</h2>
            <?php if($this->session->flashdata('success')){ ?>  
             <div class="alert alert-success">  
               <a href="<?= base_url('logout')?>" class="close">&times;</a>
               <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>  
             </div> 
           <?php }?>
           <?php if($this->session->flashdata('errors')){ ?>  
             <div class="alert alert-danger">  
               <a href="#" class="close" data-dismiss='alert'>&times;</a>
               <strong>Errors!</strong> <?php echo $this->session->flashdata('errors'); ?>  
             </div> 
           <?php }?>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
            <form action="<?= base_url('auth/login')?>" id="loginForm" method="post" class="mt-4">
              <div class="form-group mb-4">
                <input type="text" name="username" placeholder="Username" class="form-control border-0 shadow form-control-lg">
              </div>
              <div class="form-group mb-4">
                <input type="password" name="password" placeholder="Password" class="form-control border-0 shadow form-control-lg text-violet">
              </div>
              <div class="form-group mb-4">
                <div class="custom-control custom-checkbox">
                  <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                  <label for="customCheck1" class="custom-control-label">Remember Me</label>
                </div>
              </div>
            <div class="row">
                <div class="col">
                  <button type="submit" class="btn btn-info btn-block shadow px-5">Log in</button>
                </div>
              </div>
            </form>
              <hr>
              <div class="row">
	            <div class="col">
	              <button  type="button" data-toggle="modal" data-target="#register" class="btn btn-danger btn-block shadow px-5">Register</button>
	              <div id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
		            <div role="document" class="modal-dialog">
		              <div class="modal-content">
		                <div class="modal-header">
		                  <h4 id="exampleModalLabel" class="modal-title">Register</h4>
		                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
		                </div>
		                <form action="<?= base_url('auth/register') ?>" method="post">
		                <div class="modal-body">
		                    <div class="row">
		                      <div class="col">
		                        <div class="form-group">
		                        <label>Firstname</label>
		                        <input id="inlineFormInput" type="text" name="firstname" placeholder="Jane" class="mr-3 form-control" value="" required>
		                        </div>
		                      </div>
		                      <div class="col">
		                        <div class="form-group">
		                        <label>Lastname</label>
		                        <input id="inlineFormInputGroup" type="text" name="lastname" placeholder="Doe" class="mr-3 form-control" value="" required>
		                        </div>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label>Username</label>
		                      <input type="text" name="username" placeholder="Username" class="form-control" value="" required>
		                    </div>
		                    <div class="form-group">
		                      <label>Email</label>
		                      <input type="email" name="email" placeholder="Email Address" class="form-control" value="" required>
		                    </div>
		                    <div class="form-group">  
		                      <label>Password</label>
		                      <input type="password" name="password" placeholder="Password" class="form-control" required>
		                    </div>
	                        <div class="form-group row">
	                        <label class="col-md-3 form-control-label">Gender</label>
	                        <div class="col-md-9">
	                          <div>
	                            <input id="optionsRadios1" type="radio" value="L" name="gender" required>
	                            <label for="optionsRadios1">Male</label>
	                          </div>
	                          <div>
	                            <input id="optionsRadios2" type="radio" value="P" name="gender" required>
	                            <label for="optionsRadios2">Female</label>
	                          </div>
	                        </div>
	                      </div>
		                  
		                </div>
		                <div class="modal-footer">
		                  <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
		                  <button type="submit" class="btn btn-primary">Register</button>
		                </div>
			           </form>
		              </div>
		            </div>
		          </div>
	            </div>
	        </div>
            </form>
          </div>
        </div>
        <p class="mt-5 mb-0 text-gray-400 text-center">Design by <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400">Bootstrapious</a> & Your company</p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                 -->
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?= base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/')?>vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?= base_url('assets/')?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/')?>vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?= base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="<?= base_url('assets/')?>js/front.js"></script>
  </body>
</html>
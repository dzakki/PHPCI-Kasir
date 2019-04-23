<section class="py-5">
	<div class="row">
		<div class="col-lg-8 mb-5">
			<div class="card">
	          <div class="card-header">
	            <h6 class="text-uppercase mb-0">Profile</h6>
	          </div>
	          <form action="<?=base_url('user/update')?>" method="post">
	          <div class="modal-body">
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                    <label>Firstname</label>
                    <input type="hidden" name="id" value="<?= $_SESSION['user_id']?>">
                    <input id="inlineFormInput" type="text" name="firstname" placeholder="Jane" class="mr-3 form-control" value="<?= $_SESSION['first_name']?>" required>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                    <label>Lastname</label>
                    <input id="inlineFormInputGroup" type="text" name="lastname" placeholder="Doe" class="mr-3 form-control" value="<?= $_SESSION['last_name']?>" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" placeholder="Username" class="form-control" value="<?= $_SESSION['username']?>" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" placeholder="Email Address" class="form-control" value="<?= $_SESSION['email']?>" required>
                </div>
                <div class="form-group row">
                <label class="col-md-3 form-control-label">Gender</label>
                <div class="col-md-9">
                  <div>
                    <input id="optionsRadios1" type="radio" value="L" name="gender"  required <?php if ($_SESSION['gender'] == "L") echo 'checked';  ?>>
                    <label for="optionsRadios1">Male</label>
                  </div>
                  <div>
                    <input id="optionsRadios2" type="radio" value="P" name="gender" required <?php if ($_SESSION['gender'] == "P") echo 'checked';  ?>>
                    <label for="optionsRadios2">Female</label>
                  </div>
                </div>
              </div>
            </div>
	          <div class="card-footer">
	          	<button class="btn btn-warning" type="submit"></button>
	          </form>	
	          </div>
	          
	        </div>
		</div>
		<div class="col-lg-4 mb-5">
			<div class="card">
	          <div class="card-header">
	            <h6 class="text-uppercase mb-0">Change Password</h6>
	          </div>
	          <form action="<?=base_url('user/change_password')?>" method="post">
	          <div class="modal-body">
	          	<div class="form-group">  
                  <label>Password old</label>
                  <input type="password" name="password" placeholder="Password" class="form-control" required>
                </div>
                <div class="form-group">  
                  <label>New Password</label>
                  <input type="password" name="password_new" placeholder="Password" class="form-control" required>
                </div>
				<div class="form-group">  
                  <label>New Password Confirm</label>
                  <input type="password" name="password_verify" placeholder="Password" class="form-control" required>
                </div>      
              </div>
	          <div class="card-footer">
	          	<button class="btn btn-warning" type="submit"></button>
	          </form>	
	          </div>
		</div>
	</div>
</section>
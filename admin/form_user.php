<?php require_once('include/startup.php'); ?>
<?php require_once('library/form_user_lib.php'); ?>
<?php require_once('common/head_start.php'); ?>
<?php require_once('common/head_end.php'); ?>
<?php require_once('common/navbar.php'); ?>
<?php require_once('common/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div><!-- /.col -->
		  
		  
		  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			<?php showAlert(); ?>
			</div>
		</div>
	</div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Please provide following information.</h3>
                <div class="card-tools">
                  <a href="manage_users.php" class="btn btn-tool btn-sm">
                    <i class="fas fa-reply"></i> Cancel
                  </a>
                </div>
              </div>
              <form method="POST" action="" role="form" id="quickForm">
                <div class="card-body">
                  <div class="row">
					<div class="col-sm-6">
					  <div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" value="<?php echo $data['username']; ?>">
					  </div>
					  <div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
					  </div>
					  <div class="form-group">
						<label for="confirm">Confirm Password</label>
						<input type="password" name="confirm" class="form-control" id="confirm" placeholder="Enter Confirm Password">
					  </div>
					</div>
					<div class="col-sm-6">
					  <div class="form-group">
						<label for="fullname">Fullname</label>
						<input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter Fullname"  value="<?php echo $data['fullname']; ?>">
					  </div>
					  <div class="form-group">
						<label for="email">Email address</label>
						<input type="email" name="email" class="form-control" id="email" placeholder="Enter email"  value="<?php echo $data['email']; ?>">
					  </div>
					  <div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone" value="<?php echo $data['phone']; ?>">
					  </div>
					</div>
				  </div>
                  
                  <div class="form-group">
					<div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" value="1" name="status" id="status"  <?php echo ($data['status'] == '1')?'checked="checked"':''; ?>>
                      <label class="custom-control-label" for="status"> Status</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php require_once('common/footer.php'); ?>
<?php require_once('common/script.php'); ?>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function (form) {
		form.submit();
      //alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
	  confirm: {
		equalTo: $('#password')
	  },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
	  confirm: {
		equalTo: "Confirm password not matched!"  
	  },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
<?php require_once('common/body_ends.php'); ?>




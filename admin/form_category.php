<?php require_once('include/startup.php'); ?>
<?php require_once('library/form_category_lib.php'); ?>
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
              <form method="POST" action="" role="form" id="quickForm" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
					<div class="col-sm-6">
					  <div class="form-group">
						<label for="category_name">Select Parent</label>
						<select name="parent_id" id="parent_id" class="form-control">
							<option value=""></option>
							
							<?php echo displayCategories($conn); ?>
							
							
						</select>
						
					  </div>
					  
					  <div class="form-group">
						<label for="category_name">Category Name</label>
						<input type="text" name="category_name" class="form-control" id="category_name" placeholder="Enter Category Name" value="<?php echo $data['category_name']; ?>">
					  </div>
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




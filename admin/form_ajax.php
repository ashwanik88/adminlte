<?php require_once('include/startup.php'); ?>
<?php require_once('library/form_ajax_lib.php'); ?>
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
						<label for="first_number">First Number</label>
						<input type="text" name="first_number" class="form-control" id="first_number" placeholder="Enter First Number" value="<?php echo $first_number; ?>">
						
					  </div>
					  
					  <div class="form-group">
						<label for="second_number">Second Number</label>
						<input type="text" name="second_number" class="form-control" id="second_number" placeholder="Enter Second Number" value="<?php echo $second_number; ?>">
					  </div>
					  <div class="form-group">
						<label for="Result">Result</label>
						<input type="text" name="result" class="form-control" id="result" placeholder="Enter Result"  readonly="readonly">
					  </div>
					</div>
					</div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
				  <i class="fa fa-spinner fa-spin d-none"></i>
                  <button type="submit" class="btn btn-primary btnSubmit">Submit</button>
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
<script type="text/javascript">
$('#quickForm').submit(function(){
	
	$.ajax({
		url: 'form_ajax.php',
		type: 'POST',	// get | post
		dataType: 'JSON',	// html | json
		data: {
			first_number: $('input[name="first_number"]').val(),
			second_number: $('input[name="second_number"]').val(),
		},
		success: function(resp){
			if(resp.success){
				$('#result').val(resp.result);
			}
			
			alert(resp.msg);
			
		},
		beforeSend: function(){
			$('.fa-spinner').removeClass('d-none');
			$('#quickForm input').attr('disabled', true);
		},
		complete: function(){
			$('.fa-spinner').addClass('d-none');
			$('#quickForm input').attr('disabled', false);
		},
		error: function(){
			
		}
	})
	
	return false;
});
</script>
<?php require_once('common/body_ends.php'); ?>




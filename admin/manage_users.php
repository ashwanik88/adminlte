<?php require_once('include/startup.php'); ?>
<?php require_once('library/manage_users_lib.php'); ?>
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
                <h3 class="card-title">Products</h3>
                <div class="card-tools">
                  <a href="form_user.php" class="btn btn-tool btn-sm">
                    <i class="fas fa-plus"></i> Add New User
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th><input type="checkbox" onclick="$('.chk').attr('checked', $(this).is(':checked'));" /></th>
                    <th><a href="manage_users.php?sort=user_id&order=<?php echo $order; ?>">User ID </a></th>
                    <th><a href="manage_users.php?sort=username&order=<?php echo $order; ?>">Username </a></th>
                    <th>Fullname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Date Added</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php if(sizeof($data)){ ?>
				  <?php foreach($data as $row){ ?>
				  <tr>
					<td><input type="checkbox" class="chk" name="user_ids" value="<?php echo $row['user_id'] ?>" /></td>
                    <td><?php echo $row['user_id'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['fullname'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['date_added'] ?></td>
                    <td><?php echo ($row['status'])?'Active':'Inactive'; ?></td>
                    
                    <td>
                      <a href="form_user.php?user_id=<?php echo $row['user_id'] ?>" class="text-muted">
                        <i class="fas fa-edit"></i>
                      </a>
                    </td>
                  </tr>
				  <?php }?>
				  <?php }else{ ?>
				  <tr>
                    <td colspan="4">No Record Found!</td>
                  </tr>
				  <?php } ?>
                  
                  </tbody>
                </table>
				
<nav aria-label="Page navigation example">
  <ul class="pagination">
  <?php $npages = ceil($page_total/$pagesize); ?>
  <?php if($npages > 0){ for($n = 1; $n <= $npages; $n++){ ?>
    <li class="page-item <?php echo ($cur_page == $n)?'active':'';?>"><a class="page-link" href="manage_users.php?page=<?php echo $n; ?>"><?php echo $n; ?></a></li>
  <?php } } ?>  
  </ul>
</nav>
				
              </div>
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
<?php require_once('common/body_ends.php'); ?>




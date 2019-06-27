<?php
require_once 'partials/head.php';
require_once 'partials/preloader.php';
?>

    <div id="main-wrapper">
        <?php require_once 'partials/topbar.php'; ?>
        <?php require_once 'partials/left-sidebar.php'; ?>
        
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <?php if(get_session('success')) { ?>
                <div class="alert alert-success">
                    <?php echo get_session('success') ?>
                    <?php session('success',NULL) ?>
                </div>
                <?php } ?>
                <a href="/users/add" class="btn btn-success mt-4 mb-4">Add</a>

    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $user) {  ?>
            <tr>
                <td><?php echo $user->id ?></td>
                <td><?php echo $user->name ?></td>
                <td> <?php echo \App\Models\Userextra::find($user->userextra_id)->phone ?></td>
                <td><?php echo $user->email ?></td>
                <td><?php echo \App\Models\Role::find($user->role_id)->title ?></td>
                <td>

                    <a href="users/user/<?php echo $user->id; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>

                    <a href="javascript:void(0)" class="delete-item"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
        <?php  } ?>
            </tbody>
        </table>
    </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
<?php require_once 'partials/footer.php'; ?>
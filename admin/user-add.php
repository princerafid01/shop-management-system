<?php
require_once 'partials/head.php';
require_once 'partials/preloader.php';
?>

    <div id="main-wrapper">
        <?php require_once 'partials/topbar.php'; ?>
        <?php require_once 'partials/left-sidebar.php'; ?>
        <div class="page-wrapper">
        
        <?php if(get_session('errors')) { ?>
        <div class="alert alert-danger">
            <?php foreach (get_session('errors') as $error) { ?>
                <li><?php echo $error; ?></li>
                <?php echo session('errors',NULL) ?>

            <?php } ?>
        </div>
        <?php } ?>

        <div class="container-fluid">
        <div class="d-flex  flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add User</h1>
        </div>
    <div class="row">
        <div class="col-xs-10 col-md-6">
            <form action="/users/create" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['fields']['name'] ?? ''; ?>" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $_SESSION['fields']['email'] ?? ''; ?>">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="<?php echo $_SESSION['fields']['phone'] ?? ''; ?>">
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control">
                        <?php foreach($data['roles'] as $role) { ?>
                            <option value="<?php echo $role->id; ?>" <?php 
                            echo ($_SESSION['fields']['role'] == $role->id) ? 'selected':''; ?>
                            ><?php echo $role->title; ?></option>
                        <?php } ?>
                        <?php echo session('fields',NULL) ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password">
                </div>


                <a class="btn btn-danger" href="/users">Back</a> <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php require_once 'partials/footer.php'; ?>
<?php include "header.php"; ?>
<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">


    <!-- Links -->
    <ul class="navbar-nav">

        <li class="text-right">
            <a href="<?php echo base_url(); ?>login/logout">
            <button type="button" class="btn">Logout</button>
            </a>

        </li>
    </ul>

</nav>
<div class="container">
    <h2>Profile</h2>

    <form action="/action_page.php" class="was-validated">
        <div class="row">
            <div class='col-md-6'>
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" value="<?php echo $user_detail['user_name']; ?>">
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pswd" value="<?php echo $user_detail['address']; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-md-6'>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" value="<?php echo $user_detail['user_email']; ?>">
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pswd" value="<?php echo $user_detail['address']; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-md-6'>
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" value="<?php echo $user_detail['mobile_no']; ?>">
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group">
                    <label>Profile</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pswd" value="<?php echo $user_detail['profile_name']; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-md-6'>
                <div class="form-group">
                    <label>Gender</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pswd" value="<?php echo $user_detail['gender']; ?>">
                </div>
            </div>
        </div>

    </form>
</div>

<?php include "footer.php"; ?>
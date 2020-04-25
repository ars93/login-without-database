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
    <h2>All User </h2>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Mobile No</th>
                <th>Email</th>
                <th>Profile</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if ($all_user_detail != NULL) {
                foreach ($all_user_detail as $user_detail) {
                    ?>
                    <tr>
                        <td><?php echo $user_detail['user_name']; ?></td>
                        <td><?php echo $user_detail['mobile_no']; ?></td>
                        <td><?php echo $user_detail['user_email']; ?></td>
                        <td><?php echo $user_detail['profile_name']; ?></td>
                        <td>
                            <?php if ($user_detail['active'] == 1) { ?>
                                <span class="badge badge-success">Active</span>
                            <?php } else { ?>
                                <span class="badge badge-danger">InActive</span>
                            <?php } ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success" onclick="show_single_user('<?php echo $user_detail['user_email']; ?>')">Edit</button>
                            <?php if ($user_detail['active'] == 1) { ?>
                                <button type="button" class="btn btn-warning" onclick="delete_user('<?php echo $user_detail['user_email']; ?>')">Inactive</button>
                            <?php } else { ?>
                                <button type="button" class="btn btn-info" onclick="active_user('<?php echo $user_detail['user_email']; ?>')">Active</button>
                            <?php } ?>
                        </td>


                    </tr>
                    <?php
                }
            }
            ?>

        </tbody>

    </table>
</div>
<!-- The Modal -->
<div class="modal fade" id="show_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">User Detail</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" id="update_form" action="<?php echo base_url(); ?>admin/update_user">
                    <div class="row">
                        <div class='col-md-6'>
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" class="form-control" id="edit_uname" placeholder="Enter username" name="edit_uname" value="">
                                <input type="hidden" id="uniq_email" name="uniq_email">
                            </div>
                        </div>

                        <div class='col-md-6'>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" id="edit_address" placeholder="Enter password" name="edit_address" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-6'>
                            <div class="form-group">
                                <label>Mobile no:</label>
                                <input type="text" class="form-control" id="edit_mobile_no" placeholder="Enter username" name="edit_mobile_no" value="">
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class="form-group">
                                <label>Profile</label>
                                <input type="text" class="form-control" id="edit_profile" placeholder="Enter password" name="edit_profile" value="" disabled="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-6'>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" class="form-control" id="edit_email" placeholder="Enter username" name="" value="" disabled>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="text" class="form-control" id="edit_password" placeholder="Enter username" name="edit_password" value="">
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="update_user()">Update</button>
            </div>

        </div>
    </div>
</div>

<script>
    function show_single_user(email) {
        $.ajax({
            type: 'post',
            datatype: 'json',
            url: '<?php echo base_url(); ?>admin/get_single_user',
            data: {id: email},

            success: function (msg) {
                user_data = JSON.parse(msg);
                $('#edit_uname').val(user_data['user_name']);
                $('#edit_address').val(user_data['address']);
                $('#edit_mobile_no').val(user_data['mobile_no']);
                $('#edit_profile').val(user_data['profile_name']);
                $('#uniq_email').val(user_data['user_email']);
                $('#edit_email').val(user_data['user_email']);
                $('#edit_password').val(user_data['password']);
                $('#show_modal').modal();
            }
        }
        );
    }
    function delete_user(email) {
        $.ajax({
            type: 'post',
            datatype: 'json',
            url: '<?php echo base_url(); ?>admin/delete_user',
            data: {id: email},
            success: function (msg) {
                location.reload();
            }
        }
        );
    }
    function active_user(email) {
        $.ajax({
            type: 'post',
            datatype: 'json',
            url: '<?php echo base_url(); ?>admin/active_user',
            data: {id: email},
            success: function (msg) {
                location.reload();
            }
        }
        );
    }
    function update_user() {
        $('#update_form').submit();
    }
</script>
<?php include "footer.php"; ?>
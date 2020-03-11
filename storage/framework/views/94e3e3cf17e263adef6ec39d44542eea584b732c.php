<?php $__env->startSection('content'); ?>

  <section class=form-login>
    <div class="container">
        <div class="row ">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                          <h4 class="text-center">Reset Password</h4>
                    </div>
                    <div class="card-body">
                        <form >
                            <?php echo csrf_field(); ?>
 
                            <?php if (Session::has('success')) { ?>
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
                                <?php echo Session::get('success') ?>
                            </div>
                            <?php } ?>
                        
                            <?php if (Session::has('error')) { ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
                                <?php echo Session::get('error') ?>
                            </div>
                            <?php } ?>
                        
                        
                            <?php if ($errors->any()) { ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($errors->all() as $error) { ?>
                                    <li><?= $error ?></li>
                                    <?php }
                                    ?>
                                </ul>
                            </div>
                            <?php } ?>



                            <div class="form-group">
                                <label for="forgot_password_email">Email</label>
                                <input type="email" name="email" id="forgot_password_email" class="form-control">
                            </div>

                          <a href="<?php echo e(route('check_email_page')); ?>" class="nav-link text-dark">Reset Password</a>
                          <button type="submit" class="btn btn-dark btn-block" id="bt_forgot_password">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('javascript'); ?>
<script>
    $('#bt_forgot_password').click(function (event) {
            event.preventDefault();
            var email = $('#forgot_password_email').val();
            $.ajax({
                url: "<?php echo e(route('user.forgot.password')); ?>",
                data: {
                    '_token': "<?php echo e(csrf_token()); ?>",
                    email: email,
                },
                type: "POST",
                success: function (data) {
                   
                    if (data.status) {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'green');
                    $('#notifDiv').text('Email Sent Successfully');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                    } else {
                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'red');
                        $('#notifDiv').text('Email Not Found');
                         setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                    }
                },
                error: function (err) {
                    showCustomError('Something went Wrong!')
                }
            });
        });
     
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\complete_auth\resources\views/check_reset_email.blade.php ENDPATH**/ ?>
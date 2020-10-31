<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container mt-4">
    <section class="container-fluid">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-6">
                
                <form class="form-container">
                    <?php echo csrf_field(); ?>
                    <h2 class="text-center bg-dark p-2 text-white">Add Users Listing</h2>
                    <div class="form-group">
                      <label for="">Business Name</label>
                      <input type="text" name="business_name" class="form-control" id="business_name" placeholder="Enter Business Name">
                    </div>
                    <div class="form-group">
                      <label for="business_email">Business Email</label>
                      <input type="text" name="business_email" class="form-control" id="business_email" placeholder="Enter Business Email">
                    </div>
                    <div class="form-group">
                        <label for="business_phone">Business Phone</label>
                        <input type="text" class="form-control" name="business_phone" id="business_phone" placeholder="Enter Business Phone">
                      </div>
                      <div class="form-group">
                        <label for="business_web">Business Website</label>
                        <input type="text" name="business_web" class="form-control" id="business_web" placeholder="Enter Business Website">
                      </div>
                    <button type="submit" class="btn btn-dark btn-block save_btn">Submit</button>
                  </form>

            </section>
        </section>
    </section>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
<script>
  $(document).ready(function () {
      $('.save_btn').on('click', function (e) {
          var business_name          = $('#business_name').val();
          var business_email         = $('#business_email').val();
          var business_phone         = $('#business_phone').val();
          var business_web           = $('#business_web').val();


          var form = $(this).parents('form');
          console.log(form);
          $(form).validate({
              rules: {
                  business_name: {
                      required: true,
                  },
                  business_email: {
                      required: true,
                      email: true,
                  },
                  business_phone: {
                      required: true,
                  },
                  business_web: {
                      required: true,
                  },
              },
              messages: {
                  business_name: "Business Name is required.",
                  business_phone: "Business Phone is required.",
              },
       
              submitHandler: function () {
      
                  var formData = new FormData(form[0]);
                  $.ajax({
                      type: 'POST',
                      url: 'save_business',
                      data: formData,
                      processData: false,
                      contentType: false,
                      success: function (data) {
                      
                          console.log(data);
                          if (data.status) {
                            $('#notifDiv').fadeIn();
                            $('#notifDiv').css('background', 'green');
                            $('#notifDiv').text('Business listing created successfully');
                            setTimeout(() => {
                                $('#notifDiv').fadeOut();
                            }, 3000);
                                $('[name="business_name"]').val('');
                                $('[name="business_email"]').val('');
                                $('[name="business_phone"]').val('');
                                $('[name="business_web"]').val('');
                          } else {
                            $('#notifDiv').fadeIn();
                            $('#notifDiv').css('background', 'red');
                            $('#notifDiv').text('An error occured. Please try later');
                            setTimeout(() => {
                                $('#notifDiv').fadeOut();
                            }, 3000);
                          }
                      },
                      error: function (err) {
                        console.log(err);
                      }
                  });
              }
          });
      });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Profile-Update-Complete-Flow\resources\views/dashboard.blade.php ENDPATH**/ ?>
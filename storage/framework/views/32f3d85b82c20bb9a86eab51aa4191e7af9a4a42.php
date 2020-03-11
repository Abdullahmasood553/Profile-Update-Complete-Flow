<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container mt-4">
    <section class="container-fluid">
        <section class="row justify-content-center">
            
            <section class="col-12 col-sm-6 col-md-6">
                
                <form class="form-container">
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
                        <input type="text" class="form-control" id="business_phone" placeholder="Enter Business Phone">
                      </div>
                      <div class="form-group">
                        <label for="">Business Website</label>
                        <input type="business_web" class="form-control" id="business_web" placeholder="Enter Business Website">
                      </div>
                    <button type="submit" class="btn btn-dark btn-block">Submit</button>
                  </form>
            </section>
        </section>
    </section>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\complete_auth\resources\views/dashboard.blade.php ENDPATH**/ ?>
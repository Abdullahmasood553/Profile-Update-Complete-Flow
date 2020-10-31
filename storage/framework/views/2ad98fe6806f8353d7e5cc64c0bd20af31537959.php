<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><span><?php echo e(Auth::user()->fname); ?></span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            
            <li class="nav-item active px-2">
                <a class="nav-link" href="<?php echo e(route("dashboard")); ?>">Home <span class="sr-only">(current)</span></a>
            </li>

            

            <li class="nav-item dropdown px-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <?php echo e(Auth::user()->fname); ?>

                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo e(route('profile')); ?>">Profile</a>
                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Logout</a>
                </div>
            </li>

            <?php if((Auth::check())): ?>
            <li>
                <img src="<?php echo e(asset('storage/'.Auth()->user()->profile_pic)); ?>" height="40px" 
          width="40px" style="border-radius: 50%" alt="" class="pull-right img-circle login" />
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\Profile-Update-Complete-Flow\resources\views/layouts/inc/nav.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyApp | Abnation</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

</head>
<body>

  <div id="notifDiv"
		style="z-index:10000; display: none; background: green; font-weight: 450; width: 350px; position: fixed; top: 80%; left: 5%; color: white; padding: 5px 20px">
  </div>


      <?php echo $__env->yieldContent('content'); ?>
      <?php if(\Request::is('login') || \Request::is('check_email_page') || \Request::is('reset_password') || \Request::is('register') || \Request::is('admin/login')): ?>  
      <?php else: ?>
      <?php echo $__env->make('layouts.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
      
        <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        
    <?php echo $__env->yieldContent('javascript'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\Profile-Update-Complete-Flow\resources\views/layouts/master.blade.php ENDPATH**/ ?>
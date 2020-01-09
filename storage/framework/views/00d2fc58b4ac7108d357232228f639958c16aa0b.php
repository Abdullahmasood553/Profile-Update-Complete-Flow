<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyApp | Abnation</title>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/login.css')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
          .photo-img {
              width: 60px;
              height: 60px;
              background-repeat: no-repeat;
              background-size: cover;
              background-position: center;
              margin-right: 20px;
              border-radius: 50%;
          }


        .photo-row {
            margin-bottom: 30px;
        }

        .profile-content, .photo-row {
            display: flex;
            align-items: center;
        }

      .change-photo {
          cursor: pointer;
          color: #010101;
          font-size: 16px;
          font-weight: 400;
          font-family: 'Open Sans', sans-serif;
      }
        .change-photo {
            font-size: 13px;
        }

      .delete-photo {
        color: #D61043;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        font-family: 'Open Sans', sans-serif;
    }

    .delete-photo span {
        color: #AFAFAF;
        margin: 0 10px;
    }
</style>
</head>
<body>

  <div id="notifDiv"
		style="z-index:10000; display: none; background: green; font-weight: 450; width: 350px; position: fixed; top: 80%; left: 5%; color: white; padding: 5px 20px">
  </div>

      <?php echo $__env->yieldContent('content'); ?>
        <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <?php echo $__env->yieldContent('javascript'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\myApp\resources\views/layouts/master.blade.php ENDPATH**/ ?>
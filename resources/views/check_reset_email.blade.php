@extends('layouts.master')

@section('content')
<form class="form-signin text-center" style="">
    @csrf
 
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
    <h1 class="h3 mb-3 font-weight-normal">Add Email to Reset Password</h1>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="forgot_password_email" class="form-control" placeholder="Email address" required autofocus>
    <br>

    <button class="btn btn-lg btn-primary btn-block" id="bt_forgot_password" type="submit">Forgot Password</button>

  </form>
@endsection



@section('javascript')
<script>
    $('#bt_forgot_password').click(function (event) {
            event.preventDefault();
            var email = $('#forgot_password_email').val();
            $.ajax({
                url: "{{route('user.forgot.password')}}",
                data: {
                    '_token': "{{csrf_token()}}",
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
@endsection



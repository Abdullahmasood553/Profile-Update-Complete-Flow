@extends('layouts.master')

@section('content')
<form class="form-signin text-center"  id="reset_passsword_form">
    @csrf

    <h1 class="h3 mb-3 font-weight-normal">Reset Password</h1>

    
    <input name="reset_token" type="hidden"
    value="{{app('request')->input('token')}}">
    
    <label for="email" class="sr-only">Password</label>
    <input type="password" id="r_password" name="r_password"
    class="form-control" placeholder="Enter Password" value="" minlength="6">

    <label for="email" class="sr-only">Confirm Password</label>
    <input type="password" class="form-control"
    id="r_password_confirmation" placeholder="Enter Confirm Password"
    name="r_password_confirmation" minlength="6">


    <br>

    <button class="btn btn-lg btn-primary btn-block" id="bt_reset_password" type="submit">Reset Password</button>

  </form>
@endsection



@section('javascript')


<script>
  $(document).ready(function () {
            $('#bt_reset_password').on('click', function () {
             
                var form = $('#reset_passsword_form');
                $(form).validate({
                    rules: {
                        r_password: {
                            required: true,
                            minlength: 6
                        },
                        r_password_confirmation: {
                            required: true,
                            equalTo: "#r_password"
                        },
                    },
                    submitHandler: function (form) {
                        let data = $('#reset_passsword_form').serializeArray();
                        console.log(data);
                        $.ajax({
                            type: 'POST',
                            url: "{{route('user_reset_password')}}",
                            data: data,
                            success: function (data) {
                                if (data.status) {
                                $('#notifDiv').fadeIn();
                                $('#notifDiv').css('background', 'green');
                                $('#notifDiv').text('Email Updated Successfully');
                                setTimeout(() => {
                                    $('#notifDiv').fadeOut();
                                }, 3000);
                                  
                                } else {
                                $('#notifDiv').fadeIn();
                                $('#notifDiv').css('background', 'red');
                                $('#notifDiv').text('Invalid Token');
                                setTimeout(() => {
                                    $('#notifDiv').fadeOut();
                                }, 3000);
                                }
                            },
                            error: function (err) {
                                showCustomError('Something went Wrong!')
                            }
                        });
                    }
                });
            });
        });
     
</script>
@endsection



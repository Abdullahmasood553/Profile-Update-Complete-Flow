@extends('layouts.master')
@section('content')


<header class="text-center bg-primary  p-3 text-white">
    <h2>Find Profile</h2>
</header>



@include('layouts.inc.search')

<div class="container mt-8">
    <div class="row" id="get_search_profile_card">
        @include('layouts.inc.search_page')
    </div>
</div>
@endsection



@section('javascript')

<script>
    $(document).ready(function (e) {

        $('#country').on('change', function() {
            getProfile();
        });

        function getProfile() {
            var selectedCountry = $('#country option:selected').val();
            console.log(selectedCountry);

            $.ajax({
                type: 'GET',
                data: {
                    'country':selectedCountry
                },
                url: "{{ route('search.profile') }}",
                success: function (data) {
                    $('#get_search_profile_card').html(data);
                }
            });
        }
    });

</script>
@endsection

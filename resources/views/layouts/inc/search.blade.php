<div class="container">
    <form action="">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="price">Select Price</label>
                    <select class="form-control" id="price">
                        <option>{{\App\Constants\GlobalConstants::ALL}}</option>
                        @foreach(\App\Constants\GlobalConstants::PRICE_RANGE as $key=>$price)
                        <option value="{{ $price }}">{{ $key }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="department">Select Department</label>
                    <select class="form-control" id="department">
                        <option>{{\App\Constants\GlobalConstants::ALL}}</option>
                        @foreach(\App\Constants\GlobalConstants::DEPARTMENT as $key => $department)
                        <option>{{ $department }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="country">Select Country</label>
                    <select class="form-control" id="country" name="country">
                        <option>{{\App\Constants\GlobalConstants::ALL}}</option>
                        @foreach(\App\Constants\GlobalConstants::LIST_COUNTRIES as $key => $countries)
                        <option>{{ $countries }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="country">Select Social Network</label>
                    <select class="form-control" id="social_network">
                        <option>{{\App\Constants\GlobalConstants::ALL}}</option>
                        @foreach(\App\Constants\GlobalConstants::LIST_SOCIAL_MEDIA as $key => $social_networks)
                        <option>{{ ucfirst($social_networks) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <form>
</div>
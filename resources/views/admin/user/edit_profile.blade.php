@extends('admin.user.layout')
@section('content')
                <!-- Start of View Update Password-->
                <div class="tab-pane fade in active" id="tab2">
                    <form action="{{route('update-user-profile',$user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input name="name" value="{{$user->name}}" type="text" class="form-control">
                                    @error('name')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input name="email" value="{{$user->email}}" type="text" class="form-control">
                                    @error('email')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Country:</label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="null">Please Select A Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{ $country->id==$user->country_id ? 'selected':''}}>
                                            {{ $country->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>State:</label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="null">Please Select A State</option>
                                        @foreach($states as $state)
                                        <option value="{{$state->id}}" {{ $state->id==$user->state_id ? 'selected':''}}>
                                            {{ $state->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('state')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>City:</label>
                                    <select name="city" class="form-control" id="city">
                                        <option value="null">Please Select A City</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{ $city->id==$user->city_id ? 'selected':''}}>
                                            {{ $city->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input name="address" value="{{$user->address}}" type="text" class="form-control">
                                    @error('address')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile:</label>
                                    <input name="mobile" value="{{$user->mobile}}" type="text" class="form-control">
                                    @error('mobile')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Role:</label>
                                    <input name="role" value="{{$user->role->name}}" type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>status:</label>
                                    <input name="status" value="{{$user->status==1 ? 'Active' : 'In Active' }}" type="text" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-center">
                                <a class="btn btn-danger btn-block" href="{{route('view-user-profile',$user->id)}}">
                                    <span class="fa fa-user"></span>
                                    &nbsp;
                                    View Profile
                                </a>
                            </div>
                            <div class="col-md-4 text-center">
                                <button class="btn btn-danger btn-block" name="btnUpdateProfile">
                                    <span class="fa fa-edit"></span>
                                    &nbsp;
                                    Update Profile</button>
                            </div>
                            <div class="col-md-4 text-center">
                            <a class="btn btn-danger btn-block" href="{{route('homepage')}}">
                                    <span class="fa fa-home"></span>
                                    &nbsp;
                                    Back To Home</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End of View Update Password-->

@endsection
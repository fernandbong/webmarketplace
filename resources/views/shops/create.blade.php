@extends('layouts.app')

@section('title')
    <title>Marketplace Fotografer | Be a photographer</title>
@endsection

@section('content')
<div class="register-area ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto">
                <div class="login">
                    <div class="login-form-container">
                        <h4 class="mb-4"><strong>Be a Photographer</strong></h4>
                        <div class="login-form">
                            <form action="{{route('shops.store')}}" method="POST">
                                {{ csrf_field() }}
                                <label>Name <span style="color:red;">*</span></label>
                                <input type="text" value="{{auth()->user()->name}}" class="form-control" name="name" id="" aria-describedby="helpId" readonly>

                                <label>Email <span style="color:red;">*</span></label>
                                <input type="text" value="{{auth()->user()->email}}" class="form-control" name="email" id="" aria-describedby="helpId" readonly>

                                <label>Contact <span style="color:red;">*</span></label>
                                <input type="tel" class="form-control" name="contact" id="" aria-describedby="helpId" placeholder="Phone Number">
                                @if ($errors->has('contact'))
                                    <p style="color:red;">{{ $errors->first('contact') }}</p>
                                @endif

                                <label>Location <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="location" id="" aria-describedby="helpId" placeholder="Your Location">
                                @if ($errors->has('location'))
                                    <p style="color:red;">{{ $errors->first('location') }}</p>
                                @endif

                                <label>Description <span style="color:red;">*</span></label>
                                <textarea class="form-control" name="description" id="" cols="" rows="4" placeholder="Description"></textarea>
                                @if ($errors->has('description'))
                                    <p style="color:red;">{{ $errors->first('description') }}</p>
                                @endif

                                <div class="button-box">
                                    <button type="submit" class="default-btn floatright">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

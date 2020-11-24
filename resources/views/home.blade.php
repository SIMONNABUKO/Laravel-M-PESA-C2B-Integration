@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="row">
                            <div class="col-lg-3">
                                <h3>Hp Laptop</h3>
                                <p>40000/=</p>
                                <a class="btn btn-success" href="/pay">Pay Now</a>
                            </div>
                            <div class="col-lg-3">
                                <h3>Huawei y9</h3>
                                <p>20,000/=</p>
                                <a class="btn btn-success" href="/pay">Pay Now</a>
                            </div>
                            <div class="col-lg-3">
                                <h3>Web Cam</h3>
                                <p>3000/=</p>
                                <a class="btn btn-success" href="/pay">Pay Now</a>
                            </div>
                            <div class="col-lg-3">
                                <h3>Microphone</h3>
                                <p>4000/=</p>
                                <a class="btn btn-success" href="/pay">Pay Now</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

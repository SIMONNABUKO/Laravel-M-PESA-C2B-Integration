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

                    <form action="{{ route('lipa') }}" method="POST" class="login-form" id="recaptchaForm">
                        @csrf
                        <div class="login-inner-block">
                            <div class="frm-grp">
                                <label>@lang('Amount')</label>
                                <input type="text" name="amount"   placeholder="@lang('Enter Amount of Money')">
                            </div>
                            <div class="frm-grp">
                                <label>@lang('Phone Number')</label>
                                <input type="phone" name="phone"  placeholder="@lang('Enter phone number to pay with')">
                            </div>
                        <input type="text" name="user" value="{{auth()->user()}}" hidden>
                        </div>
                       
                        <div class="btn-area text-center">
                            <button type="submit"  class="submit-btn">@lang('Pay Now')</button>
                        </div>
                        <br>

                        <div class="d-flex mt-3 justify-content-between">
                            <p>You will receive a popup message on your phone once you click on pay now button. Enter your pin to complete transaction.</p>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

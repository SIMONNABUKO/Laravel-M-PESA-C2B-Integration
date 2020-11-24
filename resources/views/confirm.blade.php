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

                    <form action="{{ route('confirm') }}" method="POST" class="login-form" id="recaptchaForm">
                        @csrf
                        <div class="login-inner-block">
                            <div class="frm-grp">
                                <label>@lang('Transaction Id')</label>
                                <input type="text" name="transactionId"   placeholder="@lang('Example: OIB9FQP9H7')">
                            </div>
                       
                        <div class="btn-area text-center">
                            <button type="submit"  class="submit-btn">@lang('Confirm Payment')</button>
                        </div>
                        <br>

                        <div class="d-flex mt-3 justify-content-between">
                            <p>Please enter the transaction Id you received from M-PESA.</p>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

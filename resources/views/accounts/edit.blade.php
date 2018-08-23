<!-- View for the edit page (to edit users account data) -->
@extends('layouts.master')

@section('content')

<!-- Edit data form -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h5><center>
                    {{ __('Wijzig accountsgegens (velden met een * zijn verplicht)') }}</div>
                  </h5></center>

                <div class="card-body">
                    <form method="POST" action="/account/edit">
                        @csrf

                        <!-- Edit email/account naam-->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Account naam *') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" value="{{ $user->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Register form confirm email-->
                        <!-- <div class="form-group row">
                            <label for="email-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Herhaal E-Mailadres *') }}</label>

                            <div class="col-md-6">
                                <input id="email-confirm" type="email" class="form-control" name="email_confirmation" required>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Wijzig') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

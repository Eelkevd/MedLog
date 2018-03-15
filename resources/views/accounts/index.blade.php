@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Account</div>
                
                    @guest
                    <!-- Show not logged in screen -->
                    <div class="col-md-6">
                        <label >{{ __('Please log in to see your account data.') }}</label>
                    </div>
                
                    @else
                    <!-- Show users account data -->
                        @foreach ($users as $user) 
                            @include('accounts/account')
                        @endforeach
                    @endguest
            </div>
            
             <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                            <form action="account/edit" >
                                <button type="submit">Wijzig account data</button>
                            </form> 
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
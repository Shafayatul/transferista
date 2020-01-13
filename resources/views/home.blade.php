@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @if ( Auth::user()->first === 0)
                <div class="card-header">Welcome to Transferista - Please select who you are:</div>
              @else
                <div class="card-header">Dashboard</div>
              @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  {{ Auth::user()->firstname }} :   You are logged in!
                  <br>
                  <br>
                  @if ( Auth::user()->first === 0)
                      <form method="POST" action="{{ action('HomeController@FirstLogin') }}">
                          @csrf
                          <div class="form-group">
                            <div class="col-md-6">
                                <input type="radio" name="typ" value="b2c"> Customer: B2C<br>
                                <input type="radio" name="typ" value="b2b"> Customer: B2B<br>
                                <input type="radio" name="typ" value="transferista"> Transferista<br>
                            </div>
                          </div>
                          <br>
                          <button type="submit" class="btn btn-primary">
                              {{ __('Select') }}
                          </button>

                      </form>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <div id="app">
        <main>
          <div class="section">
            <div class="container">
              <div class="columns">
                <div class="column is-one-third is-offset-one-third">
                  <div class="card mt-5">
                    <div class="card-header is-prmry">
                      <p class="card-header-title has-text-white">
                        Log In
                      </p>
                      <div class="card-header-icon has-text-white">
                        <span class="icon">
                          <i class="fa fa-sign-in"></i>
                        </span>
                      </div>
                    </div>
                    <div class="card-content">
                      <form class="" action="{{ route('login') }}" method="post" role="form">
                        {{ csrf_field() }}
                        <div class="field">
                          <label class="label">E-Mail Address</label>
                          <div class="control has-icons-left">
                            <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                            <span class="icon is-small is-left">
                              <i class="fa fa-user"></i>
                            </span>
                          </div>
                          @if ($errors->has('email'))
                            <p class="help is-danger">
                              {{ $errors->first('email') }}
                            </p>
                          @endif
                        </div>
                        <div class="field">
                          <label class="label">Password</label>
                          <div class="control has-icons-left">
                            <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" password-reveal name="password" value="" required>
                            <span class="icon is-small is-left">
                              <i class="fa fa-lock"></i>
                            </span>
                          </div>
                          @if ($errors->has('password'))
                            <p class="help is-danger">
                              {{ $errors->first('password') }}
                            </p>
                          @endif
                        </div>
                        <div class="field">
                          <label class="checkbox">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            Remember me
                          </label>
                        </div>
                        <div class="field">
                          <button class="button is-primary is-outlined is-fullwidth" type="submit" name="button">Log In</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <h5 class="has-text-centered mt-3"><a href="{{ route('password.request') }}" class="is-muted">Forgot Your Password?</a></h5>
                </div>
              </div>
            </div>
          </div>
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>

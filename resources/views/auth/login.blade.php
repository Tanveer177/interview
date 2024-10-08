@extends('layout')

@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Login</div>
                  <div class="card-body">

                      <form action="{{ route('login.post') }}" method="POST" id="handleAjax">
                          @csrf

                          <div id="errors-list"></div>

                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password">
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Login
                              </button>
                          </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

<script type="text/javascript">
$(function() {
    $(document).on("submit", "#handleAjax", function(e) {
        e.preventDefault(); // Prevent default form submission
        var form = this;

        $(form).find("[type='submit']").html("Login...").prop('disabled', true);

        $.ajax({
            url: $(form).attr('action'),
            data: $(form).serialize(),
            type: "POST",
            dataType: 'json',
            success: function(data) {
                $(form).find("[type='submit']").html("Login").prop('disabled', false);

                if (data.status) {
                    window.location = data.redirect; // Redirect on success
                } else {
                    $("#errors-list").html(''); // Clear previous errors
                    $.each(data.errors, function(key, val) {
                        $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
                    });
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors not related to validation (server issues, etc.)
                console.error("Error: ", status, error);
                $(form).find("[type='submit']").html("Login").prop('disabled', false);
            }
        });
    });
});


</script>
@endsection

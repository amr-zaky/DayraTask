@include('AdminPanel.layouts.header')

<div class="login-page">
    <div class="login-box">
        <div class="login-logo" style="margin-bottom: 50px">
            <span><img src="{{url('dashboard/dist/img/AdminLTELogo.png')}}"></span><a href="#"><b>Dayra App</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <form  method="POST" action="{{route('login')}}" id="login-form">
                    <p id="messages" style="color: #FFFFFF ;background:#0b2e13"></p>
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email"  class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-center">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>
@push('custom-scripts')
    <script>
        $('#login-form').on('submit',function (e) {
            e.preventDefault();
            var email=$('#email').val();
            var password=$('#password').val();

            jQuery.ajax({
                url: "{{route('login')}}",
                method: 'post',
                data: {
                email:email,
                password:password
                },
                success: function(response){
                    localStorage.setItem('token',response['token']);
                        console.log(localStorage.getItem('token'));
                        window.location="{{route('homePage')}}";
                },
                error:function (ex) {
                    $("#messages").text("Email or Password Wrong");
                }
            });

        });
    </script>

@endpush

@include('AdminPanel.layouts.footer')



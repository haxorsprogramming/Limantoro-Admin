@include('layout.headerLoginPage')
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url({{ asset('style/') }}/compass/images/login.jpg)"></div>
    <div class="container" id="appLogin">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="" action="">
                    <div class="header">
                        <div class="logo-container">
                            <img src="{{ asset('base/') }}/logo.png" alt="">
                        </div>
                        <h5>Limantoro Agung Property</h5>
                    </div>
                    <div class="content">
                        <div class="input-group input-lg">
                            <input type="text" class="form-control" id="txtUsername" placeholder="Enter User Name">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group input-lg">
                            <input type="password" class="form-control" id="txtPassword" placeholder="Password" />
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div>
                        <div class="alert alert-success" style="display: none;">
                            <strong>Well done!</strong> You successfully read this important alert message.
                        </div>
                    </div>
                    <div class="footer text-center">
                        <a href="javascript:void(0)" id="btnMasuk" v-on:click="loginAtc()" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light">
                            Log In
                        </a>
                        <h6 class="m-t-20"><a href="{{ url('/forgot-password') }}" class="link">Forgot Password?</a></h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layout.footerLoginPage')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin-panel/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin-panel/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin-panel/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin-panel/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin-panel/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin-panel/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin-panel/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin-panel/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('admin-panel/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  
  <div class="container" style="margin-top:170px;">

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card">

            <div class="card-header">Two Factor Authentication</div>



            <div class="card-body">

                <form method="POST" action="{{ route('2fa.post') }}">

                    @csrf



                    <p class="text-center">We sent code to your phone : {{ substr(auth()->user()->phone, 0, 5) . '******' . substr(auth()->user()->phone,  -2) }}</p>



                    @if ($message = Session::get('success'))

                        <div class="row">

                          <div class="col-md-12">

                              <div class="alert alert-success alert-block">

                                <button type="button" class="close" data-dismiss="alert">×</button> 

                                  <strong>{{ $message }}</strong>

                              </div>

                          </div>

                        </div>

                    @endif



                    @if ($message = Session::get('error'))

                        <div class="row">

                          <div class="col-md-12">

                              <div class="alert alert-danger alert-block">

                                <button type="button" class="close" data-dismiss="alert">×</button> 

                                  <strong>{{ $message }}</strong>

                              </div>

                          </div>

                        </div>

                    @endif



                    <div class="form-group row">

                        <label for="code" class="col-md-4 col-form-label text-md-right">Code</label>



                        <div class="col-md-6">

                            <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>



                            @error('code')

                                <span class="invalid-feedback" role="alert">

                                    <strong>{{ $message }}</strong>

                                </span>

                            @enderror

                        </div>

                    </div>



                    <div class="form-group row mb-0">

                        <div class="col-md-8 offset-md-4">

                            <a class="btn btn-link" href="{{ route('2fa.resend') }}">Resend Code?</a>

                        </div>

                    </div>



                    <div class="form-group row mb-0">

                        <div class="col-md-8 offset-md-4">

                            <button type="submit" class="btn btn-primary">

                                Submit

                            </button>



                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</div>

  <!-- /.content-wrapper -->
  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin-panel/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin-panel/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  // $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin-panel/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin-panel/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin-panel/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admin-panel/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin-panel/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin-panel/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin-panel/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin-panel/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin-panel/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin-panel/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin-panel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin-panel/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin-panel/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin-panel/dist/js/pages/dashboard.js')}}"></script>
</body>
</html>

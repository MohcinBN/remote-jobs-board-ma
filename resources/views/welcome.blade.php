<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Moroccan remote job board</title>
          <!--front end board css -->
          <link rel="stylesheet" href="{{ asset('css/job.css') }}">
            <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
            <!-- Ionicons -->
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <!-- Tempusdominus Bootstrap 4 -->
            <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
            
            <!--job board css's -->
            <link rel="stylesheet" href="{{asset('css/job.css')}}">
            <link rel="stylesheet" href="{{asset('css/app.css')}}">
            <link rel="stylesheet" href="{{asset('css/front-end.css')}}">

      
 
    </head>
    <body>
        @include('front-end.header')
        <div class="container mx-auto mt-4">
            @include('front-end.subscribe-form')
            {{-- <div class="filter mt-4">
                <a href="#">Remote Full-Time</a>
                <a href="#" class="active">All</a>
            </div> --}}

            <h4 class="mt-4" style="font-weight: bold;">Latest Jobs</h4>

            <div class="row" id="jobs">
                @foreach ($latestJobsForHomePage as $job)
                <div class="col-md-12 single-job">
                    <div class="row">
                        <div class="col-md-2 company-name text-center">
                            <p title="Company Name" class="copmany-name">{{ $job->company_name }}</p>
                        </div>
                        <div class="col-md-7">
                            <h4 class="job-title" title="Job Title">{{ $job->title }}</h4>
                            <span title="Job Type"><i class="fas  fa-clock"></i> {{ $job->type }}</span>
                            <span title="Job Local"><i class="fas fa-thumbtack"></i> {{ $job->city }}</span>
                            <span title="Posted At"><i class="fas fa-calendar-week"></i> {{ $job->created_at }}</span>
                            <p class="short-description">
                                Kaiyo is an online marketplace for pre-owned furniture that’s made to last.
                            </p>
                        </div>
                        <div class="col-md-3 apply text-center">
                            <p style="margin-right: 11px;">{{ $job->created_at->diffForHumans() }}</p>
                            <a href="{{ "http://". $job->url }}" target="_blank">Apply</a>
                    
                        </div>
                    </div>
                </div>  
                @endforeach

                <div class="d-flex justify-content-center homepagination mx-auto">
                    {{ $latestJobsForHomePage->links() }}
                </div>
            </div>
        </div>

        @include('front-end.footer')














        <!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- main js file -->
<script src="{{ asset('js/main.js') }}"></script>

    </body>
</html>

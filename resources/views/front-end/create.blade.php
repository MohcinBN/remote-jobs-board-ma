<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Moroccan remote job board - Create a Job</title>
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

            <div class="row forms-job-ui">
    
                <div class="col-md-8 mx-auto job-top-marg">
            
                    @if (session('status_job_submited'))
                    <div class="alert alert-success" style="font-weight: bold;">
                        {{ session('status_job_submited') }}
                    </div>
                    @endif
            
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Check Those Errors!</strong> 
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
            
            
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">Add new job</h3>
                    </div>
            
            
                    <form action="{{ route('job.visitor.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
            
                    <div class="card-body">
                      <!-- Date dd/mm/yyyy -->
                      <div class="form-group">
                        <label>Company Name :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                          </div>
                          <input type="text" class="form-control" name="company_name" placeholder="Company Name">
                        </div>
                         
                      </div>

                      <div class="form-group">
                        <label>Small Description about company</label>
                        <div class="input-group">
                            
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                          </div>
                          <textarea name="small_description" id="small_description" rows="5" class="form-control" placeholder="small description about the company">

                          </textarea>
                        </div>
                      </div>
            
                      <div class="form-group">
                        <label>Job Title :</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-dev"></i></span>
                          </div>
                          <input type="text" class="form-control" name="title" placeholder="Title Of the Job (Fullstack Developer Java!)">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
            
                      <!-- phone mask -->
                      <div class="form-group">
                        <label>Link to the apply url :</label>
                        <div class="input-group">
                            
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                          </div>
                          <input type="text" class="form-control" name="url" placeholder="Link to the post description and application">
                        </div>
                      </div>
            
            
                      <div class="form-group">
                        <label>Type of the job :</label>
                        <div class="input-group">
                            
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-copyright"></i></span>
                          </div>
                          <select class="form-control" id="" name="type" style="padding: .375rem .75rem;">
                            <option selected>Select Type</option>
                            <option value="remote">Remote</option>
                            <option value="freelance">Remote Freelancer</option>
                          </select>
                        </div>
                      </div>
            
                                <!-- phone mask -->
                                <div class="form-group">
                                    <label>City :</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                      </div>
                                      <select class="form-control" id="" name="city" style="padding: .375rem .75rem;">
                                        <option selected>Select a City</option>
                                        <option value="Rabat">Rabat</option>
                                        <option value="Casablanca">Casablanca</option>
                                        <option value="Tanger">Tanger</option>
                                        <option value="Tetouan">Tetouan</option>
                                        <option value="Marrakesh">Marrakesh</option>
                                        <option value="Fes">Fes</option>
                                        <option value="Mekness">Meknes</option>
                                        <option value="Mohammedia">Mohammedia</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Your Email (optional):</label>
                                    <div class="input-group">
                                        
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                      </div>
                                      <input type="text" class="form-control" name="sender_email" placeholder="Your email to let you know when we enable your job">
                                    </div>
                                  </div>

                                  
                      
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-success btn-lg">Submit The Job</button>
                                  </div>
            
                    </div>
                    <!-- /.card-body -->
                </form>
                  </div>
                  
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

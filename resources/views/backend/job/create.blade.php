@extends('layouts.admin')

@section('title', 'Add New Job')


@section('content')
<section class="content">
    <div class="container-fluid">
<div class="row forms-job">
    
    <div class="col-md-8 mx-auto job-top-marg">

        @if (session('status'))
        <div class="alert alert-success" style="font-weight: bold;">
            {{ session('status') }}
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


        <form action="{{ route('job.store') }}" method="post" enctype="multipart/form-data">
            @csrf

        <div class="card-body">
          <!-- Date dd/mm/yyyy -->
          <div class="form-group">
            <label>New Job Informations :</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-building"></i></span>
              </div>
              <input type="text" class="form-control" name="company_name" placeholder="Company Name">
            </div>
             
          </div>

          <div class="form-group">
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
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-link"></i></span>
              </div>
              <input type="text" class="form-control" name="url" placeholder="Link to the post description and application">
            </div>
          </div>


          <div class="form-group">
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
                            <option value="Fes">Fes</option>
                            <option value="Mekness">Mekness</option>
                          </select>
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
</section>
@endsection
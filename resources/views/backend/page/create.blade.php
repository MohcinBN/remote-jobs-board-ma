@extends('layouts.admin')

@section('title', 'Add New Page')


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
          <h3 class="card-title">Add new page</h3>
        </div>


        <form action="{{ route('page.store') }}" method="post" enctype="multipart/form-data">
            @csrf

        <div class="card-body">
          <div class="form-group">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-heading"></i></span>
              </div>
              <input type="text" class="form-control" name="title" placeholder="Page Title">
            </div>
             
          </div>

          <div class="form-group">
            <label>Page Description</label>
            <div class="input-group">
                
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-paragraph"></i></span>
              </div>
              <textarea name="description" id="description" rows="5" class="form-control" placeholder="Page Description">

              </textarea>
            </div>
          </div>
          
          <div class="form-group">
                <button type="submit" class="btn btn-block btn-success btn-lg">publish</button>
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
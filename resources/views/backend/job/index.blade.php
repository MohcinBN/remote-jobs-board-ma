@extends('layouts.admin')


@section('title', 'Latest Jobs')


@section('content')

<section class="content">
    <div class="container-fluid">
<div class="row forms-job">
    <div class="col-12">
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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Latest Added Jobs</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Title</th>
                <th>Url</th>
                <th>Type</th>
                <th>City</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($latestJobs as $job)
              <tr>
                <td>{{$job->id}}</td>
                <td>{{$job->company_name}}</td>
                <td>{{$job->title}}</td>
                <td>{{$job->url}}</td>
                <td>{{$job->type}}</td>
                <td>{{$job->city}}</td>
                <td>{{$job->status}}</td>
                <td class="action_on_jobs">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{ route('job.edit', $job->id) }}"><i class="far fa-edit"></i> Edit</a>
                          <form action="{{ route('job.destroy', $job->id) }}" method="post">
                              @method('DELETE')
                              @csrf
                            <button type="submit" class="dropdown-item deleteJob" style="color: red;"><i class="fas fa-trash-alt"></i> Delete</button>
                          </form>
                         
                        </div>
                      </div>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
<div class="d-flex justify-content-center">
{{ $latestJobs->links() }}
</div>
</section>
@endsection
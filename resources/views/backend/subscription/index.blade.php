@extends('layouts.admin')


@section('title', 'Latest Subscribed')


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
          <h3 class="card-title">Latest Subscribed</h3>

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
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($subscriptions as $subscription)
              <tr>
                <td>{{$subscription->id}}</td>
                <td>{{$subscription->email}}</td>
                <td class="action_on_jobs">
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
{{ $subscription->links() }}
</div>
</section>
@endsection
<div class="row">
    <div class="col-md-12 subscribe-email">
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
        <form class="subscribe" method="POST" action="{{ route('subscription.email.store') }}">
            @csrf
            <p style="margin-top: 1rem;margin-right: 11px;"><strong>Get an email with new remote jobs</strong></p>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email.." class="w-100">
            <button type="submit" class="btn btn-primary send-btn">Submit</button>
          </form>
    </div>
</div>
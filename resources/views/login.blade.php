@include('include.header') 

  <body>

    <div class="container">
      <form style="width: 500px;" class="ms-auto me-auto" method="post" action="{{route('login')}}">
        @csrf

        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" class="form-control" name="email">
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>

@include('include.footer')
    

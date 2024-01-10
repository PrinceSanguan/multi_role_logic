@include('include.header')
    <div class="container">
      <form style="width: 500px;" class="ms-auto me-auto" action="{{ route('registration') }}" method="post">
        @csrf

        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" class="form-control" name="name">
          @error('name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" class="form-control" name="email">
          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password">
          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="status">Type of Role</label>
          <select class="form-control @error('userrole') is-invalid @enderror" name="userrole">
              <option value="" disabled selected>-- Select --</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
              <option value="programmer">Programmer</option>
          </select>
          @error('userrole')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          <br>
      </div> 

        <button type="submit" class="btn btn-primary">Register</button>

      </form>
    </div>
@include('include.footer')

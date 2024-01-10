@include('include.header')
<div>
  <h1>This is User Page</h1>
</div>

<form action="{{ route('logout') }}" method="post">
  @csrf
  <button type="submit">Logout</button>
</form>
@include('include.footer')
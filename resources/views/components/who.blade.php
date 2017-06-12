@if (Auth::guard('web')->check())
  <p>You are logged in as a <b>User</b></p>
@else
  <p>You are logged out as a <b>User</b></p>
@endif
@if (Auth::guard('admin')->check())
  <p>You are logged in as a <b>Admin</b></p>
@else
  <p>You are logged out as a <b>Admin</b></p>
@endif

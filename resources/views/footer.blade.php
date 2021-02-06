@if(is_object(auth()->user()) && auth()->user()->is_admin)
    <b>Superadmin</b>
@elseif(\Illuminate\Support\Facades\Auth::guest())
    <b>Gast</b>
@else
    <b>User</b>
@endif
<div class="col-md-3">
	<div class="list-group">
		<a href="{{ route('member.manage-account') }}" class="list-group-item list-group-item-action d-flex justify-content-between"><div>Manage Account</div><i class="icon-user"></i></a>
		<a href="{{ route('member.change-password') }}" class="list-group-item list-group-item-action d-flex justify-content-between"><div>Change Password</div><i class="icon-key"></i></a>
		<a href="{{ route('member.file-download') }}" class="list-group-item list-group-item-action d-flex justify-content-between"><div>File Downloads</div><i class="icon-file"></i></a>
		<a href="#" class="list-group-item list-group-item-action d-flex justify-content-between" onclick="event.preventDefault(); document.getElementById('member-logout-form').submit();"><div>Logout</div><i class="icon-door-open"></i></a>
	</div>
</div>
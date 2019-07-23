<div class="col-md-12 list-group-item">
		<a href="{{ route('user.index',['user' => $user->id]) }}">ข้อมูลส่วนตัว</a><br>
		<a href="{{ route('user.edit', ['user' => $user->id]) }}">แก้ไข Password</a><br>
		<a href="{{ route('user.editEmail', ['user' => $user->id]) }}">แก้ไข E-mail</a><br>
		<a href="{{ route('user.comment', ['user' => $user->id]) }}">กระทู้</a><br>
	</div>
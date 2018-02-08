<a href="{{ route('users.show', $user->id) }}">
  <img src="{{ $user->head_img }}" alt="头像" class="gravatar"/>
</a>
<h1>{{ $user->name }}</h1>
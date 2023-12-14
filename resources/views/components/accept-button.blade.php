@if (!$post->is_accept && auth()->user()->roles->contains('name', 'admin'))
<form action="{{ route('post.accept', $post) }}" method="post">
  @csrf
  @method('patch')
  <button type="submit"><i class="fa-solid fa-check"></i></button>
</form>
@endif

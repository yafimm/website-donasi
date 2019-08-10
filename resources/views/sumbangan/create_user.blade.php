<form class="" method="POST" action="{{ route('sumbangan.store.user') }}" enctype="multipart/form-data">
  @csrf
  @method('POST')
  @include('sumbangan.form')
</form>

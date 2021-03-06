@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Message
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="/messages/{{ $message->id }}" style="margin-bottom: 1em;">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" value={{ $message->title }} />
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <input type="text" class="form-control" name="content" value={{ $message->content }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
      <form method="post" action="/messages/{{ $message->id }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-primary">DELETE</button>
      </form>
  </div>
</div>
@endsection

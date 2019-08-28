@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Content</td>
          <td>Author</td>
          <td>Create Time</td>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
        <tr>
            <td>{{$message->id}}</td>
            <td>{{$message->title}}</td>
            <td>{{$message->content}}</td>
            <td>{{$message->author}}</td>
            <td>{{$message->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

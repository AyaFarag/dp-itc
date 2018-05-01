@extends('layouts.app')

@section('content')
<div class="container">
<form action="/update/post" method="POST">
    {{ csrf_field() }}
<input type="hidden" name="_method" value="PATCH" />
<textarea rows="5" class="form-control" name="editpostcontent">{{ $editpost->content}}</textarea>
<button type="submit" class="btn btn-success">Save</button>
</form>
</div>
@endsection
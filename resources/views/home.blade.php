@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">

                    {{-- add post --}}
                    <form action="/post" method="POST">
                            {{ csrf_field() }}
                        <label> Post Content : </label>
                        <textarea rows="5" name="content" class="form-control"></textarea>
                        <button type="submit" class="btn btn-primary mt-1 float-right">Post</button>
                    <br/> <br/>
                   </form>


                {{-- post content --}}
                <hr/>
                <div class="card border border-white">

                    @foreach ($posts as $post)    
                        <div class="card-body bg-white border border-secondery m-1" style="height:200px">
 
                            {{-- edit and delete --}}
                            @if (!Auth::guest() && (Auth::User()->id == $post->fk_user_id))

                                <div class="float-right">
                                        <div class="d-inline-block">
                                            <form action="{{action('postController@destroy', $post->post_id)}}" method="POST">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="_method" value="DELETE" />
                                              <button type="submit" class="bg-light border border-white"><span><i class="fas fa-trash text-danger"></i></span></button>
                                          </form>
                                            </div>
                                        
                                        <div class="d-inline-block">
                                          <form action="{{action('postController@edit', $post->post_id)}}" method="GET">
                                              {{ csrf_field() }}
                                            <button type="submit" class="bg-light border border-white"><span><i class="fas fa-edit text-primary"></i></span></button>
                                          </form>
                                        </div>
                                    </div>
                                    @endif
                            {{-- end edite and delete --}}

                                    {{--  post content  --}}
                                    <p>{{ $post->content }}</p>

                        </div>

                        {{-- comments --}}
                        <p>
                            <a class="ml-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Comments
                                </a>
                            </p>

                            <div class="collapse" id="collapseExample">
                                <div class="card card-body border border-white bg-light ">

                                    {{-- add comment --}}
                                <form action="" method="POST">
                                        {{ csrf_field() }}
                                    <label></label>
                                    <textarea rows="2" class="form-control"></textarea>
                                    <button class="btn btn-light mt-1 float-right">Comment</button>
                                </form>
                                {{-- end add comment --}}


                                {{-- comment content --}}
                                <div class="card-body bg-white mt-1">
                                    {{-- @foreach ($comments as $comment)
                                        <p> </p>
                                    @endforeach --}}
                                        Comment content.

                                {{-- edit and delete --}}
                            {{-- @if (!Auth::guest() && (Auth::User()->id == $comment->fk_user_id)) --}}

                                <div class="float-right">
                                        <div class="d-inline-block">
                                            <form action="" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <button type="submit" class="bg-white border border-white"><span><i class="fas fa-trash text-danger"></i></span></button>
                                        </form>
                                            </div>
                                        
                                        <div class="d-inline-block">
                                        <form action="" method="GET">
                                            {{ csrf_field() }}
                                            <button type="submit" class="bg-white border border-white"><span><i class="fas fa-edit text-primary"></i></span></button>
                                        </form>
                                        </div>
                                    </div>
                                {{-- @endif    --}}
                                    {{-- end edite and delete --}}

                                    </div>
                                </div>
                            </div>
                    @endforeach




                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

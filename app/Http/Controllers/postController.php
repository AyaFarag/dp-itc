<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $user = App\User::get();
        $posts = App\post::orderBy('post_id','desc')->get();

        return view('home' , compact('posts', 'id'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $id = Auth::id();
        $addposts = new App\post();
        $addposts->content = $request->content;
        $addposts->fk_user_id = $id;
        $addposts->save();

        return redirect()->route('home' ,compact('id'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editpost = App\post::find($id);

        if (Gate::allows('update-post', $editpost)) 
        {
            return view('editpost')->with(compact('editpost'));
        }
        else 
        {
            echo "access denied";
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatepost = App\post::find($id);
        $updatepost->content = $request->editpostcontent;
        $updatepost->save;
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ;
        $postdelete = App\post::find($id);
        if (Gate::allows('update-post', $postdelete)) 
        {
            $postdelete->delete($id);
            return redirect()->route('home' , compact('postdelete'));
        }
        else  
        {
            echo "access denied";
        }
        
    }
}

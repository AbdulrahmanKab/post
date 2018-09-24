<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\postRequest;
use App\department;
use App\post;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use DB;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $q= request()['q'];
        $item= post::whereRaw("isdelete=0");

        $item->whereRaw('poststatus=1');
        $item->whereRaw('disable=0');

        if ($q !=NULL){
            $item->whereRaw("keyword like ?",["%$q%"]);
        }
        $item = $item->paginate(10)->appends(["q"=>$q]);

        return view('post.index',compact('item','q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = department::all();
        return view('post.create',compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postRequest $request)
    {
        $item = new post();
        $path =$request->file('image')->store('public/images');
        $item->posttitle= $request['title'];
        $item->commentstatus= $request['allowcomment']?'1':'0';
        $item->keyword= $request['keyword'];
        $item->image= basename($path);
        $item->content= $request['content'];
        $item->poststatus=$request['poststatus']?'1':'0';
        $item->department_id= $request['department'];
        $item->addby= 'abd';
        $item->save();
        return redirect('/post');
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
        $item = post::find($id);

        if($item == NULL || $item->isdelete){
            return redirect("/post");
        }
        $department = department::all();
        return view('post.editid',compact('item','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(postRequest $request, $id)
    {
        $item= post::find($id);
        $item->posttitle= $request['title'];
        $item->commentstatus= $request['allowcomment']?'1':'0';
        $item->keyword= $request['keyword'];
        $item->content= $request['content'];
        $item->poststatus=$request['poststatus']?'1':'0';
        $item->department_id= $request['department'];
        $item->addby= 'abd';
        $item->save();
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item= post::find($id);
        $item->isdelete=1;
        $item->save();
        return redirect('/post/all/edit');
    }
    public function edit_post(){
        $item = post::whereRaw("isdelete=0");
        $item = $item->paginate(20);
        return view('post.edit' ,compact('item'));
    }
    public function disable($id){
        $item = post::find($id);
        $item->disable=1;
        $item->save();
        return redirect('/post/all/edit');
        }
    public function active($id){
        $item = post::find($id);
        $item->disable=0;
        $item->save();
        return redirect('/post/all/edit');
    }
    public function pending(){
        $item=post::whereRaw('isdelete=0');
        $item->whereRaw('disable=0');
        $item->whereRaw('poststatus=0');
        $item= $item->paginate(20);
        return view("post.pending",compact('item'));
    }
    public function status($id)
    {
     $item =post::find($id);
     $item->poststatus=1;
     $item->save();
     return redirect('/post/pending');
    }
}

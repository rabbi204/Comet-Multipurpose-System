<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::where('trash', false) -> get();
        $published = Post::where('trash', false) -> get() -> count();
        $trash = Post::where('trash', true) -> get() -> count();
        return view('admin.post.index',[
            'all_data'  => $data,
            'published'  => $published,
            'trash'  => $trash,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tag = Tag::all();
        return view('admin.post.create',[
            'all_cat'   => $category,
            'all_tag'   => $tag,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'title'     => 'required',
            'content'   => 'required',
        ]);


        // for image
        $unique_file_name ='';
        if( $request -> hasFile('image')){
            $img = $request -> file('image');
            $unique_file_name = md5(time().rand()). '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/post/'), $unique_file_name);

        }
        // for gallery
        $gall_images=[];
        if( $request -> hasFile('post_gallery')){
            foreach( $request -> file('post_gallery') as $post_gall ){
                $unique_gall_name = md5(time().rand()). '.' . $post_gall -> getClientOriginalExtension();
                $post_gall -> move(public_path('media/post/'), $unique_gall_name);
                array_push($gall_images, $unique_gall_name);
            }
        }

        $post_featured = [
            'post_type'      => $request -> post_type,
            'post_image'     => $unique_file_name,
            'post_gallery'   => $gall_images,
            'post_video'     => $request -> video,
            'post_audio'     => $request -> audio,
        ];

        $all_post =  Post::create([
            'title'     => $request -> title,
            'slug'      => Str::slug($request -> title),
            'content'   => $request -> content,
            'featured'   => json_encode($post_featured),
        ]);

        return redirect() -> route('post.create') -> with('success', "Post Added Successful");


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data = Post::find($id);
        $delete_data -> delete();
        return redirect() -> route('post.trash') -> with('success', 'Data Deleted Successfully');
    }

    /**
     *  for post trash
     */
    public function postTrash()
    {
        $data = Post::where('trash', true) -> get();
        $published = Post::where('trash', false) -> get() -> count();
        $trash = Post::where('trash', true) -> get() -> count();
        return view('admin.post.trash',[
            'all_data'  => $data,
            'published' => $published,
            'trash'     => $trash,
        ]);
    }
    /**
     *  for post trash update
     */
    public function postTrashUpdate($id)
    {
        $trash_data = Post::find($id);
        if($trash_data -> trash == false){
            $trash_data -> trash = true;
        }else{
            $trash_data -> trash = false;
        }
        $trash_data -> update();
        return redirect() -> back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saas;
use App\Category;
use App\Upvote;
use App\Review;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Notifications\UserNotifications;


class SaasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saas = SAAS::paginate(10)->all();
        return view('homepage', compact('saas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('submit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //Data Validation here
        $data = $request->validate([
            'name' => 'min:4|max:250|string',
            'category_id' => 'integer|min:1|max:999',
            'description' => 'min:20|max:9999|string',
            'one_liner' => 'min:5|max:200|string',
            'website' => 'url',
            'thumbnail' => 'image',
            'screenshot' => 'image',
        ]);

        //Images resizing using helper function
        $thumbnail = imageresize(200, $request->file('thumbnail'), 'thumbnails');
        $screenshot = imageresize(1200, $request->file('screenshot'), 'screenshots');

        //Generating slug for url
        $slug = strtolower(str_replace(' ', '', $data['name']));

        //Storing in DB
        Saas::create([
            'name' => $data['name'],
            'slug' => $slug,
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'one_liner' => $data['one_liner'],
            'website' => $data['website'],
            'thumbnail' => $thumbnail,
            'screenshot' => $screenshot,
            'user_id' => currentUserId()
        ]);

        return redirect(route('app', $slug));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Saas $saas)
    {
        // ddd($saas);
        return view('app', compact('saas'));
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
    public function destroy(Saas $saas)
    {
        if(Gate::allows('delete-saas', $saas))
        {
           $saas->delete();
           return redirect(route('home'))->with('status', 'App Deleted!');
        } else
        {
            return redirect(route('home'))->with('status', 'Opps! You are not allowed to delete it.');
        }
    }

    public function search(Request $request)
    {
        $term = '%'.$request->term.'%';

        $saas = Saas::where('name', 'like', $term)
            ->orWhere('description', 'like', $term)
             ->orWhere('one_liner', 'like', $term)
            ->paginate(10)->all();

        return view('search', compact('saas', 'term'));
    }


    public function Upvote(Saas $saas){

        if(currentUser()->checkIfUserUpvoted($saas))
        {
            Upvote::where([
                ['user_id', currentUserId()],
                ['saas_id', $saas->id]
            ])->delete();


        }elseif (currentUser()->checkIfUserUpvoted($saas) === false) {

           $saas->upvotes()->create([
                'user_id' => currentUserId(),
            ]);

            $msg = $saas->name . ' Was Upvoted By ' . currentUser()->name;
            $saas->user->notify(new UserNotifications($msg));
        }
    
        return back();
    }

    public function userUpvotes()
    {
        $ids = currentUser()->myUpvotes->pluck('saas_id');
        $saas = Saas::wherein('id', $ids)->get();

        return view('myupvotes', compact('saas'));
    }

    public function addReview(Request $request)
    {
        $data = $request->validate([
            'saas_id' => 'required|integer',
            'body' => 'min:10|max:1000|string'
        ]);

        Review::create([
            'user_id' => currentUserId(),
            'saas_id' => $request->saas_id,
            'body' => $data['body'],
       ]);

        $saas = Saas::find($request->saas_id);

        $msg = $saas->name . ' Was Reviewed By ' . currentUser()->name;
        $saas->user->notify(new UserNotifications($msg));

        return back();
    }
}

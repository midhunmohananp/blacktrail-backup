<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\User;
use Validator ; 
use App\Criminal ;
// use Illuminate\Validation\Validator ; 

class CriminalsController extends Controller
{
    /**
     * Display a listing of the resource
.     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
    return view("criminals");
}


public function showData(Request $request)
{

}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries = Country::select("name","id","currency_code","currency_symbol")->get();
        
        $admins = User::admins()->select("display_name","id")->get();
        
        return view('admin.post-criminals-form',[
            'countries' => $countries,
            'admins' => $admins,
            'criminal' => new Criminal 
        ]);


    }

    /*Maka add na ta but what lacks is that dli lang kadawat og pictures. */
    public function store_criminal(User $user)
    {
        /*
        If user is not logged on. or that he's not an adminstrator to the app
        */
        if (auth()->check() === false && !auth()->user()->isAdmin()) {
            abort(401, 'Unauthorized.');
       // return response('You are not authorized', 401);
        }
        
        dd(request()->all());

        $validator = Validator::make(request()->input('form'), [
            'full_name' => 'required|string|min:120',
            'contact_person'            => 'required|numeric',
            'contact_number'            => 'required|string',
            'last_seen'                 => 'required|string',
            'status'                    => 'required|numeric',
            'country_id'                => 'required|numeric',
            'body'                      => 'required'
        ]);

        $criminal = Criminal::create([
            'full_name'         =>             request()->input("form.criminals_name"),
            // 'last_name'          =>             request()->input("form.last_name"),
            // 'middle_name'        =>             request()->input("form.middle_name"),
            'alias'              =>             request()->input("form.alias"),
            'posted_by'          =>             request()->input("form.contact_person"),
            'contact_number'     =>             request()->input("form.contact_number"),
            'status'             =>             request()->input("form.status"),
            'country_id'         =>             request()->input("form.country_id"),
        ])->profile()->create([
            'last_seen'               =>                request()->input("form.last_seen"),
            'bounty'                  =>        request()->input("form.bounty"),
            'complete_description'    =>        "<div><!--block--><strong>Fill all description of the criminal that are not listed above such as :</strong><br><br>1. Height :&nbsp;<br>2. Weight<br>3. Eye Color<br>4. Body Frame<br>5. Any other details</div>"
        ]);
            return response()->json($criminal, 201);

/*
if (request()->wantsJson()) {
}*/



        /*        Post::create([
        'full_name'          =>             request()->input("criminals_name"),
        'alias'              =>             request()->input("alias"),
        'posted_by'          =>             request()->input("contact_person"),
        'contact_number'     =>             request()->input("contact_number"),
        'status'             =>             request()->input("status"),
        'country_id'         =>             request()->input("country_id"),
        ]);
        */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $criminal = Criminal::with('profile','crimes','country')->findOrFail($id);
        return view("admin.criminals.show",['criminal' => $criminal]) ; 
            // dd($criminal)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($criminal)
    {
        $ownerId = Criminal::where("id",$criminal)->select('posted_by')->first();
        $user = auth()->user()->id ; 
        abort_unless($user === $ownerId->posted_by, 403);
        $criminal = Criminal::with('profile','country')->findOrFail($criminal);
        $countries = Country::select('id','name')->get();
        $admins = User::admins()->select("display_name","id")->get();
        return view("admin.criminals.edit",compact("criminal",'countries','admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $criminal
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $criminal = Criminal::findOrFail($id);
        dd($criminal);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $criminal = Criminal::findOrFail($id);
        $criminal->delete() ;
    }


}

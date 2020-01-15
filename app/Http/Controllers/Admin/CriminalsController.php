<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\User;
use Illuminate\Support\Str;
use Validator ;
use App\Criminal ;
use App\Crime ; 
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
// use Illuminate\Validation\Validator ; 
use Storage ; 
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
    public function store_criminal(Request $request)
    {
        /*
        If user is not logged on. or that he's not an administrator to the app
        */
        if (auth()->check() === false || !auth()->user()->isAdmin()) {
            abort(401, 'Unauthorized.');
            // return response('You are not authorized', 401);
        }

        $this->validate($request, [
            'form.first_name' => 'required|min:2',
            'form.middle_name' => 'nullable|min:2',
            'form.last_name' => 'required|min:2',
            'form.avatar' => 'nullable',
            'form.alias' => 'required|min:2|single_word',
            'form.currency' => 'required|string',
            'form.bounty' =>  'required|numeric',
            'form.full_name' => 'nullable|string|min:20',
            'form.posted_by' => 'required|numeric',
            'form.contact_number' => 'required|string',
            'form.last_seen' => 'required|string',
            'form.status' => 'required|numeric',
            'form.country_id' => 'required|numeric' ,
            'form.body' => 'nullable'
        ]);

        $formData = $request->input('form');

        //$this->validateInputs(request()->input());

        /*if there's an avatar*/
        if( $request->hasFile('form.avatar') ){ //!is_null(request()->input('form.avatar')

            $save_path = public_path('assets/images/');
            
            if (!file_exists($save_path)) {
                mkdir($save_path, 666, true);
            }
            
            $image = $request->file('form.avatar'); //request()->input('form.avatar');
            $file_name = Str::slug($formData['last_name'] . $formData['first_name']) . time().'.' . $image->getClientOriginalExtension();

            Image::make(request()->input('form.avatar'))
                ->resize(200,200)
                ->save($save_path.$file_name);

            Criminal::saveCriminal($request, $file_name);

            return response()->json(['success' => 'You have successfully registered this criminal'],200);

        } else {

           Criminal::saveCriminal($request);

           return response()->json(['success' => 'You have successfully registered this criminal'],200);
     /*    return response()->json([
            'success' => true,
            'id' => $file->id
        ], 200);*/
    }

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
        $criminal = Criminal::with('profile','country','crimes')->findOrFail($criminal);
        $countries = Country::select('id','name')->get();
        $admins = User::admins()->select("display_name","id")->get();
        $crimes = Crime::select('criminal_offense')->get();
        return view("admin.criminals.edit",compact("crimes", "criminal",'countries','admins'));
    
    }

    public function remove_photo($image){
    	Storage::disk('s3')->delete('images/'. $image);
    	return back()->withSuccess('Image was deleted successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $criminal
     * @return \Illuminate\Http\response
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

    protected function validateInputs(){
       return Validator::make(request()->input('form'), [
            'first_name'                => 'required|min:2',
            'middle_name'                => 'required|min:2',
            'last_name' => 'required|min:2',
            'avatar'                    => 'required',
            'alias'                     => 'required|min:2|single_word',
            'currency'                  => 'required|numeric',
            'bounty'                    =>  'required|numeric',
            'full_name'                 => 'required|string|min:120',
            'posted_by'                 => 'required|numeric',
            'contact_number'            => 'required|string',
            'last_seen'                 => 'required|string',
            'status'                    => 'required|numeric',
            'country_id'                => 'required|numeric' ,
            'body'                      => 'required'
    ]);

   }


}

<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\User;
use Illuminate\Support\Str;
use Validator ;
use App\Criminal ;
use App\CriminalInfo ;
use App\Crime ; 
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Storage ; 
// use Illuminate\Validation\Validator ; 

class CriminalsController extends Controller
{
	    /**
	     * Display a listing of @upthe resource
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

    static public function base64Decode(string $string, ?bool $strict = false)
    {
      return base64_decode($string, $strict);
    }

    /*Maka add na ta but what lacks is that dli lang kadawat og pictures. */
    public function store_criminal(Request $request)
    {
      if (auth()->check() === false || !auth()->user()->isAdmin()) {
        abort(401, 'Unauthorized.');
      }

      $this->validate($request, [
        'avatar' => 'nullable',
        'form.first_name' => 'required|min:2',
        'form.middle_name' => 'nullable|min:2',
        'form.last_name' => 'required|min:2',
        'form.full_name' => 'nullable|string|min:20',
        'form.alias' => 'required|min:2|single_word',
        'form.currency' => 'required|string',
        'form.bounty' =>  'required|numeric',
        'form.posted_by' => 'required|numeric',
        'form.contact_number' => 'required|string',
        'form.last_seen' => 'required|string',
        'form.status' => 'required|numeric',
        'form.country_id' => 'required|numeric' ,
        'form.body' => 'nullable'
      ]);



      // dd(request()->input('form.avatar'));

      /*    Storage::put('dogs/'.$dog->id,file_get_contents($request->file('form.picture')->getRealPath()));  */

      /*if there's an avatar*/
      if(request()->has('form.avatar')){
        $base64String= request()->input('form.avatar') ; 
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',$base64String));
        $imageName = str_random(30) . '.png';
        $p = Storage::disk('local')->put('' . $imageName, $image, 'public'); 
        $image_url = Storage::disk()->url($imageName);
        Criminal::saveCriminal(request(), $imageName);
        return response()->json(['success' => 'You have successfully registered this criminal'],200);   
      } else {

        // dd("Has No file");
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
    public function edit($crim)
    {
      $ownerId = Criminal::where("id",$crim)->select('posted_by')->first();
      $body_types = collect(CriminalInfo::getEnumColumnValues('criminal_profiles','body_frame'));
      $user = auth()->user()->id ; 
      abort_unless($user === $ownerId->posted_by, 403);
      $criminal = Criminal::with('profile','country','crimes')->findOrFail($crim);
      $admins = User::admins()->select("display_name","id")->get();
      $crimes = Crime::select('id','criminal_offense')->get();     
      $countries = Country::select("name","id","currency_code","currency_symbol")->get();
      return view("admin.criminals.edit", compact("crimes", "criminal",'countries','admins','body_types'));
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
    public function update(Request $request, Criminal $criminal) 
    {
        // $criminal = Criminal::findOrFail($id);        
 /*
        If user is not logged on. or that he's not an administrator to the app
        /*  */
        if (auth()->check() === false || !auth()->user()->isAdmin()) {
          abort(401, 'Unauthorized.');
        } 

        /*we validate if there's an input*/
        $this->validate($request, [
          'form.first_name' => 'required|min:2',
          'form.middle_name' => 'nullable|min:2',
          'form.full_name' => 'nullable|string', 
          'form.last_name' => 'required|min:2',
          'form.alias' => 'required|min:2|single_word',
          'form.avatar' => 'nullable',
          'form.birthplace' => 'nullable|string',
          'form.currency' => 'required|string',
          'form.country_id' => 'required|numeric' ,
          'form.bounty' =>  'required|numeric',
          'form.posted_by' => 'required|numeric',
          'form.contact_number' => 'required|string',
          'form.contact_person' => 'required|string',
          'form.last_seen' => 'required|string',
          'form.status' => 'required|numeric',
          'form.body' => 'nullable'
        ]);

        $criminal = Criminal::findOrFail(request()->input('id'));
        abort_if(auth()->id() != $criminal->posted_by, 403);

        // dd(collect(request('input'))); 

        /* if there's an avatar included and to be replaced.*/
        if(request()->has('form.avatar')){

          $base64String = request()->input('form.avatar');           
          $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',$base64String));
          
          $imageName = str_random(30) . '.png';          

          $p = Storage::disk('local')->put('' . $imageName, $image, 'public');                    
          
          Storage::delete($criminal->photo);
          
          $image_url = Storage::disk()->url($imageName);

          $cr = $criminal->update([
            'first_name'         =>             $request->input("form.first_name"),
            'middle_name'        =>             $request->input("form.middle_name"),
            'last_name'          =>             $request->input("form.last_name"),
            'contact_number'     =>             $request->input("form.contact_number"),
            'contact_person'     =>             $request->input("form.contact_person"),
            'alias'              =>             $request->input("form.alias"),
            'country_id'         =>             $request->input("form.country_id"),
            'posted_by'          =>             $request->input("form.posted_by"),
            'status'             =>             $request->input("form.status"),
            'photo'              =>             $imageName
          ]);


          if ( $cr == true){
            $updated =  CriminalInfo::where('criminal_id','=',request()->input('id'))
            ->update(['criminal_id' =>                request()->input('id'),
             'birthplace' =>                          request()->input('form.birthplace'),
             'last_seen' =>                           request()->input('form.last_seen'),
             'birthdate' =>                           request()->input('form.birthdate'),
             'eye_color' =>                           request()->input('form.eye_color'),
             'weight_in_kilos' =>            request()->input('form.weight'),
             'height_in_feet_and_inches' =>  request()->input('form.height'),
             'body_frame' =>                 request()->input('form.body_frame'),
             'country_of_origin' =>          request()->input('form.country_of_origin'),
             'currency' =>                   request()->input('form.currency'),
             'bounty' =>                     request()->input('form.bounty'),
             'complete_description' =>       request()->input('form.complete_description')
           ]);


            $items = collect(request('input'));
            
            dd($items);

            $val = $items->pluck('crime_description', 'id')->mapWithKeys(function($item, $key) {
              return [$key => ['crime_description' => $item->pivot->crime_description]];
            });

            $cr = $criminal->crimes()->attach($val);

            return response($val,201);


          } else {
            dd("false");
          }


        } else {
      // dd("Has No file");
          Criminal::saveCriminal($request);
          return response()->json(['success' => 'You have successfully registered this criminal'],200);
   /*    return response()->json([
          'success' => true,
          'id' => $file->id
        ], 200);*/
      }

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

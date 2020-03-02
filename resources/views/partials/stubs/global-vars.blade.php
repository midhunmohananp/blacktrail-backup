{!! json_encode([
	'csrfToken' =>  csrf_token(),
	'user'      =>  Auth::user(),
	'signedIn' 	=>  Auth::check(), // returns false if a user is not logged on or no one is logged in and true if it's logged on 
	'apiDomain'     	  =>  url('/'),
	'postRegisterUrl' 	  =>  route('register'),   
	'algoliaPlacesId' 	  =>  env('ALGOLIA_PLACES_APP_ID'), 
	'algoliaSearchApiKey' =>  env('ALGOLIA_PLACES_SEARCH_ONLY_API_KEY'), 
	'algoliaAdminApiKey'  =>  env('ALGOLIA_PLACES_ADMIN_API_KEY'),
	'publicPath'		  =>  public_path(),
	'storagePath'		  =>  storage_path(),
	'algoliaKey' 		  =>  env('ALGOLIA_SECRET'),
	'addCriminalUrl' 	  =>  route('admin.criminals.store'),
	'savePhotosUrl' 	  =>  route('admin.photos.uploads'),
	'resourcePath' 		  =>  resource_path()
]) !!};    
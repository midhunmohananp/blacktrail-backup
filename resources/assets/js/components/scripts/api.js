export const user 	 						=      window.App.user  ; 
export const algoliaId 						=  	   window.App.algoliaId ; 
export const algoliaKey 					= 	   window.App.algoliaKey ;
export const assetPath 						=  	   window.App.publicPath ; 
export const app 							=	   window.App.apiDomain; 
export const urlSaveCriminal 				= 	   window.App.addCriminalUrl; 
export const url_for_saving_photos			=      window.App.savePhotosUrl; 
export const resourcePath			 		=      window.App.resourcePath; 
export const csrfToken 						=     	   window.App.csrfToken; 

export default {
	csrfToken : csrfToken, 
	user : user ,
	algoliaId , 
	algoliaKey ,
	publicPath : assetPath ,
	app,
	urlSaveCriminal ,
	url_for_saving_photos
};


// // or
// export const APP_CONFIG = {
// 	user : user,
// 	algoliaId : algoliaId, 
// 	algoliaKey : algoliaKey,
// 	publicPath : assetPath,
// 	app : app 
// }



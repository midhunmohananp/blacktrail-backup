// used for returning api url's for xhr requests.

import api from './api';

const urlDomain = api.app ; 
const urlSaveCriminal  = urlDomain + '/admin/criminals' ; 
const url_for_saving_photos  = urlDomain + '/admin/photos/uploads'; 
const add_bounty_url  = urlDomain + '/api/v1/bounty/add'; 
const fixerApi  = urlDomain + 'api/v1/bounty/update/fixer'; 
const currencyLayerApi  = urlDomain + '/api/v1/bounty/update'; 
const convertCurrencyUrl = urlDomain + "/currency/convert";

export default { 
	storeCriminalUrl : urlSaveCriminal ,
	url_for_saving_photos ,
	urlDomain ,
	fixerApi,
	currencyLayerApi,
	add_bounty_url,
	convertCurrencyUrl
}


// used for returning api url's for xhr requests.

import api from './api';

const urlDomain = api.app ; 
const urlSaveCriminal  = api.urlSaveCriminal ; 
const url_for_saving_photos  = urlDomain + '/admin/photos/uploads'; 
const add_bounty_url  = urlDomain + '/api/v1/bounty/add'; 
const fixerApi  = urlDomain + 'api/v1/bounty/update/fixer'; 
const currencyLayerApi  = urlDomain + '/api/v1/bounty/update'; 
const convertCurrencyUrl = urlDomain + "/currency/convert";
const destroyUserUrl = urlDomain + "/api/v1/user/delete";
const activateUserUrl = urlDomain + "/api/v1/user/activate";
const fetch_criminals_respondent = urlDomain + "/api/v1/respondent/criminal";
const respond_to_criminal = urlDomain + "/respond/criminal";
const fetch_messages_endpoint = urlDomain + "/api/v1/messages/get";
const send_messages_endpoint = urlDomain + "/api/v1/messages/send";

export default { 
	urlSaveCriminal ,
	url_for_saving_photos ,
	urlDomain ,
	fixerApi,
	currencyLayerApi,
	add_bounty_url,
	convertCurrencyUrl,
	destroyUserUrl,
	activateUserUrl,
	fetch_criminals_respondent,
	fetch_messages_endpoint,
	// save_photos_endpoint
}


<?php
/**
* CodeIgniter TwitterFetcher Class
*
* TwitterFetcher fetches Twitter data via the provided Twitter username
*
* By Joe Auty @ http://www.netmusician.org
* 
* http://getsparks.org/packages/TwitterFetcher/show
* 
*/

class twitterfetcher {
	
	function __construct() {
		$this->CI =& get_instance();
	}
	
	function getTweets($configObj = array()) {
		// set some defaults
		if (!isset($configObj['count'])) {
			$configObj['count'] = 1;
		}
		if (!isset($configObj['usecache'])) {
			$configObj['usecache'] = true;
		} elseif ($configObj['usecache'] === false) {
			log_message('info', 'TwitterFetcher: cache should always be enabled unless you know what you are doing.');
		}
		if (!isset($configObj['cachefile'])) {
			$configObj['cachefile'] = "";
		}
		if (!isset($configObj['cacheduration'])) {
			$configObj['cacheduration'] = 5;
		}
		if (!isset($configObj['createlinks'])) {
			$configObj['createlinks'] = true;
		}
		// hardcoded cache file
		$configObj['cachefile'] = ($configObj['cachefile']) ? $configObj['cachefile'] . ".json" : 'twitterstatus.json';
		
		// debug
		//$configObj['usecache'] = false;

		// throw up some errors	
		if ($configObj['usecache'] && !is_writable(APPPATH . "cache")) {
			show_error('ERROR: Twitter cache file cannot be written to ' . APPPATH . "cache/" . $configObj['cachefile']);
		}
		if (!isset($configObj['consumerKey']) || !isset($configObj['consumerSecret']) || !isset($configObj['accessToken']) || !isset($configObj['accessTokenSecret'])) {
			show_error('ERROR: You need to provide the consumerKey, consumerSecret, accessToken, and accessTokenSecret configuration parameters');
		}
		// hard coded Twitter user_timeline URL
		$configObj['url'] = "https://api.twitter.com/1.1/statuses/user_timeline.json";

		if ($configObj['usecache']) {
			// download new twitter status if older than five minutes

			// timestamp five minutes ago
			$cache = mktime(date('H'), date('i') - $configObj['cacheduration'], date('s'), date('m'), date('d'), date('Y'));	

			if (!file_exists(APPPATH . "cache/" . $configObj['cachefile']) || !file_get_contents(APPPATH . "cache/" . $configObj['cachefile']) || filemtime(APPPATH . "cache/" . $configObj['cachefile']) < $cache) {
				// refresh cache
				$this->downloadTwitterStatus($configObj);
			}	
			
			if (!file_exists(APPPATH . "cache/" . $configObj['cachefile'])) {
				show_error('ERROR: There was a problem accessing or refreshing your TwitterFetcher cache file');
			}	

			if (file_get_contents(APPPATH . "cache/" . $configObj['cachefile'])) {
				$twitterstatus = $this->formatTweets($configObj, json_decode(file_get_contents(APPPATH . "/cache/" . $configObj['cachefile'])));	
				
				if ($configObj['count'] == 1) {
					if (isset($twitterstatus[0])) {
						return $twitterstatus[0];
					}
					else {
						return false;
					}
				}
				else {
					return $twitterstatus;
				}
			}	
		}
		else if (!$this->downloadTwitterStatus($configObj)) {
			show_error('ERROR: There was a problem accessing your tweets');
		}
		else {
			$twitterstatus = $this->formatTweets($configObj, $this->downloadTwitterStatus($configObj));
						
			if ($configObj['count'] == 1) {
				if (isset($twitterstatus[0])) {
					return $twitterstatus[0];
				}
				else {
					return false;
				}
			}
			else {
				return $twitterstatus;
			}
		}	

	}
	
	function formatTweets($configObj, $twitterstatus) {
		$totaltweets = count($twitterstatus);
		for ($x=0; $x < $totaltweets; $x++) {
			$thiselapsedtime = $this->elapsedTime(strtotime($twitterstatus[$x]->created_at));
			if (isset($configObj['numdays']) && $thiselapsedtime['days'] > $configObj['numdays']) {
				unset($twitterstatus[$x]);
				continue;
			}	
			if ($configObj['createlinks']) {
				$twitterstatus[$x]->text = $this->convertToLinks($twitterstatus[$x]->text);
			}
			$twitterstatus[$x]->elapsedtime = $this->elapsedTimeString($thiselapsedtime);
		}
		return $twitterstatus;
	}

	function downloadTwitterStatus($configObj) {
		// Add the authorize token to the request
		$oauth = $this->initOAuth($configObj);
		
		$header = array($this->buildAuthorizationHeader($oauth), 'Expect:');
		$options = array( CURLOPT_HTTPHEADER => $header,
		                  //CURLOPT_POSTFIELDS => $postfields,
		                  CURLOPT_HEADER => false,
		                  CURLOPT_URL => $configObj['url'],
		                  CURLOPT_RETURNTRANSFER => true,
		                  CURLOPT_SSL_VERIFYPEER => false);

		$feed = curl_init();
		curl_setopt_array($feed, $options);
		$json = curl_exec($feed);
		$tweets = json_decode($json);
		curl_close($feed);

		if ($configObj['usecache'] && !isset($tweets->error)) {
			$twittercheck = json_encode($tweets);
			if (is_array($tweets) && isset($tweets[0]) && $tweets[0]->text) {
				$fh = fopen(APPPATH . "cache/" . $configObj['cachefile'], "w");
				fwrite($fh, $twittercheck);
				fclose($fh);
			}	
		}
		else if (isset($tweets->errors) || isset($tweets->error)) {
			return false;
		}
		else {
			return $tweets;
		}
	}
	
	function convertToLinks($string) {
		// added space to beginning and end of string to capture links anchored to either end
		$string = " " . $string . " ";
		// string contained in the middle
		$string = trim(preg_replace('/\s(http|https)\:\/\/(.+?)\s/m', ' <a href = "$1://$2" target="_blank">$1://$2</a> ', $string));
		// convert @mentions to links
		$string = trim(preg_replace("/(?<=\A|[^A-Za-z0-9_])@([A-Za-z0-9_]+)(?=\Z|[^A-Za-z0-9_])/", "<a href='http://twitter.com/$1' target='_blank'>$0</a>", $string));
		// convert #hashtags to links
		$string = trim(preg_replace("/(?<=\A|[^A-Za-z0-9_])#([A-Za-z0-9_]+)(?=\Z|[^A-Za-z0-9_])/", "<a href='http://twitter.com/search?q=%23$1' target='_blank'>$0</a>", $string));
		return $string;
	}
	
	function elapsedTime ( $start, $end = false) {
		$returntime = array();
		
		// set defaults
		if ($end == false) {
			$end = time();
		}

		$diff = $end - $start;
		$days = floor($diff/86400); 
		$diff = $diff - ($days*86400); 

		$hours = floor ($diff/3600); 
		$diff = $diff - ($hours*3600); 

		$mins = floor ($diff/60); 
		$diff = $diff - ($mins*60); 

		$secs = $diff;

		if ($secs > 0) {
			$returntime['secs'] = $secs;
		}
		else {
			$returntime['secs'] = 0;
		}

		if ($mins > 0) {
			$returntime['mins'] = $mins;
		}
		else {
			$returntime['mins'] = 0;
		}

		if ($hours > 0) {
			$returntime['hours'] = $hours;
		}
		else {
			$returntime['hours'] = 0;
		}

		if ($days > 0) {
			$returntime['days'] = $days;
		}
		else {
			$returntime['days'] = 0;
		}

		return $returntime;
	}
	
	function elapsedTimeString($elapsedtime) {
		if ($elapsedtime['days'] == 0) {
			if ($elapsedtime['hours'] == 0) {
				// show minutes
				return $elapsedtime['mins'] . " minute" . (($elapsedtime['mins']>1) ? "s":"") . " ago";
			}
			else {
				// show hours
				return $elapsedtime['hours'] . " hour" . (($elapsedtime['hours']>1) ? "s":"") . " ago";
			}
		}
		else {
			// show days
			return $elapsedtime['days'] . " day" . (($elapsedtime['days']>1) ? "s":"") . " ago";
		}
	}
	
	function buildBaseString($baseURI, $method, $params) {
		$r = array();
		ksort($params);
		foreach($params as $key=>$value){
			$r[] = "$key=" . rawurlencode($value);
		}
		return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
	}
	
	function buildAuthorizationHeader($oauth) {
		$r = 'Authorization: OAuth ';
		$values = array();
		foreach($oauth as $key=>$value)
			$values[] = "$key=\"" . rawurlencode($value) . "\"";
		$r .= implode(', ', $values);
		return $r;
	}
	
	function initOAuth($configObj) {
		if ($configObj['usecache'] && file_exists($configObj['cachefile'])) {
			$jsonobj = json_decode(file_get_contents($configObj['cachefile']));
			//$jsonobj = $jsonobj->$configObj['consumerKey']; // only use the token which belongs to this consumerKey
		} 
		else {
			$basicToken = base64_encode(rawurlencode($configObj['consumerKey']) . ":" . rawurlencode($configObj['consumerSecret']));
	        
			$ch = curl_init();
			
			$oauth = array( 'oauth_consumer_key' => $configObj['consumerKey'],
			                'oauth_nonce' => time(),
			                'oauth_signature_method' => 'HMAC-SHA1',
			                'oauth_token' => $configObj['accessToken'],
			                'oauth_timestamp' => time(),
			                'oauth_version' => '1.0');
							
			$base_info = $this->buildBaseString($configObj['url'], 'GET', $oauth);
			$composite_key = rawurlencode($configObj['consumerSecret']) . '&' . rawurlencode($configObj['accessTokenSecret']);
			$oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
			$oauth['oauth_signature'] = $oauth_signature;
			return $oauth;
		}

		return $jsonobj;
	}

}

?>

<?php
return array(
	// set your paypal credential
	'client_id' => 'AdL_I0CZ2Dbd-4bHJUVrVFHKpx4e4sgVBDn_WY9BFN0xdVX1fuXy5_pv_THdhe5v7wWTX-XC4ZVgfbfz',
	'secret' => 'EE3YVHLlMDOXsp2VsLY20e7o20_XAFL6o-jarmdWTQ_Dek2WJdKHhP1E4o46Nqc7qptM0FI8LDeEfSzH',
	/**
	 * SDK configuration
	 */
	'settings' => array(
		/**
		 * Available option 'sandbox' or 'live'
		 */
		'mode' => 'sandbox',
		/**
		 * Specify the max request time in seconds
		 */
		'http.ConnectionTimeOut' => 30,
		/**
		 * Whether want to log to a file
		 */
		'log.LogEnabled' => true,
		/**
		 * Specify the file that want to write on
		 */
		'log.FileName' => storage_path() . '/logs/paypal.log',
		/**
		 * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
		 *
		 * Logging is most verbose in the 'FINE' level and decreases as you
		 * proceed towards ERROR
		 */
		'log.LogLevel' => 'FINE',
	),
);
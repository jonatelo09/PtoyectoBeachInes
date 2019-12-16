<?php

return [

	'mailgun' => [
		'domain' => env('MAILGUN_DOMAIN'),
		'secret' => env('MAILGUN_SECRET'),
		'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
	],

	'paypal' => [
		'base_uri' => env('PAYPAL_BASE_URI'),
		'client_id' => env('PAYPAL_CLIENT_ID'),
		'client_secret' => env('PAYPAL_CLIENT_SECRET'),
		'class' => App\Services\PayPalService::class,
	],

	'postmark' => [
		'token' => env('POSTMARK_TOKEN'),
	],

	'ses' => [
		'key' => env('AWS_ACCESS_KEY_ID'),
		'secret' => env('AWS_SECRET_ACCESS_KEY'),
		'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
	],

	'sparkpost' => [
		'secret' => env('SPARKPOST_SECRET'),
	],

	'stripe' => [
		'base_uri' => env('STRIPE_BASE_URI'),
		'key' => env('STRIPE_KEY'),
		'secret' => env('STRIPE_SECRET'),
		'class' => App\Services\StripeService::class,
	],

];

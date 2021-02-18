<?php

	/* the home controller containing the logic for the subscription-handling */

	return function($kirby, $pages, $page) {

	    $alert = null;

	    if($kirby->request()->is('POST') && get('submit')) {

	        // check the honeypot
	        if(empty(get('website')) === false) {
	            go($page->url());
	            exit;
	        }

	        $data = [
	            'email' => get('email')
	        ];

	        $rules = [
	            'email' => ['required', 'email']
	        ];

	        $messages = [
	            'email' => 'Bitte gib eine gültige E-Mail-Adresse ein.'
	        ];

	        // some of the data is invalid
	        if($invalid = invalid($data, $rules, $messages)) {
	            $alert = $invalid;
	        } else {
	        	// the data is fine, let's continue
	        	
	            try {
	                $kirby->email([
	                    'template' => 'email',
	                    'from'     => 'yourcontactform@yourcompany.com',
	                    'replyTo'  => $data['email'],
	                    'to'       => 'you@yourcompany.com',
	                    'subject'  => esc($data['name']) . ' sent you a message from your contact form',
	                    'data'     => [
	                        'text'   => esc($data['text']),
	                        'sender' => esc($data['name'])
	                    ]
	                ]);

	            } catch (Exception $error) {
	                if(option('debug')):
	                    $alert['error'] = 'The form could not be sent: <strong>' . $error->getMessage() . '</strong>';
	                else:
	                    $alert['error'] = 'The form could not be sent!';
	                endif;
	            }

	            // no exception occurred, let's send a success message
	            if (empty($alert) === true) {
	                $success = 'Your message has been sent, thank you. We will get back to you soon!';
	                $data = [];
	            }
	        }
	    }

	    return [
	        'alert'   => $alert,
	        'data'    => $data ?? false,
	        'success' => $success ?? false
	    ];
	};
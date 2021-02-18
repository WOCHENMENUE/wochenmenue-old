<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
return [
    'debug' => true,
    'db' => [
    	'host' => 'localhost:3308',
    	'database' => 'wochenmenue',
    	'user' => 'root',
    	'password' => '',
    ],
    'phpListURL' => 'https://beta.wochenmenue.rubylon.com/list1/?p=asubscribe&id=1', // The URL to the phpList-subscription form (cf. https://www.phplist.org/manual/books/phplist-manual/page/creating-a-subscribe-page#bkmrk-add-an-ajax-subscrib)
    'phpListHTMLEmail' => 1, // set the standard value for the subscription form
    'phpListId' => 3, // ID of the List to add new subscribers to
];

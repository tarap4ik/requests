<?php 

return [
	'login' => [
		'controller' => 'account',
		'action' => 'login',
	],
    'logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],
    '' => [
        'controller' => 'order',
        'action' => 'index',
    ],
	'add' => [
		'controller' => 'order',
		'action' => 'add',
	],
    'xml' => [
        'controller' => 'order',
        'action' => 'xml',
    ],
    'view/{id:\d+}' => [
        'controller' => 'order',
        'action' => 'view',
    ]
];
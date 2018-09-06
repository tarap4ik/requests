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
        'controller' => 'main',
        'action' => 'index',
    ],
	'add' => [
		'controller' => 'main',
		'action' => 'add',
	],
    'xml' => [
        'controller' => 'main',
        'action' => 'xml',
    ],
    'view/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'view',
    ]
];
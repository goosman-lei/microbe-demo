<?php
$webpage = [
    'systemChains' => [
        'canonicalUri' => [
            'base_uri' => '/003.demo-app',
        ],
        'router' => [
            'class'  => '\\Microbe\\Scene\\Webpage\\Router\\RStatic',
            'config' => [
                'default_module' => 'index',
                'default_action' => 'index',
            ],
        ],
        'templateEngine' => include(__DIR__ . '/template_engine.inc'),
        'dispatcher' => [
            'namespace' => '\\MicrobeDemo\\Action',
        ],
    ],
    'userChains' => [
        'feature' => [
            'class'     => '\\MicrobeDemo\\Chain\\Feature',
            'config'    => include(__DIR__ . '/feature.inc'),
            'direction' => 'append',
            'target'    => '-root',
        ],
        'error' => [
            'class'     => '\\Microbe\\Chain\\Error',
            'config'    => [],
            'direction' => 'append',
            'target'    => '-root',
        ],
        'error-tpl' => [
            'class'     => '\\Microbe\\Scene\\Webpage\\Chain\\ErrorTemplate',
            'config'    => [
                'rules' => [
                    '*' => 'error',
                ],
            ],
            'direction' => 'append',
            'target'    => '-template-engine',
        ],
    ],
];
$daemon = [
    'systemChains' => [
        'router' => [
            'class'  => '\\Microbe\\Scene\\Daemon\\Router\\ROption',
            'config' => [],
        ],
        'dispatcher' => [
            'namespace' => '\\MicrobeDemo\\Daemon',
        ],
    ],
    'userChains' => [],
];
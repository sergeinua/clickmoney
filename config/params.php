<?php

$forms = [
    'aweber' => [
        'meta_web_form_id' => '180194731',
        'listname' => 'awlist4472749',
        'redirect_url' => 'https://www.aweber.com/thankyou.htm?m=default',
        'redirect_id' => 'redirect_03fe817eefa01a03e967977a8c340f50',
        'meta_adtracking' => 'CM_form',
        'meta_message' => '1',
        'img_url' => 'https://forms.aweber.com/form/displays.htm?id=jBwMjJws7MyM'
    ],
    'ymlp' => [
        'action' => 'https://ymlp.com/subscribe.php?id=gwbqjmugmgb'
    ],
];

return [
    'adminEmail' => 'admin@example.com',
    'domain_name' => 'ClickMoneySystem.com',
    'company_name' => 'ClickMoneySystem',
    'support_email' => 'support@clickmoneysystem.com',
    'esp_forms' => $forms,
    'esp_forms_exit' => $forms,
    'esp_forms_overlay' => $forms
//        [
//        'mailminion' => [
//            'action' => 'https://dashboard.mailminion.com/lists/vb520bcxxo880/subscribe'
//        ],
//        'getresponse' => [
//            'campaign_token' => 'nciX6',
//        ],
//    ]
];

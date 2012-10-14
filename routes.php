<?php
/**
 * Routes determine which controller and method to respond
 * to which URLS using regex patterns.
 */
$routes = array(
    array( '^$', 'pages.home' ),
    array( '^secure/$', 'pages.secure' ),
    array( '^login/$', 'account.login'),
    
    array( '^glossary/$', 'glossary.index'),
    array( '^glossary/add/$', 'glossary.add'),
    array( '^glossary/([-a-z]+)/$', 'glossary.show'),
    array( '^glossary/([-a-z]+)/delete/$', 'glossary.delete'),
    array( '^glossary/([-a-z]+)/edit/$', 'glossary.edit'),

    array( '^trainees/$', 'trainees.index'),
    array( '^trainees/([0-9]+)/$', 'trainees.show'),
    array( '^trainees/([0-9]+)/edit/$', 'trainees.edit'),
    array( '^trainees/add/$', 'trainees.add'),
    array( '^trainees/([0-9]+)/update/$', 'trainees.update'),

    array( '^performance/([-a-z]+)/$', 'performance.show'),
    array( '^performance/([-a-z]+)/edit/$', 'performance.edit'),
    array( '^performance/([-a-z]+)/update/$', 'performance.update'),

    array( '^module/([-a-z]+)/$', 'module.show'),
    array( '^module/([-a-z]+)/edit/$', 'module.edit'),
    array( '^module/([-a-z]+)/update/$', 'module.update'),

    array( '^log/([-a-z]+)/$', 'log.show'),
    
    array( '^users/$', 'users.index'),
    array( '^users/add/$', 'users.add'),
    array( '^users/([0-9]+)/edit/$', 'users.edit'),
    array( '^users/([0-9]+)/reset/$', 'users.reset'),
);
?>

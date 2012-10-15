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
    array( '^glossary/([-a-z0-9]+)/$', 'glossary.show'),
    array( '^glossary/([-a-z0-9]+)/delete/$', 'glossary.delete'),
    array( '^glossary/([-a-z0-9]+)/edit/$', 'glossary.edit'),

    array( '^trainees/$', 'trainees.index'),
    array( '^trainees/([0-9]+)/$', 'trainees.show'),
    array( '^trainees/([0-9]+)/edit/$', 'trainees.edit'),
    array( '^trainees/add/$', 'trainees.add'),
    array( '^trainees/([0-9]+)/update/$', 'trainees.update'),

    array( '^performance/([0-9]+)/$', 'performances.show'),
    array( '^performance/([0-9]+)/update/$', 'performances.update'),

    array( '^module/([-a-z]+)/$', 'module.show'),
    array( '^module/([-a-z]+)/edit/$', 'module.edit'),
    array( '^module/([-a-z]+)/update/$', 'module.update'),

    array( '^log/$', 'log.index'),
    
    array( '^users/$', 'users.index'),
    array( '^users/add/$', 'users.add'),
    array( '^users/([0-9]+)/edit/$', 'users.edit'),
    array( '^users/([0-9]+)/reset/$', 'users.reset'),
);
?>

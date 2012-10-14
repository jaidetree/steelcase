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

    array( '^trainee/$', 'trainee.index'),
    array( '^trainee/([-a-z0-9]+)/$', 'trainee.show'),
    array( '^trainee/([-a-z0-9]+)/edit/$', 'trainee.edit'),
    array( '^trainee/add/$', 'trainee.add'),
    array( '^trainee/([-a-z0-9]+)/update/$', 'trainee.update'),

    array( '^performance/([-a-z0-9]+)/$', 'performance.show'),
    array( '^performance/([-a-z0-9]+)/edit/$', 'performance.edit'),
    array( '^performance/([-a-z0-9]+)/update/$', 'performance.update'),

    array( '^module/([-a-z0-9]+)/$', 'module.show'),
    array( '^module/([-a-z0-9]+)/edit/$', 'module.edit'),
    array( '^module/([-a-z0-9]+)/update/$', 'module.update'),

    array( '^log/([-a-z]+)/$', 'log.show'),

    array( '^users/$', 'users.index'),
    array( '^users/add/$', 'users.add'),
    array( '^users/([0-9]+)/delete/$', 'users.delete'),
    array( '^users/([0-9]+)/edit/$', 'users.edit'),
);
?>

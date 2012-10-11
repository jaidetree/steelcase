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

    array( '^trainee/$', 'trainee.index'),
    array( '^trainee/([-a-z]+)/$', 'trainee.show'),
    array( '^trainee/([-a-z]+)/edit/$', 'trainee.edit'),
    array( '^trainee/add/$', 'trainee.add'),
    array( '^trainee/([-a-z]+)/update/$', 'trainee.update'),

    array( '^performance/([-a-z]+)/$', 'performance.show'),
    array( '^performance/([-a-z]+)/edit/$', 'performance.edit'),
    array( '^performance/([-a-z]+)/update/$', 'performance.update'),

    array( '^module/([-a-z]+)/$', 'module.show'),
    array( '^module/([-a-z]+)/edit/$', 'module.edit'),
    array( '^module/([-a-z]+)/update/$', 'module.update'),

    array( '^log/([-a-z]+)/$', 'log.show'),
);
?>

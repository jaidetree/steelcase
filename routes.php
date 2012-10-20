<?php
/**
 * Routes determine which controller and method to respond
 * to which URLS using regex patterns.
 */
$routes = array(
    array( '^api/(.*)', 'api.route'),
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

    array( '^performances/$', 'performances.index'),
    array( '^performances/([0-9]+)/$', 'performances.show'),
    array( '^performances/([0-9]+)/update/$', 'performances.update'),

    array( '^module/$', 'modules.index'),
    array( '^module/([0-9]+)/edit/$', 'modules.edit'),
    array( '^module/([0-9]+)/delete/$', 'modules.delete'),
    array( '^module/add/$', 'modules.add'),

    array( '^log/$', 'log.index'),
    
    array( '^users/$', 'users.index'),
    array( '^users/add/$', 'users.add'),
    array( '^users/([0-9]+)/edit/$', 'users.edit'),
    array( '^users/([0-9]+)/reset/$', 'users.reset'),
);
?>
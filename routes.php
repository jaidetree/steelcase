<?php
/**
 * Routes determine which controller and method to respond
 * to which URLS using regex patterns.
 */
$routes = array(
    array( '^api/(.*)', 'api.route'),
    array( '^$', 'Pages.home' ),
    array( '^secure/$', 'Pages.secure'),
    array( '^login/$', 'Account.login'),
    array( '^logout/$', 'Account.logout'),
    
    array( '^glossary/$', 'Glossary.index'),
    array( '^glossary/add/$', 'Glossary.add'),
    array( '^glossary/([-a-z0-9]+)/$', 'Glossary.show'),
    array( '^glossary/([-a-z0-9]+)/delete/$', 'Glossary.delete'),
    array( '^glossary/([-a-z0-9]+)/edit/$', 'Glossary.edit'),

    array( '^trainees/$', 'Trainees.index'),
    array( '^trainees/add/$', 'Trainees.add'),
    array( '^trainees/([0-9]+)/$', 'Trainees.show'),
    array( '^trainees/([0-9]+)/delete/$', 'Trainees.delete'),
    array( '^trainees/([0-9]+)/edit/$', 'Trainees.edit'),
    array( '^trainees/([0-9]+)/report/$', 'Trainees.report'),

    array( '^performances/$', 'Performances.index'),
    array( '^performances/module/([0-9]+)/$', 'Performances.by_module'),
    array( '^performances/trainee/([0-9]+)/$', 'Performances.by_trainee'),
    array( '^performances/([0-9]+)/$', 'Performances.show'),
    array( '^performances/([0-9]+)/delete/$', 'Performances.delete'),

    array( '^performanceobjects/$', 'PerformanceObjects.index'),
    array( '^performanceobjects/performance/([0-9]+)/$', 'PerformanceObjects.by_performance'),
    array( '^performanceobjects/([0-9]+)/$', 'PerformanceObjects.show'),
    array( '^performanceobjects/([0-9]+)/delete/$', 'PerformanceObjects.delete'),

    array( '^module/$', 'Modules.index'),
    array( '^module/([0-9]+)/edit/$', 'Modules.edit'),
    array( '^module/([0-9]+)/delete/$', 'Modules.delete'),
    array( '^module/add/$', 'Modules.add'),
    
    array( '^users/$', 'Users.index'),
    array( '^users/add/$', 'Users.add'),
    array( '^users/([0-9]+)/edit/$', 'Users.edit'),
    array( '^users/([0-9]+)/reset/$', 'Users.reset'),
);
?>

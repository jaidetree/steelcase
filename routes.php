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
    array( '^glossary/([-a-z]+)/$', 'glossary.show'),
    array( '^glossary/([-a-z]+)/delete/$', 'glossary.delete'),
    array( '^glossary/([-a-z]+)/edit/$', 'glossary.edit'),
    array( '^glossary/([-a-z]+)/update/$', 'glossary.update'),
);
?>

.. index:: Glossary API

Retrieving Glossary Terms
=========================

Retrieve all glossary terms and definitions.

Usage
-----
::

    var steelcaseapi:SteelcaseAPI = new SteelcaseAPI();
    steelcaseapi.ready(function(){ 
        steelcaseapi.glossary_get(function(response){ 
            trace(response.data[0].name);
        });
    });

Parameters
----------

    callback
        | A function to call once the response is receieved. 

Request URI
"""""""""""
**/api/glossary/get/**

Response
--------
The response data will be a :ref:`json-response` with an array of objects like so:

::

    {
        'status': 'ok',
        'message': 'Glossary items retrieved',
        'error_code': -1,
        'data': [
            {
                'term': '<name>',
                'term': '<definition>'
            }
        ]    
    }
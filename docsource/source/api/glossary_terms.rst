Retrieving Glossary Terms
=========================

Retrieve all glossary terms and definitions.

Usage
-----
::

    steelcaseapi.glossary_get(<token>, function(response){ 
        trace(response.data[0].name);
    });

Parameters
----------

    token
        | Valid token from a generate token request. See :doc:`/api/token_authentication`

Request URI
"""""""""""
**/api/glossary/get**

Response
--------
The response data will be an array of objects like so:

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
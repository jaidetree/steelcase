.. index:: Token Authentication API

Token Authentication
====================

When working with the web service API. Each request you send must be accompanied by a token. **If you use our library, the token will be handled automatically for you.** The token is a string containing two parts. The first part is the data randomly generated with a unix timestamp. The second part involves some mathmatical representation.

The purpose of the token is to make sure unauthorized apps can not access the data within the database. If there is no token or an unvalid one with an API request then the web API server will return an error.

All examples will be based on using our library and will be called at the start of the app.

Usage
-----
::

    request_token(<keyA>, <keyB>, <callback>);


Parameters
----------
    keyA 
        A numerical representation of the time.
    keyB 
        An expected number resulting from manipulation.
    callback
        | A function to receive and process a response.
        | Example: function(response){ trace( response.data.token ); }

Request URI
"""""""""""
**/api/auth/create**

Response
--------
The response data will be a simple JSON object:

::

    {
        'status': 'ok',
        'message': 'Glossary items retrieved',
        'error_code': -1,
        'data': {
            'token': '<token_string>',
        }
    }
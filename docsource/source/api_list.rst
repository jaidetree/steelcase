.. index:: API Index

Flash API Library
=================


.. _json-response:

JSONResponse
------------

When making an API call you will recieve objects that are a instance of the JSONResponse class contained within the steelcaseapi.as library. These behave just like objects parsed from JSON except for the ``is_ok`` method helper.

Example ::

    var steelcaseapi:SteelcaseAPI = new SteelcaseAPI();
    steelcaseapi.trainee_login('555555-555', function(response){ 
        if (response.is_ok())
        {
            trace( response.data.employee_id );
        }else{
            trace( response.message + ' ERROR CODE: ' + response.error_code );
        }
    }):

The ``is_ok`` method returns a boolean if the response is a valid json response and the status sent back was 'ok' as in the API call ran successfully.

API Functions
-------------

.. toctree::
   :maxdepth: 2

   api/token_authentication
   api/trainee_logins
   api/add_performance
   api/glossary_terms

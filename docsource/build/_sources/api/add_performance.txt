Add Performance
===============

Record a score, duration, and meta data for a given trainee in a given module.

Usage
-----
::

    steelcaseapi.performance_add(<token>, <trainee_id>, <module_id>, <score>, <duration>, <meta>, function(response){ 
        trace(response.data.message);
    });

Parameters
----------

    token
        | Valid token from a generate token request. See :doc:`/api/token_authentication`
    trainee_id
        | String to use as the trainee id. 
        | Example: 555555-555
    module_id
        | Integer refering to a named module.
        | Example: 0, 1, 2, 3 - 6
        | See ref:`models/module` for more information.
    callback
        | Function to run when response is returned. Will always be a JSON object. ref:`working_json`
        | Example: function(response){ trace(response.data.trainee); }

Request URI
"""""""""""
**/api/performance/add**

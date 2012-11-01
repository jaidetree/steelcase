.. index:: JSON

Understanding JSON
==================

What is JSON?
-------------

JSON is a machine and human readable format to transfer information between various systems. In the Steelcase API JSON is used to transfer data to and from the Flash interface.

JSON can contain a number of data types from strings, objects, numbers, and arrays. However all JSON data is stored as a string but can get decoded back into the appropriate formats in the recieiving interface.

Example: ::

    {
        'status': 'ok',
        'message': 'This is a json mesage string.',
        'code': 201
    }

Where is it used?
-----------------

There are two places where JSON objects should be created and sent.

   * Sent to the webserver from a Flash file to an API URI
   * From the Webserver from a requested URI such as /api/<module>/<method>

Typical Response Structure
--------------------------

All JSON objects returned from the web API server will contain the following structure: ::
    
    {
        'status': 'ok' 
        'message': '', 
        'error_code': -1,
        'data': { 'employee_id': '555555-555', 'last_updated': 'November 2, 2012' }
    }

Response Breakdown
""""""""""""""""""

status
    | Status refers to there being errors or not.
    | "ok" means the command was processed successfully.
    | "error" means the command failed somewhere on the server.
message
    | A string used to explain what happened.
    | May explain if the command created an object or updated an object, or if an error occurred.
error_code
    | An integer used to uniquely identify the message.
    | If the command ran successfully the error_code is -1, upon error it may be equal to or greater than 0.
data
    | An object containing the data like the previous structure example or an array of objects like all the terms from the glossary.


Working with JSON
-----------------

.. toctree::
   :maxdepth: 2

   json/working_json

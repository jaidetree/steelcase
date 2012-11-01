Working with JSON in ActionScript 3
====================================

In order to use Flash ActionScript 3's ``JSON`` class you will need to be using Flash CS6 or later.

Receiving JSON
--------------

Instructions for processing a response from the web API server.

In Raw AS3
^^^^^^^^^^^^^^^^^^^^^^^^
To work with a JSON Object outside of our JSON library the process is still fairly simple: ::

    var json_string:String = '{ 
        "status": "ok", 
        "message": "This is a test.", 
        "error_code": -1,
        "employee_id": "555555-555", 
        last_visited: "November 2, 2012" 
    }';
    var Data:Object = JSON.parse( json_string );
    trace( Data.employee_id );

In this example we're creating a basic json_string that contains a JSON formatted string. Normally it would be recieved as part of a URLLoader callback.

With the Library
^^^^^^^^^^^^^^^^^

To use our Library to work with JSON just do as follows: ::

    trainee_login('555555-555', function(response){ 
        trace( response.data.employee_id ); 
    });

In this function we are logging in a trainee by sending the employee_id as a string. Realistically this would come from user input. The callback is then called with the data after processing the response within the library with data that contains the employee_id attribute of the JSON response object.

Sending JSON
------------

In Raw AS3
^^^^^^^^^^

Preparing a JSON response in AS3 is fairly simple and starts with regular flash objects. ::

    var raw_data:Object = {
        employee_id: '555555-555',
    };
    var json_message:String = JSON.stringify(raw_data);
    trace( raw_data );

With the Library
^^^^^^^^^^^^^^^^

To use our Library to work with JSON just do as follows: ::

    trainee_login('555555-555', function(response){ 
        trace( response.data.employee_id ); 
    });

The code for this is the same as the recieving example because our library allows you to handle sending and receiving a response within the same function.
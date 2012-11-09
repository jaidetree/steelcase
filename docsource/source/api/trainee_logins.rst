.. index:: Trainee API

Trainee Logins
==============

A function to login the trainee. Takes the string parameter 'trainee_id' to either create a new trainee record or update an existing trainee with that user id.

Usage
-----
::

    var steelcaseapi:SteelcaseAPI = new SteelcaseAPI();
    steelcaseapi.ready(function(){ 
        steelcaseapi.trainee_login(<trainee_id>, function(response){ 
            // Code to handle the response goes here.
            trace(response.data.trainee_id);
        });
    });

Parameters
-----------

    trainee_id
        | String to use as the trainee id. 
        | Example: 555555-555
    callback
        | Function to run when response is returned. Will always be a JSON object. ref:`working_json`
        | Example: function(response){ trace(response.data.trainee); }

Request URI
"""""""""""
**/api/trainee/new/**

Logging Out
-----------
::

    var steelcaseapi:SteelcaseAPI = new SteelcaseAPI();
    steelcaseapi.ready(function(){ 
        steelcaseapi.trainee_logout(function(response){ 
            trace("Logged out!");
        });
    });

Parameters
-----------

    callback
        | Function to run when response is returned. Will always be a JSON object. ref:`working_json`
        | Example: function(response){ trace(response.data.trainee); }

Request URI
"""""""""""
**/api/trainee/logout/**

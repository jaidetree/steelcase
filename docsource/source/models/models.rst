.. index:: Models Index

Models
======

What are Models?
----------------

Models are handled using the php-activerecord Database Object Relational Mapper (ORM) to create objects that represent database tables. The API uses models to retrieve data in the database before returning the JSON.

Models are the representation of database data and make up the "M" in the "MVC" application framework pattern.

Application Models
------------------

.. toctree::
   :maxdepth: 2

   glossary
   module
   performance
   performanceobject
   trainee
   user

PHP Example
^^^^^^^^^^^

In the following example we will use the :doc:`/models/glossary` Model to retrieve all terms, and the :doc:`/models/user/` to retrieve a specific user. You can learn more about active record at `<http://www.phpactiverecord.org/>`_

Retrieving all Glossary Terms
"""""""""""""""""""""""""""""
::
    
    $terms = Glossary:all();

Retrieving a single User
""""""""""""""""""""""""
::
    
    $user = User::find(1); // Queries the database for a user with a primary key (id) of 1.

.. _status-fields:

Status Fields
-------------

Many models have a status field which is an integer field with a value that refers to one of the following:

0
    Active and public
1
    Deleted
2
    Hidden    


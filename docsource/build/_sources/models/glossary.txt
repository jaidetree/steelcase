.. index:: Glossary Model

Glossary
========

Contains all the terms and definitions.

Fields
------

id
    | Integer representing the unique id of the term.
name
    | The term name
slug
    | URL Friendly version of term name.
description
    | The definition of the term.
status
    | Status of the term. See :ref:`status-fields` for more information.
user_id
    | Integer refering to a user in the users module. See :doc:`/models/user` for more information.
created_at
    | Timestamp representing when the entry was created.
updated_at
    | Timestamp representing when the entry was last modified.

SQL
---

::

    --
    -- Table structure for table `glossary`
    --

    DROP TABLE IF EXISTS `glossary`;
    CREATE TABLE IF NOT EXISTS `glossary` (
      `id` int(12) NOT NULL AUTO_INCREMENT,
      `name` varchar(100) COLLATE utf8_bin NOT NULL,
      `slug` varchar(100) COLLATE utf8_bin NOT NULL,
      `description` text COLLATE utf8_bin NOT NULL,
      `status` int(3) NOT NULL DEFAULT '0',
      `user_id` int(12) NOT NULL DEFAULT '0',
      `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1;

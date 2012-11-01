.. index:: Module Model

Module
======

Contains the name of the module and an ID number.

Fields
------

id
    | Integer representing the unique id of the entry.
name
    | String name of the module.

SQL
---

::

    --
    -- Table structure for table `modules`
    --

    DROP TABLE IF EXISTS `modules`;
    CREATE TABLE IF NOT EXISTS `modules` (
      `id` int(12) NOT NULL AUTO_INCREMENT,
      `name` varchar(100) COLLATE utf8_bin NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

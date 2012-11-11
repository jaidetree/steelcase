.. index:: Performance Object Model

Performance Object
==================

Contains the performance objects for each performance within a session allowing future data types to be stored.

Fields
------

id
    | Integer representing the unique id of the entry.
key
    | String representing the data for this performance object
value
    | Data stored within this performance object 
performance_id
    | Decimal the score earned on each module.
created_at
    | Timestamp representing when the entry was created.

SQL
---

::

  --
  -- Table structure for table `performance_objects`
  --

  DROP TABLE IF EXISTS `performance_objects`;
  CREATE TABLE IF NOT EXISTS `performance_objects` (
     `id` int(12) NOT NULL AUTO_INCREMENT,
    `key` varchar(20) COLLATE utf8_bin NOT NULL,
    `value` text COLLATE utf8_bin NOT NULL,
    `performance_id` int(12) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

Performance
===========

Contains the performances for each module through out a session.

Fields
------

id
    | Integer representing the unique id of the entry.
score
    | Decimal the score earned on each module.
duration
    | Float duration in seconds of time it took to complete module.
module_id
    | Integer refering to a module in the modules model. See :doc:`/models/module` for more information.
trainee_id
    | Integer refering to a trainee in the trainee model. See :doc:`/models/trainee` for more information.
created_at
    | Timestamp representing when the entry was created.

SQL
---

::

  --
  -- Table structure for table `performances`
  --

  DROP TABLE IF EXISTS `performances`;
  CREATE TABLE IF NOT EXISTS `performances` (
    `id` int(12) NOT NULL AUTO_INCREMENT,
    `score` decimal(10,3) NOT NULL,
    `duration` float NOT NULL,
    `module_id` int(12) NOT NULL,
    `trainee_id` int(12) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1;

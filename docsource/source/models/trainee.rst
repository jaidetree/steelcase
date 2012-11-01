Trainee
=======

Contains the information about trainees running the interactive training application from Flash in their browsers or mobile.

Fields
------

id
    | Integer representing the unique id of the entry.
employee_id
    | Unique string id of the trainee.
status
    | Status of the term. See :ref:`status-fields` for more information.
created_at
    | Timestamp representing when the entry was created.
last_visited_at
    | Timestamp representing when the trainee last logged in.

SQL
---

::

  --
  -- Table structure for table `trainees`
  --

  DROP TABLE IF EXISTS `trainees`;
  CREATE TABLE IF NOT EXISTS `trainees` (
    `id` int(12) NOT NULL AUTO_INCREMENT,
    `employee_id` varchar(20) COLLATE utf8_bin NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `last_visited_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
    `status` int(3) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1;
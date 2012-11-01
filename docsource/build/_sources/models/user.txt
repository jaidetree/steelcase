.. index:: User Model

User
====

The User admin module is only used in the Administrative CMS and completely ignored by the API.

Fields
------

id
    | Integer representing the unique id of the entry.
username
    | Username to identify the administrators.
password
    | A salted, blowfish encrypted password.
email
    | Email of the administrative user.
type
    | Integer representing the administrative level/powers of the user.
status
    | Integer representing the status of this user and whether they can log in or not. See :ref:`status-fields` for more information.

SQL
---

::

  --
  -- Table structure for table `users`
  --

  DROP TABLE IF EXISTS `users`;
  CREATE TABLE IF NOT EXISTS `users` (
    `id` int(12) NOT NULL AUTO_INCREMENT,
    `username` varchar(100) COLLATE utf8_bin NOT NULL,
    `password` varchar(255) COLLATE utf8_bin NOT NULL,
    `email` varchar(255) COLLATE utf8_bin NOT NULL,
    `type` int(3) NOT NULL DEFAULT '0',
    `status` int(3) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1;
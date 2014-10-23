<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2014-10-23 10:51:34 --> Severity: Notice  --> Undefined property: Login::$laod /vagrant/hmooc-projects/cs75/projects/project1/application/controllers/login.php 8
ERROR - 2014-10-23 10:51:41 --> Unable to load the requested class: passoword
ERROR - 2014-10-23 10:51:49 --> Non-existent class: Password
ERROR - 2014-10-23 10:58:17 --> Severity: Warning  --> Missing argument 2 for Password::password_hash(), called in /vagrant/hmooc-projects/cs75/projects/project1/application/controllers/login.php on line 15 and defined /vagrant/hmooc-projects/cs75/projects/project1/application/libraries/Password.php 28
ERROR - 2014-10-23 10:58:17 --> Severity: Notice  --> Undefined variable: algo /vagrant/hmooc-projects/cs75/projects/project1/application/libraries/Password.php 37
ERROR - 2014-10-23 10:58:17 --> Severity: Notice  --> Undefined variable: algo /vagrant/hmooc-projects/cs75/projects/project1/application/libraries/Password.php 38
ERROR - 2014-10-23 10:58:17 --> Severity: User Warning  --> password_hash() expects parameter 2 to be long, NULL given /vagrant/hmooc-projects/cs75/projects/project1/application/libraries/Password.php 38
ERROR - 2014-10-23 10:58:17 --> Severity: Notice  --> Undefined variable: data /vagrant/hmooc-projects/cs75/projects/project1/application/views/login/login.php 1
ERROR - 2014-10-23 12:02:17 --> 404 Page Not Found --> log
ERROR - 2014-10-23 12:02:21 --> Severity: User Warning  --> password_hash(): Unknown password hashing algorithm: 10 /vagrant/hmooc-projects/cs75/projects/project1/system/core/password.php 60
ERROR - 2014-10-23 12:02:21 --> Severity: Notice  --> Undefined variable: data /vagrant/hmooc-projects/cs75/projects/project1/application/views/login/login.php 1
ERROR - 2014-10-23 12:02:55 --> Severity: User Warning  --> password_hash(): Unknown password hashing algorithm: 10 /vagrant/hmooc-projects/cs75/projects/project1/system/core/password.php 60
ERROR - 2014-10-23 12:02:55 --> Severity: Notice  --> Undefined variable: data /vagrant/hmooc-projects/cs75/projects/project1/application/views/login/login.php 1
ERROR - 2014-10-23 12:04:09 --> Severity: User Warning  --> password_hash(): Unknown password hashing algorithm: 2 /vagrant/hmooc-projects/cs75/projects/project1/system/core/password.php 60
ERROR - 2014-10-23 12:04:09 --> Severity: Notice  --> Undefined variable: data /vagrant/hmooc-projects/cs75/projects/project1/application/views/login/login.php 1
ERROR - 2014-10-23 12:04:59 --> Severity: Notice  --> Undefined variable: data /vagrant/hmooc-projects/cs75/projects/project1/application/views/login/login.php 1
ERROR - 2014-10-23 12:05:28 --> Severity: Notice  --> Undefined property: CI_Loader::$data /vagrant/hmooc-projects/cs75/projects/project1/application/views/login/login.php 1
ERROR - 2014-10-23 12:06:04 --> Severity: Notice  --> Undefined variable: data /vagrant/hmooc-projects/cs75/projects/project1/application/views/login/login.php 1
ERROR - 2014-10-23 12:07:21 --> Severity: Notice  --> Undefined variable: data /vagrant/hmooc-projects/cs75/projects/project1/application/views/login/login.php 1
ERROR - 2014-10-23 15:37:04 --> 404 Page Not Found --> register_cation
ERROR - 2014-10-23 15:45:00 --> Query error: Duplicate entry 'hans' for key 'uname'
ERROR - 2014-10-23 16:12:58 --> Severity: Notice  --> Undefined variable: _SESSION /vagrant/hmooc-projects/cs75/projects/project1/application/views/dashboard/index.php 2
ERROR - 2014-10-23 16:30:06 --> Severity: Notice  --> Undefined property: CI_Loader::$session /vagrant/hmooc-projects/cs75/projects/project1/application/views/template/header.php 9
ERROR - 2014-10-23 16:41:04 --> Severity: Notice  --> Undefined property: Login::$session /vagrant/hmooc-projects/cs75/projects/project1/application/controllers/login.php 63
ERROR - 2014-10-23 17:04:45 --> 404 Page Not Found --> index.php
ERROR - 2014-10-23 17:04:53 --> Severity: Notice  --> Undefined index: REMOTE_ADDR /vagrant/hmooc-projects/cs75/projects/project1/system/core/Input.php 351
ERROR - 2014-10-23 17:04:53 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at /vagrant/hmooc-projects/cs75/projects/project1/system/core/Exceptions.php:185) /vagrant/hmooc-projects/cs75/projects/project1/system/libraries/Session.php 688
ERROR - 2014-10-23 17:05:11 --> 404 Page Not Found --> login__action
ERROR - 2014-10-23 17:06:36 --> 404 Page Not Found --> login__action
ERROR - 2014-10-23 20:43:22 --> 404 Page Not Found --> migration
ERROR - 2014-10-23 20:43:29 --> 404 Page Not Found --> migeration
ERROR - 2014-10-23 20:44:39 --> 404 Page Not Found --> migration
ERROR - 2014-10-23 20:45:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ALTER TABLE `users` ADD UNIQUE INDEX (`uname`),
	`uid` INT UNSIGNED NOT NULL,
	`' at line 2
ERROR - 2014-10-23 20:46:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ALTER TABLE `users` ADD UNIQUE INDEX (`uname`),
	`uid` INT UNSIGNED NOT NULL,
	`' at line 2
ERROR - 2014-10-23 20:47:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ALTER TABLE `users` ADD UNIQUE INDEX (`uname`);,
	`uid` INT UNSIGNED NOT NULL,
	' at line 2
ERROR - 2014-10-23 20:50:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ALTER TABLE `users` ADD UNIQUE (uname);,
	`uid` INT UNSIGNED NOT NULL,
	`sid` VA' at line 2
ERROR - 2014-10-23 20:54:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ALTER TABLE `users` ADD UNIQUE (uname);
) DEFAULT CHARACTER SET utf8 COLLATE utf' at line 2
ERROR - 2014-10-23 21:01:28 --> 404 Page Not Found --> migerate
ERROR - 2014-10-23 21:01:36 --> 404 Page Not Found --> migarate
ERROR - 2014-10-23 21:27:09 --> Severity: Notice  --> Undefined index: hihi /vagrant/hmooc-projects/cs75/projects/project1/application/controllers/login.php 73
ERROR - 2014-10-23 21:27:09 --> Severity: Notice  --> Undefined variable: data /vagrant/hmooc-projects/cs75/projects/project1/application/views/dashboard/index.php 2
ERROR - 2014-10-23 21:27:20 --> Severity: Notice  --> Undefined index: hihi /vagrant/hmooc-projects/cs75/projects/project1/application/controllers/login.php 73
ERROR - 2014-10-23 21:27:20 --> Severity: Notice  --> Undefined variable: hihi /vagrant/hmooc-projects/cs75/projects/project1/application/views/dashboard/index.php 2
ERROR - 2014-10-23 21:33:40 --> Severity: Notice  --> Undefined index: i /vagrant/hmooc-projects/cs75/projects/project1/application/controllers/login.php 76
ERROR - 2014-10-23 21:42:40 --> Severity: Notice  --> Undefined variable: passwd /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:43:26 --> Severity: Notice  --> Undefined property: CI_DB_mysql_result::$upasswd /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:43:41 --> Severity: Warning  --> crypt() expects parameter 1 to be string, object given /vagrant/hmooc-projects/cs75/projects/project1/system/core/password.php 224
ERROR - 2014-10-23 21:44:40 --> Severity: Warning  --> crypt() expects parameter 1 to be string, array given /vagrant/hmooc-projects/cs75/projects/project1/system/core/password.php 224
ERROR - 2014-10-23 21:45:05 --> Severity: Notice  --> Undefined property: CI_DB_mysql_result::$result /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:45:05 --> Severity: Notice  --> Trying to get property of non-object /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:45:36 --> Severity: Notice  --> Undefined property: CI_DB_mysql_result::$result /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:45:50 --> Severity: Notice  --> Undefined index: upasswd /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:46:03 --> Severity: Warning  --> crypt() expects parameter 1 to be string, object given /vagrant/hmooc-projects/cs75/projects/project1/system/core/password.php 224
ERROR - 2014-10-23 21:46:55 --> Severity: Notice  --> Undefined index: upasswd /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:48:51 --> Severity: Notice  --> Trying to get property of non-object /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:49:18 --> Severity: Notice  --> Undefined offset: 0 /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:49:18 --> Severity: Notice  --> Trying to get property of non-object /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:50:29 --> Severity: Notice  --> Undefined offset: 0 /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:50:29 --> Severity: Notice  --> Trying to get property of non-object /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:50:35 --> Severity: Notice  --> Undefined offset: 0 /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:50:35 --> Severity: Notice  --> Trying to get property of non-object /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 45
ERROR - 2014-10-23 21:51:52 --> Severity: Notice  --> Undefined offset: 0 /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 46
ERROR - 2014-10-23 21:51:52 --> Severity: Notice  --> Trying to get property of non-object /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 46
ERROR - 2014-10-23 22:04:41 --> Severity: Notice  --> Undefined variable: query /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 46
ERROR - 2014-10-23 22:05:23 --> Severity: Notice  --> Undefined variable: result /vagrant/hmooc-projects/cs75/projects/project1/application/views/dashboard/index.php 2
ERROR - 2014-10-23 22:16:50 --> Severity: Notice  --> Undefined variable: uname /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 46
ERROR - 2014-10-23 22:18:46 --> Severity: Notice  --> Undefined property: CI_DB_mysql_result::$$2y$10$phehCbXFRwPfUW6pGBbx9e3TXt5tmoC2Y8hxoxyxh3WOSnhQSxUgy /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 48
ERROR - 2014-10-23 22:23:00 --> Severity: Notice  --> Undefined variable: hash /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 48
ERROR - 2014-10-23 22:23:12 --> Severity: Notice  --> Undefined variable: hash /vagrant/hmooc-projects/cs75/projects/project1/application/models/user_model.php 48
ERROR - 2014-10-23 22:56:08 --> 404 Page Not Found --> das
ERROR - 2014-10-23 23:02:01 --> 404 Page Not Found --> dash
ERROR - 2014-10-23 23:02:07 --> 404 Page Not Found --> dashboar
ERROR - 2014-10-23 23:02:42 --> Severity: Notice  --> Undefined index: ubanlance /vagrant/hmooc-projects/cs75/projects/project1/application/controllers/dashboard.php 19
ERROR - 2014-10-23 23:02:42 --> Severity: Notice  --> Undefined variable: banlance /vagrant/hmooc-projects/cs75/projects/project1/application/views/dashboard/index.php 4
ERROR - 2014-10-23 23:03:43 --> Severity: Notice  --> Undefined variable: banlance /vagrant/hmooc-projects/cs75/projects/project1/application/views/dashboard/index.php 4
ERROR - 2014-10-23 23:04:47 --> Severity: Notice  --> Undefined variable: banlance /vagrant/hmooc-projects/cs75/projects/project1/application/views/dashboard/index.php 4
ERROR - 2014-10-23 23:05:00 --> Severity: Notice  --> Undefined variable: banlance /vagrant/hmooc-projects/cs75/projects/project1/application/views/dashboard/index.php 4
ERROR - 2014-10-23 23:22:29 --> Severity: Notice  --> Undefined index: REMOTE_ADDR /vagrant/hmooc-projects/cs75/projects/project1/system/core/Input.php 351
ERROR - 2014-10-23 23:22:29 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at /vagrant/hmooc-projects/cs75/projects/project1/system/core/Exceptions.php:185) /vagrant/hmooc-projects/cs75/projects/project1/system/libraries/Session.php 688
ERROR - 2014-10-23 23:24:52 --> Severity: Notice  --> Undefined variable: _SESSION /vagrant/hmooc-projects/cs75/projects/project1/application/views/dashboard/index.php 5
ERROR - 2014-10-23 23:55:07 --> Severity: Notice  --> Undefined variable: username /vagrant/hmooc-projects/cs75/projects/project1/application/views/dashboard/index.php 2
ERROR - 2014-10-23 23:55:07 --> Severity: Notice  --> Undefined variable: balance /vagrant/hmooc-projects/cs75/projects/project1/application/views/dashboard/index.php 4

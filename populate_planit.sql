

insert into `users` (`username`, `first_name`,`last_name`,`phone_number`, `email`,`hashed_password`,`cryptosalt`,`description`) values
('john1','john','doe', '6104899070','johndoe@gmail.com','password',0000,'I don\'t exist'),
('jackblack2','jack','patel','6107815897','jack.is.back@gmail.com','12345',0000,''),
('d0lphingirl','Katie','Moll','7204417891','katie.m@yahoo.com','SuperCoolPassword',0000,'What description'),
('aberduflinkler','Abe','Licoln', '5554812461','aberduflinkler@gmail.com','wabalabadubdub',0000,''),
('mema0341','Melissa','Mantey','2345677865','melissa.mantey@colorado.edu','spring2017',0000,''),
('scarolac','Chris','Scarola','9119991199','scarolac@colorado.edu','flowersRcool1',0000,''),
('sophiel','Sophie','Loughlin', '7207718134','sophia.loughlin@colorado.edu','bestpasswordever',0000,''),
('npalmer','Nick','Palmer','7208896710','Nicholas.palmer@colorado.edu','trafficsucks',0000,'What\'s Hitler\'s last name?'),
('klen','Kaelan','Patel','7204896610','kaelan.patel@colorado.edu','flowersarentcool',0000,'I won\'t get hacked'),
('mrmeeseeks','Mr','Meeseeks','9119996611','mrmeeseeks@colorado.edu','lookatme!',0000,'Everyone except Jerry');

insert into `calendar` (`event_id`,`event_username`, `description`,`item_name`,`start_time`, `end_time`,`optional_location`) values
(1, 'Microelectronics Homework','5.10,5.44,5.65,5.80','homework','5pm','7pm','SRC');

insert into `user_settings` (`username`,`friend_visible`,`public_visible`,`default_avatar_color`,`username_viewable`,`public_email`,`public_phonenumber`) values 
	('john1', FALSE, FALSE, 'default', FALSE, FALSE, FALSE);

insert into `groups` (`group_id`,`group_name`) values
	(1, 'group!'),
	(2, 'shady'),
	(3, 'just me'),
	(4, 'us fools');

insert into `join_table` (`group_id`,`user_id`) values
(1,'aberduflinkler'),
(1,'klen'),
(1,'john1'),
(2,'john1'),
(2,'jackblack2'),
(2,'mrmeeseeks'),
(3,'sophiel'),
(4,'sophiel'),
(4,'mema0341'),
(4,'klen'),
(4,'scarolac'),
(4,'npalmer');

-- insert into `tasks` (`task_id`,`username`,`task_name`,`deadline`,`description`,`ETA`) values
-- insert into `group_events` (`group_id`,`description`, `item_name`,`start_time`, `end_time`,`optional_location`) values
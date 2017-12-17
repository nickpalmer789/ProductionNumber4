DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `groups`;
DROP TABLE IF EXISTS `calendar`;
DROP TABLE IF EXISTS `user_settings`;
DROP TABLE IF EXISTS `group_calendar`;
DROP TABLE IF EXISTS `group_tasks`;
DROP TABLE IF EXISTS `tasks`;
DROP TABLE IF EXISTS `groups_join_users`;
create table if not exists `users` (
	`username` char(40) primary key,
	`first_name` varchar(40) not null,
	`last_name` varchar(40) not null,
	`phone_number` varchar(40),
	`email` varchar(40) not null,
	`hashed_password` varchar(40) not null,
	`cryptosalt` varchar(40) not null,
	`description` varchar(140)
);
create table if not exists `user_settings`(
	`username` char(40) primary key references users(username),
	`friend_visible` boolean not null,
	`public_visible` boolean not null,
	`default_avatar_color` varchar(40) not null,
	`username_viewable` boolean not null,
	`public_email` boolean not null,
	`public_phonenumber` boolean not null
);
create table if not exists `groups` (
	`group_id` integer auto_increment primary key,
	`group_name` char(40) not null
);
create table if not exists `calendar` (
	`event_id` integer auto_increment primary key,
	`username` char(40) references users(username),
	`description` varchar(140),
	`item_name` varchar(40) not null,
	`start_time` datetime not null,
	`end_time` datetime not null,
	`optional_location` varchar(40),
    `repeats` varchar(15) not null default "0"
);
create table if not exists `group_tasks`(
	`task_id` integer auto_increment primary key,
	`group_id` integer references groups(group_id),	
	`task_name` varchar(40) not null,
    `deadline` datetime,
    `description` varchar(140),
	`optional_location` varchar(40),
	`ETA` varchar(40),
    `complete` tinyint(1) not null default 0
);
create table if not exists `tasks` (
	`task_id` integer auto_increment primary key,
	`username` char(40) references users(username),
	`task_name` varchar(40) not null,
	`deadline` datetime,
	`description` varchar(140),
	`ETA` varchar(40),
    `complete` tinyint(1) not null default 0
);

create table if not exists `groups_join_users` (
	`group_id` integer references groups(group_id),
	`username` char(40) references users(username)
);

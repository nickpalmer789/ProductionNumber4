DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `groups`;
DROP TABLE IF EXISTS `calendar`;
DROP TABLE IF EXISTS `user_settings`;
DROP TABLE IF EXISTS `group_events`;
DROP TABLE IF EXISTS `tasks`;
DROP TABLE IF EXISTS `join_table`;

create table if not exists `users` (
	`username` char(40) primary key,
	`first_name` varchar(40) not null,
	`last_name` varchar(40) not null,
	`phone_number` varchar(40) not null,
	`email` varchar(40) not null,
	`hashed_password` varchar(40) not null,
	`cryptosalt` varchar(40) not null,
	`description` varchar(140)
);
create table if not exists `groups` (
	`group_id` integer auto_increment primary key,
	`group_name` char(40) not null
);
create table if not exists `calendar` (
	`event_id` integer auto_increment primary key,
	`event_username` char(40) references users(username),
	`description` varchar(140),
	`item_name` varchar(40) not null,
	`start_time` varchar(40) not null,
	`end_time` varchar(40) not null,
	`optional_location` varchar(40)
);
create table if not exists `user_settings`(
	`username` char(40) primary key references users(username),
	`friend_visible` boolean,
	`public_visible` boolean,
	`default_avatar_color` varchar(40),
	`username_viewable` boolean,
	`public_email` boolean,
	`public_phonenumber` boolean
);
create table if not exists `group_events`(
	`event_id` integer auto_increment primary key,
	`group_id` integer references groups(group_id),
	`description` varchar(140),
	`item_name` varchar(40) not null,
	`start_time` varchar(40) not null,
	`end_time` varchar(40) not null,
	`optional_location` varchar(40)
);
create table if not exists `tasks` (
	`task_id` integer auto_increment primary key,
	`username` char(40) references users(username),
	`task_name` varchar(40) not null,
	`deadline` varchar(40),
	`description` varchar(140),
	`ETA` varchar(40)
);

create table if not exists `join_table` (
	`group_id` integer references groups(group_id),
	`user_id` char(40) references users(username)
);
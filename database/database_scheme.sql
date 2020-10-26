create database social_network;
use social_network;
/*table users */
CREATE TABLE users(
id int (255) primary key auto_increment not null,
role varchar (20),
email varchar (255),
first_name varchar (255),
last_name varchar (255),
password varchar (255),
alias varchar (255),
biography varchar (255),
state varchar (2),
image varchar (255),
CONSTRAINT users_uniques_fields UNIQUE (email, alias)
) ENGINE = InnoDb;

/*table publications */
CREATE TABLE publications (
id int (255) primary key auto_increment not null,
user_id int (255),
text mediumtext,
document varchar(200),
image varchar (255),
state varchar(50),
creation_date datetime,
CONSTRAINT fk_publications_users FOREIGN KEY (user_id) references users(id)
) ENGINE = InnoDb;

/*table likes */
CREATE TABLE likes(
id int(255) primary key auto_increment not null,
user_id int(255),
post_id int(255),
CONSTRAINT fk_likes_users FOREIGN KEY(user_id) references users(id),
CONSTRAINT fk_likes_publications FOREIGN KEY(post_id) references publications(id)
)ENGINE = InnoDb;

/*table followers  */
CREATE TABLE followers (
id int(255) primary key auto_increment not null,
user_id	int(255),
user_followed int(255),
CONSTRAINT fk_followers_users FOREIGN KEY(user_id) references users(id),
CONSTRAINT fk_followers FOREIGN KEY(user_followed) references users(id)
)ENGINE = InnoDb;

/* table messages */
CREATE TABLE messages(
id int(255) primary key auto_increment not null,
message longtext,
sender int(255),
receiver int(255),
file varchar(255),
image varchar(255),
read_state varchar(3),
send_date datetime,
CONSTRAINT fk_sender FOREIGN KEY(sender) references users(id),
CONSTRAINT fk_receiver FOREIGN KEY(receiver) references users(id)
)ENGINE = InnoDb;

/* table notifications  */
CREATE TABLE notifications (
id int (255) primary key auto_increment not null,
user_id int (255),
type varchar (255),
type_id int (255),
read_state varchar (3),
date datetime,
comments varchar (100),
CONSTRAINT fk_users_notifications FOREIGN KEY (user_id) references users(id)
) ENGINE = InnoDb;
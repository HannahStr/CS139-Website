drop table bill;
drop table user;
drop table log;
CREATE TABLE user(user_ID integer primary key, name varchar(32), password varchar(24), email varchar(64), salt varchar(32), group_ID integer);
CREATE TABLE bill(bill_ID integer primary key, bill_name varchar(24), user_ID integer, bill_amount integer(10), bill_status varchar(8), group_ID integer);
CREATE TABLE log(log_ID integer primary key, type varc  har(16), bill_name varchar(24), bill_amount integer(10), user_ID integer);

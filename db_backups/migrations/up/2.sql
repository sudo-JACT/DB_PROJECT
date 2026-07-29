create table sale (
    id int not null primary key auto_increment,
    user_id int,
    album_id int,
    price float,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (album_id) REFERENCES album(id)
);


alter table band
    add column descr text;

alter table artist
    add column bio text;

alter table album 
    add column descr text;

alter table album
    add column linky text;

alter table song
    add column descr text;

alter table song
    add column linky text;

alter table ispartof
    add column num int not null CHECK (num > 0);

alter table sale
    add column dat timestamp;


create table cart (
    user_id int,
    album_id int,
    quantity int check (quantity > 0),
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (album_id) REFERENCES album(id)
);

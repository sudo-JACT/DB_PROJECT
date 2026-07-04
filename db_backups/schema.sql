create table user (
    id int auto_increment primary key,
    username text not null,
    passwd text not null,
    email text not null,
    bday date not null,
    image_path text
);

create table band (
    id int auto_increment primary key,
    name text not null,
    creation_date date not null,
    image_path text
);

create table genre (
    id int auto_increment primary key,
    name text not null
);

create table artist (
    id int auto_increment primary key,
    name text not null,
    bday date,
    image_path text
);

create table album (
    id int auto_increment primary key,
    name text not null,
    publication_date date,
    image_path text
);

create table song (
    id int auto_increment primary key,
    name text not null,
    duration time not null
);

create table members (
    band_id int,
    artist_id int,
    FOREIGN KEY (band_id) REFERENCES band(id),
    FOREIGN KEY (artist_id) REFERENCES artist(id)
);

create table published (
    band_id int,
    album_id int,
    FOREIGN KEY (band_id) REFERENCES band(id),
    FOREIGN KEY (album_id) REFERENCES album(id)
);

create table ispartof (
    album_id int,
    song_id int,
    FOREIGN KEY (album_id) REFERENCES album(id),
    FOREIGN KEY (song_id) REFERENCES song(id)
);

create table soundlike (
    album_id int,
    genre_id int,
    FOREIGN key (album_id) REFERENCES album(id),
    FOREIGN key (genre_id) REFERENCES genre(id)
);

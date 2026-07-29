drop table sale;

alter table band
    drop column descr;

alter table artist
    drop column bio;

alter table album 
    drop column descr;

alter table album
    drop column linky;

alter table song
    drop column descr;

alter table song
    drop column linky;

alter table ispartof
    drop column num;


alter table song
    drop column duration;

alter table song
    add column duration time not null;

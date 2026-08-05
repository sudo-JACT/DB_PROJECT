alter table song
    drop column duration;

alter table song
    add column duration float check (duration > 0);

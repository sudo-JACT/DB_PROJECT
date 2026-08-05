alter table album
    add column sale int not null check (sale >= 0);

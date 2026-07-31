alter table sale
    drop column price;

alter table sale
    add column quantity int check (quantity > 0);

alter table album
    add column price float;

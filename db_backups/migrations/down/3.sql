alter table sale
    add column price float;

alter table sale 
    drop column quantity;

alter table album 
    drop table price;

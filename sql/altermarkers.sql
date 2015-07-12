ALTER table markers ADD COLUMN freq INT(6) not null  after type;
update markers set freq = 252;

ALTER table markers ADD COLUMN band VARCHAR(3) not null after freq;
update markers set band = 'LW';

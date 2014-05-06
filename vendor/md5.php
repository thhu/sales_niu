<?php 
//angelaleung001@gmail.com,anyvapud harrison.swift@concessionscanada.ca,umugater xinqing99@hotmail.com,a7a7e2am

echo md5("a7a7e2am");

DELETE FROM `vendor_info` WHERE 1; 
UPDATE booth_info SET uid = NULL, taken = 0 WHERE 1;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'H' AND booth_number = 2;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'H' AND booth_number = 3;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'H' AND booth_number = 5;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'H' AND booth_number = 6;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'H' AND booth_number = 7;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'H' AND booth_number = 9;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'H' AND booth_number = 11;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'I' AND booth_number = 7;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'I' AND booth_number = 1;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'I' AND booth_number = 2;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'I' AND booth_number = 4;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'I' AND booth_number = 8;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'I' AND booth_number = 9;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'I' AND booth_number = 11;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'A' AND booth_number = 1;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'A' AND booth_number = 10;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'B' AND booth_number = 9;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'B' AND booth_number = 10;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'C' AND booth_number = 8;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'C' AND booth_number = 9;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'F' AND booth_number = 1;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'F' AND booth_number = 8;
UPDATE booth_info SET uid = 1, taken = 1 WHERE section = 'G' AND booth_number = 1;
?>

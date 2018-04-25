CREATE TABLE `w1626698_0`.`product` (
`prodId` INT(4) NOT NULL AUTO_INCREMENT ,
`prodName` VARCHAR(30) NOT NULL ,
`prodPicName` VARCHAR(50) NOT NULL ,
`prodDescrip` VARCHAR(1000) NULL ,
`prodPrice` DECIMAL(6,2) NOT NULL DEFAULT '0.00' ,
`prodQuantity` INT(4) NOT NULL DEFAULT '100' ,
PRIMARY KEY (`prodId `)
)
ENGINE = InnoDB;

CREATE TABLE `w1626698_0`.`users` ( 
`userId` INT NOT NULL AUTO_INCREMENT , 
`userType` VARCHAR(30) NOT NULL , 
`userFName` VARCHAR(50) NOT NULL , 
`userSName` VARCHAR(50) NOT NULL , 
`userAddress` VARCHAR(100) NOT NULL , 
`userPostCode` VARCHAR(10) NOT NULL , 
`userTelNo` VARCHAR(15) NOT NULL , 
`userEmail` VARCHAR(30) NOT NULL , 
`userPassword` CHAR(32) NOT NULL , 
PRIMARY KEY (`userId`)
) 
ENGINE = InnoDB;


INSERT INTO `product` (`prodId`, `prodName`, `prodPicName`, `prodDescrip`, `prodPrice`, `prodQuantity`)
VALUES (NULL, 'BIC 4 Colour Pen', 'bic4colourpen', '4 Colours Original gives you 4 different colours of ink in the same pen, letting you switch between them as your work dictates so you can efficiently complete your writing tasks. The round blue barrel contains 4 retractable points that write with red, blue, green and black inks. The 1.0mm points write with an elegant 0.4mm line width, and combined they will write for 8,000m making this a great, versatile pen for home, work or the office.', '14.00', '100');

INSERT INTO `product` (`prodId`, `prodName`, `prodPicName`, `prodDescrip`, `prodPrice`, `prodQuantity`)
VALUES (NULL, 'Bostik Blu Tack Handy', 'bostickbluetack', 'Bostik Blu Tack Handy is a handy blue tack brand for a cheap price.', '1.50', '100');

INSERT INTO `product` (`prodId`, `prodName`, `prodPicName`, `prodDescrip`, `prodPrice`, `prodQuantity`)
VALUES (NULL, 'Loctite Superglue Liquid 3g', 'loctitesuperglue', 'Super Glue Universal Instant Strength\r\n\r\nUniversal instant adhesive\r\n\r\nWater and dishwasher resistant\r\n\r\nStrong reliable bond\r\n\r\nBonds in seconds\r\n\r\nFor many tasks and materials around the home\r\n\r\nSolvent free\r\n\r\nAnti-clog cap\r\n\r\nLoctite Super Glue provides strong and reliable solutions for your gluing tasks at home. Developed with industrial expertise, Loctite Super Glue is now water and dishwasher resistant, achieves D3 technical standards according to BS EN 204 as it contains Silicotec hydrophobic technology\r\n\r\nAircraft manufacturers rely on Loctite products, so can you.', '3.00', '100');

INSERT INTO `product` (`prodId`, `prodName`, `prodPicName`, `prodDescrip`, `prodPrice`, `prodQuantity`)
VALUES (NULL, 'Sainsbury\'s Home Labels x250', 'homelabels', 'Organise boxes, books and a range of other items with this pack of labels. The labels can be written on with a pen.\r\n\r\nPack contains: 250 x labels', '2.00', '100');

INSERT INTO `product` (`prodId`, `prodName`, `prodPicName`, `prodDescrip`, `prodPrice`, `prodQuantity`)
VALUES (NULL, 'Casio Scientific Calculator', 'casioscientificcal', 'The Casio FX-85GTPLUS is the UK’s best-selling solar powered scientific calculator. Allowed in every UK exam where a calculator can be used. Suitable for use from Key Stage 3 , 4 and above, recommended for GCSE, A/AS level, Standard and Higher. ', '14.00', '100');



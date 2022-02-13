DELIMITER $$
CREATE PROCEDURE getEvents()
COMMENT "
--Description: gets the events in order of date.
--Tables: Events
--Parameters: none
--Returns: Query of events:
	[ID]=Event id
    [EventTitle]
    [EventDay]=Formatted event date
    [EventLocation]
    [EventDescription]"
	BEGIN
    SELECT EventID AS ID, EventTitle, DATE_FORMAT(EventDate, "%a, %b %D") AS EventDay, EventLocation, EventDescription FROM events ORDER BY EventDate;
    END $$
DELIMITER $$
CREATE PROCEDURE getMerch() COMMENT "
--Description: gets the merchandise.
--Tables: Merchandise
--Parameters: none
--Returns: Query of merchandise:
	[ID]=Merchandise id
    [MerchName]
    [MerchQuantity]
    [Picture]=Picture file of merchandise or \"no img\" if there is no file
    [MerchDescription]"
	BEGIN
    SELECT MerchID AS ID, MerchName, MerchQuantity, IFNULL(MerchImgFilePath, "no img") AS Picture, MerchDescription FROM merchandise;
    END $$
DROP PROCEDURE getMerch;
DELIMITER $$
CREATE PROCEDURE getBrothers() COMMENT "
--Description: gets all brothers.
--Tables: Brothers
--Parameters: none
--Returns: Query of brothers:
	[ID]=Brother id
    [Picture]=Picture file of merchandise or \"no img\" if there is no file
    [FirstName]
    [LastName]"
	BEGIN
    SELECT BrotherID AS ID, IFNULL(BrotherPicture, "no img") AS Picture, FirstName, LastName FROM brothers;
    END $$
/* optional stored procedures */
DELIMITER $$
CREATE PROCEDURE getBrotherBio(id INT UNSIGNED) COMMENT "
--Description: gets the self-added details about a brother.
--Tables: Brother
--Parameters: 
	[id]=The id of a brother in the table
--Returns: Query of the bio of a brother:
    [BrotherBio]"
	BEGIN
    SELECT BrotherBio FROM brothers WHERE id = BrotherID;
    END $$
DELIMITER $$
CREATE PROCEDURE updateBrotherBio(IN bio TEXT, IN id INT UNSIGNED, IN uName varchar(256), IN pass varchar(256)) COMMENT "
--Description: updates the bio of a brother.
--Tables: Brother
--Parameters:
	[bio]=The text to replace the old bio
    [id]=The id of the brother
    [uName]=The username of the brother to verify the change
    [pass]=The encrypted password of the brother to verify the change
--Returns: none."
	BEGIN
    UPDATE brothers SET bio = BrotherBio WHERE id = BrotherID AND uName = UserName AND pass = BrotherPassword;
    END $$
DELIMITER $$
CREATE PROCEDURE updateBrotherPicture(IN pic TEXT, IN id INT UNSIGNED, IN uName varchar(256), IN pass varchar(256)) COMMENT "
--Description: updates the picture of a brother.
--Tables: Brother
--Parameters:
	[pic]=The image file path to replace the old picture file path
    [id]=The id of the brother
    [uName]=The username of the brother to verify the change
    [pass]=The encrypted password of the brother to verify the change
--Returns: none."
	BEGIN
    UPDATE brothers SET pic = BrotherPicture WHERE id = BrotherID AND uName = UserName AND pass = BrotherPassword;
    END $$
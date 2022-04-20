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
    SELECT EventID AS ID, EventTitle, DATE_FORMAT(EventDate, "%Y-%c-%d") AS EventDay, EventLocation, EventDescription FROM events ORDER BY EventDate;
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
    UPDATE brothers SET BrotherBio = bio WHERE id = BrotherID AND uName = UserName AND pass = BrotherPassword;
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
    UPDATE brothers SET BrotherPicture = pic WHERE id = BrotherID AND uName = UserName AND pass = BrotherPassword;
    END $$
DELIMITER $$
CREATE PROCEDURE updateBrotherEmail(IN eml varchar(50), IN id INT UNSIGNED, IN uName varchar(256), IN pass varchar(256)) COMMENT "
--Description: updates the picture of a brother.
--Tables: Brother
--Parameters:
	[eml]=The email to change
    [id]=The id of the brother
    [uName]=The username of the brother to verify the change
    [pass]=The encrypted password of the brother to verify the change
--Returns: none."
	BEGIN
    UPDATE brothers SET Email = eml WHERE id = BrotherID AND uName = UserName AND pass = BrotherPassword;
    END $$
DELIMITER $$
CREATE PROCEDURE updateBrotherPassword(IN uName varchar(256), IN pass varchar(256)) COMMENT "
--Description: updates the password of a brother.
--Tables: Brother
--Parameters:
    [uName]=The username of the brother to verify the change
    [pass]=The encrypted password of the brother to change
--Returns: none."
	BEGIN
    DECLARE x varchar(50);
    SET x = IFNULL((SELECT Email FROM brothers WHERE uName = UserName LIMIT 1), "No Email"); # Should not require the limit of 1 since username is unique
	UPDATE brothers SET BrotherPassword = pass WHERE uName = UserName AND Email = x;
    SELECT x AS email;
    END $$
DELIMITER $$
CREATE PROCEDURE getBrother(IN u varchar(256)) COMMENT "
--Description: gets the information of one brother.
--Tables: Brother
--Parameters: 
	[u]=The username of a brother in the table
--Returns: Query of the bio of a brother:
	[ID]=BrotherID
    [FirstName]
    [LastName]
    [Bio]=BrotherBio or empty if null
    [Picture]=BrotherPicture or 'no img' if null
    [Email]=Email or empty if null"
	BEGIN
    SELECT BrotherID AS ID, FirstName, LastName, IFNULL(BrotherBio, "") AS Bio, IFNULL(BrotherPicture, "no img") AS Picture, IFNULL(Email, "") AS Email, BrotherPassword AS `Password` FROM brothers WHERE u = brothers.UserName;
    END $$
DROP PROCEDURE getBrother;

DELIMITER $$
CREATE PROCEDURE getComments(IN wh char(1), IN whid int) COMMENT "
--Description: gets the comments for a specific event or merch.
--Tables: Comment
--Parameters: 
	[wh]=Which Table ('e' for Events, 'm' for Merch)
    [whid]=The id for the given table
--Returns: Query of the details of the comment:
	[ID]=CommentID
    [BrotherID]
    [Text]=CommentText
    [Liked]"
	BEGIN
    SELECT CommentID AS ID, (SELECT FirstName FROM brothers WHERE brothers.BrotherID = comments.BrotherID) AS BrotherName, CommentText AS `Text`, Liked FROM comments WHERE wh = comments.Which AND whid = comments.WhichID;
    END $$
DELIMITER $$
CREATE PROCEDURE createComment(IN id int, IN ct TEXT, IN wh char(1), IN l boolean, IN whid int) COMMENT "
--Description: inserts comment.
--Tables: Brother
--Parameters:
    [id]=The BrotherID that made it
    [ct]=The text for the comment
	[wh]=Which Table ('e' for Events, 'm' for Merch)
    [l]=Liked or not
    [whid]=The id for the given table
--Returns: none."
	BEGIN
    INSERT INTO comments (BrotherID, CommentText, Which, Liked, WhichID) VALUES (id, ct, wh, l, whid);
    END $$
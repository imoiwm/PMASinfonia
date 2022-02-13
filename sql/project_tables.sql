CREATE TABLE events (
EventID int auto_increment unique comment "The event id",
EventTitle varchar(100) not null comment "The title of the event",
EventDate date not null comment "The date of the event (in date format and can include starting time)",
EventLocation varchar(50) not null comment "The location of the event (address format, but latitude/longitude for addresses over 50 characters)",
EventDescription TEXT not null comment "The description of the event",
primary key(EventID)
) comment "The table of events planned. Can have comments from brothers";
CREATE TABLE merchandise (
MerchID int auto_increment unique comment "The merch id",
MerchName varchar(100) not null comment "The name of the merch",
MerchQuantity int unsigned not null comment "How much of the merch is left",
MerchImgFilePath varchar(256) comment "The image of the merch (not required, but recommended)",
MerchDescription TEXT not null comment "The description of the merch",
primary key(MerchID)
) comment "Table of the various merchandise offered";
CREATE TABLE brothers (
BrotherID int auto_increment unique comment "The brother id",
FirstName varchar(100) not null comment "First Name of the Brother",
LastName varchar(100) not null comment "Last Name of the Brother",
BrotherBio TEXT comment "The description brothers can put about themselves (not required)",
UserName varchar(256) not null unique comment "Username (can be encrypted, but not necessary)",
BrotherPassword varchar(256) not null comment "Brother password (should be encrypted BEFORE sending to database",
BrotherPicture varchar(256) comment "Picture of the brother (not required)",
Email varchar(50) comment "Email for the given brother (not required)",
primary key(BrotherID)
) comment "Table of Brothers for the fraternity";
CREATE TABLE comments (
CommentID int unsigned not null auto_increment unique comment "The comment id",
BrotherID int unsigned not null comment "The id of the brother that posted it",
CommentText TEXT not null comment "The text for the given comment",
Which character not null comment "Which table the comment is meant for (Ex: 'E' for Events, 'M' for Merchandise)",
Liked boolean not null comment "If the commenter liked the event or product",
WhichID int unsigned not null comment "The id for the given table the comment is for",
primary key(CommentID)
) comment "Table of comments for various tables (events, merchandise, etc.)";
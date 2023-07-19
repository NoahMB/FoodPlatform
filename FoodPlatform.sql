create database Foodplatform;
USE Foodplatform;


CREATE TABLE tblGuardian (
GuardianID int auto_increment not NULL,
Voornaam varchar(100) not NULL,
Naam varchar(100) not NULL,
Email varchar(100) not NULL,
Pwd varchar(255) not null,
Telefoonnummer varchar(10) not NULL,
PRIMARY KEY (GuardianID)

);

CREATE TABLE tblSchool (
SchoolID int auto_increment not NULL,
SchoolName varchar(100) not null,
PRIMARY KEY (SchoolID)

);
CREATE TABLE tblAllergieDiet (
AllergieDietID int auto_increment not NULL,
AllergieDiet varchar(100) not null,
PRIMARY KEY (AllergieDietID)

);


CREATE TABLE tblStudent (
    StudentID int auto_increment not NULL,
    Voornaam varchar(100) not NULL,
    Naam varchar(100) not NULL,
	Geboortedatum DateTime not NULL,
    Klas varchar(10) not null,
    SchoolID int not null,
    
    PRIMARY KEY (StudentID),
   
    FOREIGN KEY (SchoolID) REFERENCES TblSchool(SchoolID)
);
CREATE TABLE tblAllergieDietStudent (
AllergieDietStudentID int auto_increment not NULL,
AllergieDietID int not null,
StudentID int not NULL,
PRIMARY KEY (AllergieDietStudentID),
FOREIGN KEY (StudentID) REFERENCES tblStudent(StudentID),
FOREIGN KEY (AllergieDietID) REFERENCES tblAllergieDiet(AllergieDietID)
);
CREATE TABLE tblFamilie (
FamilieID int auto_increment not NULL,
GuardianID int not null,
StudentID int not NULL,
PRIMARY KEY (FamilieID),
FOREIGN KEY (StudentID) REFERENCES tblStudent(StudentID),
FOREIGN KEY (GuardianID) REFERENCES tblGuardian(GuardianID)
);

CREATE TABLE TblMenu (
MenuID int auto_increment not NULL,
MenuName varchar(100) not null,
Description text not null,
Price Decimal not null,
Ingredients text not null,
Allergieen text not null,
PRIMARY KEY (MenuID)

);

CREATE TABLE TblOrders (
OrderID int auto_increment not NULL,
MenuName varchar(100) not null,
OrderDate Datetime not null,

Quantity int not null,
StudentID int not null,
MenuID int not null,
PRIMARY KEY (OrderID),
FOREIGN KEY (StudentID) REFERENCES tblStudent(StudentID),
FOREIGN KEY (MenuID) REFERENCES TblMenu(MenuID)

);
CREATE TABLE TblPaymentInformation (
PaymentID int auto_increment not NULL,
Date Datetime not null,
Amount Decimal not null,
PaymentMethod Varchar(100) not null,
OrderID int not null,
PRIMARY KEY (PaymentID),
FOREIGN KEY (OrderID) REFERENCES TblOrders(OrderID)


);
CREATE TABLE TblDeliveryInformation (
DeliveryID int auto_increment not NULL,
Date Datetime not null,
DeliverySchedule varchar(100) not null,
DeliveryLocation Varchar(100) not null,
OrderID int not null,
PRIMARY KEY (DeliveryID),
FOREIGN KEY (OrderID) REFERENCES TblOrders(OrderID)
);

CREATE TABLE TblFeedBack (
FeedBackID int auto_increment not NULL,
Date Datetime not null,
Feedback text not null,
GuardianID int not null,
PRIMARY KEY (FeedBackID),
FOREIGN KEY (GuardianID) REFERENCES tblGuardian(GuardianID)
);





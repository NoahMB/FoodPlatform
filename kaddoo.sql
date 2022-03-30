DROP DATABASE IF EXISTS Kaddoo;

create database Kaddoo;
use Kaddoo;

create table Accounts(
	AccountsID int NOT NULL AUTO_INCREMENT,
    Firstname varchar(100) NOT NULL,
    LastName varchar(100) NOT NULL,
    Email varchar(100) NOT NULL,
    Password varchar(100) NOT NULL,
    Birthdate date NOT NULL,
    PhoneNr varchar(100) NOT NULL,
    Gender varchar(100) NOT NULL,
    PfP varchar(100),
    ReminderTime int,
    primary key(AccountsID)
);

create table Friends(
	FriendsID int NOT NULL AUTO_INCREMENT,
    Firstname varchar(100) NOT NULL,
    Lastname varchar(100) NOT NULL,
    Birthdate date NOT NULL,
    PfP varchar(100) NOT NULL,
    GetReminder int NOT NULL,
    AccountsID int NOT NULL,
    foreign key(AccountsID) references Accounts(AccountsID),
    primary key(FriendsID)
);

create table Interests(
	InterestsID int NOT NULL AUTO_INCREMENT,
    Interests varchar(100) NOT NULL,
    primary key(InterestsID)
);

create table FriendsInterests(
	FriendsInterestsID int NOT NULL AUTO_INCREMENT,
    FriendsID int NOT NULL,
    InterestsID int NOT NULL,
    foreign key(FriendsID) references Friends(FriendsID),
    foreign key(InterestsID) references Interests(InterestsID),
    primary key(FriendsInterestsID)
);

create table OpenedLinks(
	OpenedLinksID int NOT NULL AUTO_INCREMENT,
    URL varchar(100) NOT NULL,
    Name varchar(100) NOT NULL,
    Price double NOT NULL,
    Picture varchar(100) NOT NULL,
    AccountsID int NOT NULL,
    foreign key(AccountsID) references Accounts(AccountsID),
    primary key(OpenedLinksID)
);

create table Events(
	EventsID int NOT NULL AUTO_INCREMENT,
    Name varchar(100) NOT NULL,
    Date date NOT NULL,
    GetReminder int NOT NULL,
    GiftBought int NOT NULL,
    FriendsID int NOT NULL,
    foreign key(FriendsID) references Friends(FriendsID),
    primary key(EventsID)
);

create table LikedGifts(
	LikedGiftsID int NOT NULL AUTO_INCREMENT,
    OpenedLinksID int NOT NULL,
    EventsID int NOT NULL,
	foreign key(OpenedLinksID) references OpenedLinks(OpenedLinksID),
    foreign key(EventsID) references Events(EventsID),
    primary key(LikedGiftsID)
);


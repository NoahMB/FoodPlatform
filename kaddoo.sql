create table accounts(
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

create table friends(
	FriendsID int NOT NULL AUTO_INCREMENT,
    Firstname varchar(100) NOT NULL,
    Lastname varchar(100) NOT NULL,
    Birthdate date NOT NULL,
    PfP varchar(100) NOT NULL,
    GetReminder int NOT NULL,
    AccountsID int NOT NULL,
    foreign key(AccountsID) references accounts(AccountsID),
    primary key(FriendsID)
);

create table interests(
	InterestsID int NOT NULL AUTO_INCREMENT,
    Interests varchar(100) NOT NULL,
    primary key(InterestsID)
);

create table friendsinterests(
	FriendsInterestsID int NOT NULL AUTO_INCREMENT,
    FriendsID int NOT NULL,
    InterestsID int NOT NULL,
    foreign key(FriendsID) references friends(FriendsID),
    foreign key(InterestsID) references interests(InterestsID),
    primary key(FriendsInterestsID)
);

create table openedlinks(
	OpenedLinksID int NOT NULL AUTO_INCREMENT,
    URL varchar(100) NOT NULL,
    Name varchar(100) NOT NULL,
    Price double NOT NULL,
    Picture varchar(100) NOT NULL,
    AccountsID int NOT NULL,
    foreign key(AccountsID) references accounts(AccountsID),
    primary key(OpenedLinksID)
);

create table events(
	EventsID int NOT NULL AUTO_INCREMENT,
    Name varchar(100) NOT NULL,
    Date date NOT NULL,
    GetReminder int NOT NULL,
    GiftBought int NOT NULL,
    FriendsID int NOT NULL,
    foreign key(FriendsID) references friends(FriendsID),
    primary key(EventsID)
);

create table likedgifts(
	LikedGiftsID int NOT NULL AUTO_INCREMENT,
    OpenedLinksID int NOT NULL,
    EventsID int NOT NULL,
	foreign key(OpenedLinksID) references openedlinks(OpenedLinksID),
    foreign key(EventsID) references events(EventsID),
    primary key(LikedGiftsID)
);

create table products(
	ProductsID int NOT NULL AUTO_INCREMENT,
    Title varchar(100) NOT NULL,
    Img varchar(100) NOT NULL,
    URL varchar(100) NOT NULL,
    Rating varchar(100) NOT NULL,
    Reviews varchar(100) NOT NULL,
    Price varchar(100) NOT NULL,
    Search_Url varchar(100) NOT NULL,
    primary key(ProductsID)
);


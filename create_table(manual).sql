CREATE DATABASE gw_cofit;

CREATE TABLE `GW_CoFit`.`Account` ( `AccountID` INT AUTO_INCREMENT PRIMARY KEY,  `GW_UserName` VARCHAR(25) NOT NULL, `Password` VARCHAR(25) NOT NULL ,`Email` VARCHAR(255) NOT NULL ,  `First_Name` VARCHAR(255) NOT NULL ,  `Last_Name` VARCHAR(255) NOT NULL ,  `Phone_Number` VARCHAR(10) NOT NULL ,  `Street_Address` VARCHAR(500) NOT NULL ,  `City`VARCHAR(255) NOT NULL ,  `State` VARCHAR(255) NOT NULL ,  `ZipCode` VARCHAR(5) NOT NULL,
`Role` VARCHAR(50) NOT NULL ,`StudentID`INT ,  `InstructorID` INT, `AdminID` INT ) ENGINE = InnoDB;

CREATE TABLE `GW_CoFit`.`Instructor` ( `InstructorID` INT AUTO_INCREMENT PRIMARY KEY ,`InstructorName` VARCHAR(255) NOT NULL ,  `Specialty` VARCHAR(255) NOT NULL) ENGINE = InnoDB;
 
CREATE TABLE `GW_CoFit`.`admin` ( `AdminID` INT AUTO_INCREMENT PRIMARY KEY ,`date` date) ENGINE = InnoDB;
 

CREATE TABLE `GW_CoFit`.`Student` ( `StudentID` INT AUTO_INCREMENT PRIMARY KEY ,  `School_Year`VARCHAR(255) NOT NULL ,  `Student_Status` VARCHAR(255) NOT NULL ,  `DOB` DATE NOT NULL,  `Weight` INT(3) NOT NULL ,  `Height` VARCHAR(10) NOT NULL ,  `Gender` VARCHAR(255) NOT NULL ,  `Membership_StartDate` DATE NOT NULL) ENGINE =InnoDB;

CREATE TABLE `GW_CoFit`.`Contents` ( `ContentID` INT AUTO_INCREMENT PRIMARY KEY ,  `Name` VARCHAR(255)NOT NULL ,  `Type` VARCHAR(255) NOT NULL ,  `Description` VARCHAR(500) NOT NULL ,  `InstructorID` INT NOT NULL) ENGINE = InnoDB;

ALTER TABLE Account
ADD FOREIGN KEY (StudentID) REFERENCES Student(StudentID);
 
ALTER TABLE Account
ADD FOREIGN KEY (AdminID) REFERENCES admin(AdminID);
 

ALTER TABLE Account
ADD FOREIGN KEY (InstructorID) REFERENCES Instructor(InstructorID);

ALTER TABLE Contents
ADD FOREIGN KEY (InstructorID) REFERENCES Instructor(InstructorID);

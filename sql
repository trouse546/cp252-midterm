DROP DATABASE IF EXISTS CPET;

CREATE DATABASE CPET;

USE CPET;

CREATE TABLE Courses ( c_id CHAR(7) PRIMARY KEY, c_name VARCHAR(70) NOT NULL, credits INT(1) NOT NULL, semester CHAR(3) NOT NULL );
CREATE TABLE Plans ( plan_id INT(3) , semester char(5) NOT NULL, c_id CHAR(7) NOT NULL, PRIMARY KEY(plan_id, semester, c_id), FOREIGN KEY(c_id) REFERENCES Courses(c_id));
CREATE TABLE Students ( s_id INT(3) AUTO_INCREMENT, fname VARCHAR(20) NOT NULL, lname VARCHAR(20), plan_id INT(3) DEFAULT '001', PRIMARY KEY(s_id), FOREIGN KEY(plan_id) REFERENCES Plans(plan_id));

INSERT INTO Courses VALUES ('CPET107', 'Introduction to Programming with C++', '3', 'FL1');
INSERT INTO Courses VALUES ('ELET101', 'Electric Circuits', '4', 'FL1');
INSERT INTO Courses VALUES ('ELET115', 'Digital Fundamentals', '3', 'FL1');
INSERT INTO Courses VALUES ('ENGL101', 'English Composition', '4', 'FL1');
INSERT INTO Courses VALUES ('MATH124', 'Collage Algebra', '4', 'FL1');

INSERT INTO Courses VALUES ('CPET125', 'Data Structures', '3', 'SP1');
INSERT INTO Courses VALUES ('ELET144', 'Embedded Microsystems', '4', 'SP1');
INSERT INTO Courses VALUES ('ENGL120', 'Communications', '3', 'SP1');
INSERT INTO Courses VALUES ('ENGL125', 'Communication and the Literature of Science and Technology', '3', 'SP1');
INSERT INTO Courses VALUES ('MATH140', 'Pre-Calculus', '4', 'SP1');
INSERT INTO Courses VALUES ('PHYS133', 'Physics I(Algebra Based)', '4', 'SP1');
INSERT INTO Courses VALUES ('PHYS231', 'Physics I(Calculus Based)', '4', 'SP1');

INSERT INTO Courses VALUES ('CPET240', 'Programming for Windows Operating System', '4', 'FL2');
INSERT INTO Courses VALUES ('CPET260', 'Computer Real Time Interfacing', '4', 'FL2');
INSERT INTO Courses VALUES ('CPET301', 'Computer Project Definition', '1', 'FL2');
INSERT INTO Courses VALUES ('MATH205', 'Calculus I', '4', 'FL2');
INSERT INTO Courses VALUES ('PHYS135', 'Physics II(Algebra Based)', '4', 'FL2');
INSERT INTO Courses VALUES ('PHYS232', 'Physics II(Calculus Based)', '4', 'FL2');
INSERT INTO Courses VALUES ('SXXXxxx', 'Social Science Elective', '3', 'FL2');

INSERT INTO Courses VALUES ('CPET215', 'Integrated Circuits and Interfacing', '4', 'SP2');
INSERT INTO Courses VALUES ('CPET222', 'Data Communications and Internetworking', '4', 'SP2');
INSERT INTO Courses VALUES ('CPET252', 'Networking and Internet Technologies', '4', 'SP2');
INSERT INTO Courses VALUES ('CPET303', 'Computer Project', '3', 'SP2');
INSERT INTO Courses VALUES ('HXXXxxx', 'Humanities Elective', '3', 'SP2');

INSERT INTO Plans VALUES ('000', 'Fal00', 'CPET107');

INSERT INTO Plans VALUES ('001', 'Fal17', 'CPET107');
INSERT INTO Plans VALUES ('001', 'Fal17', 'ELET101');
INSERT INTO Plans VALUES ('001', 'Fal17', 'ELET115');
INSERT INTO Plans VALUES ('001', 'Fal17', 'ENGL101');
INSERT INTO Plans VALUES ('001', 'Fal17', 'MATH124');

INSERT INTO Plans VALUES ('001', 'Spr18', 'CPET125');
INSERT INTO Plans VALUES ('001', 'Spr18', 'ELET144');
INSERT INTO Plans VALUES ('001', 'Spr18', 'ENGL125');
INSERT INTO Plans VALUES ('001', 'Spr18', 'MATH140');
INSERT INTO Plans VALUES ('001', 'Spr18', 'PHYS133');

INSERT INTO Plans VALUES ('001', 'Fal18', 'CPET240');
INSERT INTO Plans VALUES ('001', 'Fal18', 'CPET260');
INSERT INTO Plans VALUES ('001', 'Fal18', 'CPET301');
INSERT INTO Plans VALUES ('001', 'Fal18', 'MATH205');
INSERT INTO Plans VALUES ('001', 'Fal18', 'PHYS135');
INSERT INTO Plans VALUES ('001', 'Fal18', 'SXXXxxx');

INSERT INTO Plans VALUES ('001', 'Spr19', 'CPET215');
INSERT INTO Plans VALUES ('001', 'Spr19', 'CPET222');
INSERT INTO Plans VALUES ('001', 'Spr19', 'CPET252');
INSERT INTO Plans VALUES ('001', 'Spr19', 'CPET303');
INSERT INTO Plans VALUES ('001', 'Spr19', 'HXXXxxx');

INSERT INTO Plans VALUES ('002', 'Fal17', 'CPET107');
INSERT INTO Plans VALUES ('002', 'Fal17', 'ELET101');
INSERT INTO Plans VALUES ('002', 'Fal17', 'ELET115');
INSERT INTO Plans VALUES ('002', 'Fal17', 'ENGL101');
INSERT INTO Plans VALUES ('002', 'Fal17', 'MATH205');

INSERT INTO Plans VALUES ('002', 'Spr18', 'CPET125');
INSERT INTO Plans VALUES ('002', 'Spr18', 'ELET144');
INSERT INTO Plans VALUES ('002', 'Spr18', 'ENGL125');
INSERT INTO Plans VALUES ('002', 'Spr18', 'PHYS231');

INSERT INTO Plans VALUES ('002', 'Fal18', 'CPET240');
INSERT INTO Plans VALUES ('002', 'Fal18', 'CPET260');
INSERT INTO Plans VALUES ('002', 'Fal18', 'CPET301');
INSERT INTO Plans VALUES ('002', 'Fal18', 'PHYS232');
INSERT INTO Plans VALUES ('002', 'Fal18', 'SXXXxxx');

INSERT INTO Plans VALUES ('002', 'Spr19', 'CPET215');
INSERT INTO Plans VALUES ('002', 'Spr19', 'CPET222');
INSERT INTO Plans VALUES ('002', 'Spr19', 'CPET252');
INSERT INTO Plans VALUES ('002', 'Spr19', 'CPET303');
INSERT INTO Plans VALUES ('002', 'Spr19', 'HXXXxxx');

INSERT INTO Students (fname, lname) VALUES ('Trevor', 'Rouse');
INSERT INTO Students (fname, lname) VALUES ('Micheal', 'Batbouta');
INSERT INTO Students (fname, lname) VALUES ('Patrick', 'Kennedy');
INSERT INTO Students (fname, lname) VALUES ('Mark', 'Gadoury');
INSERT INTO Students (fname, lname) VALUES ('Miles', 'Luna');

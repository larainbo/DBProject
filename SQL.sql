CREATE TABLE Student (
StudentID INT PRIMARY KEY,
StudentName CHAR(25) NOT NULL,
StudentMajor Char(25) NOT NULL
)
ENGINE=innoDB;

CREATE TABLE Enrollment (
StudentID INT,
DeptCode CHAR(4),
CourseNum INT,
FOREIGN KEY (StudentID) REFERENCES Student(StudentID),
FOREIGN KEY (DepartmentCode)  REFERENCES Course(DepartmentCode),
FOREIGN KEY (CourseNum) REFERENCES Course(CourseNum)
)ENGINE=InnoDB;

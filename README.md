# Attendance_Management_System_N065_DhyanKundhadia_VashishtTechnologies

### Aim:

The aim of this project is to develop an web page which maintains attendance of students for a single day as provided by a particular professor.

---
### Desciption
Professor will be using the Attendance Management System to mark attendance as present and absent for students on a particular day. Professor can also add or delete the student records from the web page. Professor needs to be logged in to carry out functionalities. Students need not be logged in to check their attendance records. Attendance Records will be shown using Month, Year and Roll Number filter.

### Technologies Used:
- Visual Studio Code for Editing
- PHP Language to carry out backend operations and development of web page and MYSQL operations
- HTML and CSS is used for front end development
- MYSQL for database management
- XAMPP Server to carry out PHP Codes
---

### Steps to Run:
#### Step 1:
Start XAMPP Server and MYSQL Server.
#### Step 2:
Connect to MYSQL Database from localhost/phpMyAdmin and create a new Database named “attendance”, import file named “attendance.sql” on phpMyAdmin and all the tables will be visible once file is imported.
#### Step 3:
Save the downloaded files in “htdocs” folder under “xampp”.
#### Step 4:
Open Localhost on your preferred browser and the path is to be specified in address bar of your browser
#### Step 5:
Now, first page will be loaded which is Attendance Records. Here, you can check the attendance records of students in both divisions without logging in the web page. Attendance Records can be fetched via month and date field and roll number field. It will show a tabulated format of student name and roll number, total days classes were held, number of present days and number of absent days.
#### Step 6:
Then, to mark attendance or add/remove students, two pages have been created (“markatt.php” and “add_remove.php”). To access these pages, professor login is required. Once, login is     clicked from the navbar, it will redirect to login page where following credentials will help you to get logged in and mark attendance.

LOGIN CREDENTIALS:

Email: dhyan@gmail.com

Password: dhyan16

#### Step 7:
Now, on Mark Attendance page, we can select the day, month and year for which attendance is to be marked. Then, the division will be chosen for which attendance is to be marked. The show students’ button will show all the students present in the given division and a sliding button is enabling us to set their status as Present and Absent Students. Once attendance is marked for a day, it cannot be changed. Then pressing mark attendance button will update the records in the database.

#### Step 8:
On Add/Remove Student Page.

For adding student, we can input student name and choose which division he/she is to be added via a radio button. Pressing the add student button, he/she will be added to respective division and updates will be shown in database.
Now, for removing student, we can input student roll number and remove student button will show student details like roll number, name, and division and a confirm delete button will be shown. If confirm delete is pressed, student entry from database will be removed and records will reflect in database


#### Step 9:
From navbar, if we click on logout, then professor will be logged out of session and can no longer mark or change attendance and can no longer add or remove students from database as well.

---

### Conclusion
Objective of this project was to build a user-friendly website to maintain the attendance details of all the students. The attendance records can be managed using this application. This will automate the procedure of marking attendance manually in a written format and details can be easily viewed by the professors and the students at their own time.

The important thing is the system is flexible enough for future modifications. 
The system has been factored into modules to make system adapt to the further changes.
Every effort was made to cover up user requirements and to make it easy to use and user friendly.

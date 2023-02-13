Author: İbrahim Mert İnan
CENG388 WEB PROJECT: HOSPITAL FEEDBACK SYSTEM
This project is made with XAMPP,Sublime Text

https://hospitalfeedbacksystem.herokuapp.com/

if the link is not working please do the following steps.

To open this project please do the following. 
1-Open PHPMyAdmin http://localhost/phpmyadmin (If your PHPMyAdmin has a password please open the dbconn.php and enter your password inside the 3rd parameter in line 3 and save file)
2-Create database name "feedback"
3-Import feedback.sql file given inside the zip package in db file folder
4-Now you can enter the project http://localhost/FeedbackSystem/


For Admin login:
	Admin username:admin
	Admin password:admin123


For Patient Login:
	You can register and login or you can use the following email and password
	Email:mert@gmail.com
	Password:1234


For Register:
	Email must be unique

Project details:
	-This website is a hospital feedback system. 
	-There are 2 types of user: Patient and Admin 
	-Patient gives the feedback to doctor.
	-Doctor has faculty.
	-Admin can see feedbacks.
	-Admin can add and delete faculty.
	-Admin can change his/her own password.
	-Patient can Login.
	-Patient can Register.
	-Patient can upload a profile photo during Register.(Optional)
	-Altough patient can login with the e-mail, but patient gives the feedback with a roll number to provide anonimity of patient.
	-Log events write in log.txt

Note:
	In this project javascript only use for the alert nothing else.

References:
	I found the questionnaire from here : http://hastane.ankara.edu.tr/poliklinik-hasta-memnuniyet-anketi/ 

# PhpCareerWebsite
USC ITP300: a web project building dynamic website with PHP, mySQL, and phpMyAdmin


1. General Description of the Site
As a college student who is looking for internship, I am always nervous about which internship I should apply, or which internship I missed the deadline to apply. This website is to give students an opportunity to store, add, and manage their potential career information under one website using a secure database. Despite its complex of functionality, the site is designed with simplicity and consistency: short description on the main page, and two boxes for two major functions of the site: Search and Add. Other site functions can be found on top left navigation bar, and sub-sites. (More information of the project can be found on my project proposal page under student page at ITP300 website)

2. URL to the Final Project
http://chenjin.student.uscitp.com/career/career_main.php
(Username: 123     Password:123 )

3. List of Functions
security implementation. An user needs to type in the correct login information to use the major functions for the website.  
user-friendly navigation bar on top left corner.
sophisticated database created using MySQL and stored on phpMyAdmin. 
consistent background and cover graphics. 
the entire platform contains a total of 14 sites (sub-sites and supporting php files)
used advanced SQL queries such as "mysqli_fetch_assoc"
used popular PHP functions such as Edit, Insert, Delete, Update, Search, Email, Includes, Sessions, and more. 
generated meaningful Emails through "Share" page.
simplistic and consistent design 

4. Database Information
The name of the database is "chenjin_career" , 
The database has 5 tables: jobs, types, cities, states, countries.  
jobs is the primary table and it has relationship with rest of the 4 tables. 
jobs has 9 fields: job_id, position, company, type_id, city_id, state_id, country_id, deadline, information. 
I have also attached the database schema for your consideration. 

5. Login Information
Currently, the website requires a universal username and password login.
Username: 123  
Password: 123 

6. General Instruction
If this is your first time using the website, please login with username 123 and password 123
once at the homepage, you can either start search a job on the left box, by selecting desired options. Or you can add a new job on the right box. 
when adding a job, job position and company are required, but other fields are optional.
when at searching result page, you can get more information about a specific listing by clicking the button on most right of the page, under "Information/Edit/Delete".
when at searching result page, you can edit or delete a specific listing by clicking the button on most right of the page, under "Information/Edit/Delete".
If you want to know more about the developer of the site, please click "AboutMe" on top left navigation bar.
If you want to email your friends about the site, please click "Share" on top left navigation bar.
when at Share page, email is a required input. other inputs are optional.
all the out-going emails are pre-populated with a greeting message and the website URL. 
if you are done using the website, please click "Logout" on top left navigation bar for security purpose. 

Thank you for visiting the website and Have fun !
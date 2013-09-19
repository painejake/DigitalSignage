# DigitalSignage

DigitalSignage is a cloud application designed to display dynamic content accross TV screens shown within a business or school.

## Features
* HTML5 and CSS3 based.
* Built lean using CodeIgniter
* Features custom configuration
* Posting of events and dates
* BBC feeds pulled from iPlayer
* User managment
* Easily themed with custom layouts

## Installation
Upload all the files to your webroot.
Execute the SQL file under install\database.sql to create the base tables. The default username is admin and password is password. Once logged in the information can be changed under the Manage Account section.
You will need to update your MySQL settings in the file located: install/database.php and move the file to application/config/database.php

Recommended: Delete the install folder.

All the DigitalSignage application settings can be found in the configuration file: application/config/settings.php.
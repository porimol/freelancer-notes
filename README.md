#Waht is Freelancer Notes
Freelancer Note is an freelance project management application.It is very light weight and easy to use. You are able to manage all your projects in one place. You can keep record of your clients, earnings. You are also able to export project recored in PDF format.

**Note :** Freelancer notes is fully open source under [GNU GENERAL PUBLIC LICENSE](https://github.com/Porimol/freelancer-notes/blob/master/LICENSE).

#Installation Guide
###PHP Version Minimum 5.4.0 require
1) Download or Clone the project from right side

2) Extract from zip (You can change the project name)

3) Copy and paste into your web server root directory

4) Create a database

5) Import the database from your project folder. Database name db_freelancer.sql

6) Modify database configuration file(path app/config/database.php)

   change your database connection info.
   **Default mysql database info**
   		'mysql' => array(
   		
     'driver' => 'mysql',
     
     'host' => 'localhost',
     
     'database' => 'db_freelancer',
     
     'username' => 'root',
     
     'password' => 'admin',
     
     'charset' => 'utf8',
     
     'collation' => 'utf8_unicode_ci',
     
     'prefix' => '',
     )
    please make sure you database name, username and pasword(if you have set your database password otherwise leave it blank)
    
 If you do everything perfectly then you can access the application
###Login Information
User : user@user.com

Pass : admin12345
###Login
<img src="http://freelancernotes.techartisans.net/assets/demo-images/user-login.png">

### Dashboard
<img src="http://freelancernotes.techartisans.net/assets/demo-images/dashboard.png">
### Add New Client's Info
<img src="http://freelancernotes.techartisans.net/assets/demo-images/new-client.png">
### All Clients Info
<img src="http://freelancernotes.techartisans.net/assets/demo-images/all-clients.png">
### Add New Marketplace's Info
<img src="http://freelancernotes.techartisans.net/assets/demo-images/new-marketplace.png">
### All Marketplaces Info
<img src="http://freelancernotes.techartisans.net/assets/demo-images/all-marketplaces.png">
### Add New Project's Info
<img src="http://freelancernotes.techartisans.net/assets/demo-images/new-project.png">
### All Projects Info
<img src="http://freelancernotes.techartisans.net/assets/demo-images/all-projects.png">
### User Password Change
<img src="http://freelancernotes.techartisans.net/assets/demo-images/change-pass.png">
### Edit/Update User Profile
<img src="http://freelancernotes.techartisans.net/assets/demo-images/edit-profile.png">
### Reporting Area
<img src="http://freelancernotes.techartisans.net/assets/demo-images/reports.png">
### Reports By Marketplace, Client, Date to Date
<img src="http://freelancernotes.techartisans.net/assets/demo-images/reports1.png">
### Reports By Marketplace
<img src="http://freelancernotes.techartisans.net/assets/demo-images/reports2.png">
### Reports By Client
<img src="http://freelancernotes.techartisans.net/assets/demo-images/reports3.png">
### Reports By Date to Date
<img src="http://freelancernotes.techartisans.net/assets/demo-images/reports4.png">

 
##About Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


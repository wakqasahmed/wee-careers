wee-career-portal 
=================
An independent mini career portal for your site

<<<<<<< HEAD
CURRENT VERSION 1.0

Summary:
(1-click installable and customizable) Wee Careers is a mini career portal to integrate with any small &amp; medium company/organization websites to post jobs and receive applications from candidates. 

It is built using php, codeigniter, html5 biolerplate, twitter bootstrap along with bootswatch, mysql.

Features:

=> Post jobs categorized by department (for admin)
=> Receive applications along with Resume upload
=> Vacancy Explorer for job seekers
=> Applications viewer (for admin)

Installation instructions:

Steps: (installation is similar to wordpress installation)

1) Create a blank database on your server (e.g. wee_careers)
2) Copy wee_careers folder to your web folder
3) Open installation directory in your browser (e.g. http://yoursite.com/wee_careers/install)
4) Enter database information and other admin information
5) Change Baseurl in .htaccess (e.g. if http://yoursite.com/wee_careers/ set /RewriteBase/ as /wee_careers/)
6) Change permission of uploads directory to chmod 777 (so resume can be uploaded to this folder)


If you have find any problem or have recommendations, please file issue or send pull request at
https://github.com/wakqasahmed/wee-career-portal/


Credits:
Alessandro Arnodo (https://github.com/vesparny/codeigniter-html5boilerplate-twitter-bootstrap)
Mike Crittenden (https://github.com/mikecrittenden/codeigniter-installer)
Muhammad Usman (https://github.com/usmanhalalit/option_helper)


Author:

Waqas Ahmed

Twitter: @wakqasahmed
Website: http://www.wakqasahmed.com
E-mail: wakqasahmed@gmail.com
=======
What it is?

Wee Careers is a mini career portal which is ready to integrate with companies existing websites. 

It is built over PHP, Codeigniter, HTML5 Biolerplate, Twitter Bootstrap and Mysql.

How to use?

1) Extract the package and place the folder as a sibling of your root site.
2) Edit application/config/config.php and enter your base url with trailing slash.

for e.g.
$config['base_url'] = 'http://example.com/wee-career-portal/';
3) Create database ‘wee-careers’ (and link it with a database username) 
4) Now open up the install directory in browser and enter database credentials.

for e.g.
http://example.com/wee-career-portal/install

You can link it your current website with it using Career link, also you can customize look and feel by modifying template views.

If you have problems or have recommendations, please file an issue at http://github.com/wakqasahmed/wee-career-portal/ 

Author:
Waqas Ahmed
http://www.wakqasahmed.com

Thanks to:

Alessandro Arnodo
https://github.com/vesparny/codeigniter-html5boilerplate-twitter-bootstrap

mike crittenden
https://github.com/mikecrittenden/codeigniter-installer


>>>>>>> initial release

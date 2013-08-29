wee-careers
=================
An independent mini career portal for your site

CURRENT VERSION 1.0

Summary:
(1-click installable and customizable) Wee Careers is a mini career portal which is ready to integrate with companies existing websites. Any small &amp; medium company/organization websites who require career portal to post jobs and receive applications from candidates can use it easily. 

It is built using php, codeigniter, html5 biolerplate, twitter bootstrap along with mysql database.

Features:

=> Post jobs categorized by department (for admin)

=> Receive applications along with Resume upload

=> Vacancy Explorer for job seekers

=> Applications viewer (for admin)

Installation instructions:

Steps: (installation is similar to wordpress installation)

1) Create a blank database on your server (e.g. wee_careers)

2) Copy wee_careers folder to your web folder (usually place the folder as a sibling of your root site)

3) Edit application/config/config.php and enter your base url with trailing slash.

for e.g.
$config['base_url'] = 'http://example.com/wee-careers/';

4) Open installation directory in your browser (e.g. http://yoursite.com/wee_careers/install)

5) Enter database information and other admin information

6) Change Baseurl in .htaccess (e.g. if http://yoursite.com/wee_careers/ then set /RewriteBase/ as /wee_careers/)

7) Change permission of uploads directory to chmod 777 (so resume can be uploaded to this folder)


You can link it your current website with it using Career link, also you can customize look and feel by modifying template views.

If you have find any problem or have recommendations, please file issue or send pull request at
https://github.com/wakqasahmed/wee-careers/

Credits:

Alessandro Arnodo (https://github.com/vesparny/codeigniter-html5boilerplate-twitter-bootstrap)

Mike Crittenden (https://github.com/mikecrittenden/codeigniter-installer)

Muhammad Usman (https://github.com/usmanhalalit/option_helper)


Author:

Waqas Ahmed

Twitter: @wakqasahmed

Website: http://www.wakqasahmed.com

E-mail: wakqasahmed@gmail.com

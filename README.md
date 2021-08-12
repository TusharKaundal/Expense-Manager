# Expense-Manager
### Expense manager website that can be used by all for tracking their expenses accordingly.The user can add the initial budget for the expenses and give it a title accordingly.Further user can add bills under the given budget and track her expenses accordingly.

## SETUP
***
1. Start the Apache and Mariadb modules using the WAMPSERVER controller.
2. If you had Mysql module installed on your local system,so please provide port number in place of 3306 in common.php(in case of MariaDB port number is 3306 and for Mysql it is 3308).
3. Open the phpMyAdmin with user root and without any password,if you have created different user and password,so please also provide changes in common.php file . 
4. After login into phpMyAdmin,now create a database "budget". 
5. Import the budget.sql file present in the zip folder.
6. Open the www folder in the wampp folder. Copy paste the folder expsmngr.
7. Open the browser (chrome), type localhost/expsmngr and you should see the index page of the website.

For linux user:
1. Install LAMPSERVER and after that install Mariadb module with root as default user with no password .
2. If you want to create password and after creating password please provide changes in commmon.php file .
3. In case of linux while installing apache server copy paste the folder expsmnger in either htdocs or html(location of folder /var/www/html/ or /usr/local/apache2/htdocs/) 
4. And at last please change the owner of img folder from root to apache .(using command - chown apache img ). 

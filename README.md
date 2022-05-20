# Car-Garage
 CENG388 Final Project
 
 About website:

The adress of the website is: cargarage.store(currently unavailable)

-The purpose of the website is to buy or sell cars.

-The user should sign in to the website to sell his/her car.

-The user can add a profile picture, update it, change his/her password, put the car on sale or remove the car from sale.
He/she can write comments on cars that are on sale, delete their comments, and add or remove cars from their favorites. 

-If some photos are not displaying properly, it is because of the error from the host server because 
all kinds of things have been tested.No errors were encountered when running the source code from localhost.   

About codes and database:

-There are 5 tables in this project on mysql. Cars table holds the cars and its information. Comments table holds comments on cars.
Favorites table holds cars that users have favorited. Photos table holds user profil picture. Registration table holds users and their 
information.

-The necessary connection with mysql is provided in connection.php and it is included in every php file. 

-In source code and website connection informations are different.Because on of them has host websites information, source code has
localhost information.

-check_login.php file has checked whether any user is logged in. If no user is logged in, 
it automatically redirects to the home page when it is requested to access php files outside of home.php.

-Log events records made by users are automatically written to the log.txt file.  

Thank you for eveything, now you are ready to sell your car or find your dream car. Welcome to the car garage !!!

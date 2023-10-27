Please download and install the required files for your OS below

* MongoDB Community Server : https://www.mongodb.com/try/download/...
    This is used for looking at the Database whenever data updated or deleted online.
    This will not make a file on your OS for your data, but will be stored on MongoDB
    servers.

* MongoDB Drivers for PHP : https://github.com/mongodb/mongo-php-driver/releases/
    Download the right driver for your computer architecture.
    The Driver I used was:
        php_mongodb-1.16.2-8.2-ts-x64.zip

* Xampp : https://www.apachefriends.org/
    Download the version of XMAPP v8.2.4 and set up using the installer        
   

* Composer : https://getcomposer.org/download/
    Download the latest version of composer and install it using the installer.
    When installing link your composer to the right PHP.exe
    If using Xampp it would be wherever you installed Xampp.
        ..\xampp\php\php.exe


Instructions once you have the required files downloaded and installed on your OS

* Step 1: Once you have Xampp downloaded and you can open the program. 
            Click the Config button that is associated with the Apache Module.
            Then click on PHP (php.ini).
            This will open up the .ini file in a text editor.
            Scroll down to Dynamic Extension and copy and paste:
                extension=php_mongodb.dll 
            Once you've added it to your .ini file save the file and close the 
            text editor.

* Step 2: Adding the MongoDB Drivers for PHP:
            Once you've downloaded the right MongoDB driver (Make sure its ThreadSafe or TS)
            Open the .zip file and copy file named:
                php_mongodb.dll
            Then go to where you have Xampp installed and paste the file in the extensions folder:
                ..\xampp\php\ext
            The php_mongodb.dll file should be in the ext folder with the other .dll files.

* Step 3: Copying the GitHub files:
            Once you've had all the required files downloaded and running. Copy and Paste all
            the files in my IndividualAssignment3 repository. Including the actions and vendor folders into xampp in the htdocs folder which can be found:
                ..\xampp\htdocs
            Make a new folder in the htdocs and call it IndividualAssignment3 and paste all the files from my GitHub Repository

* Step 4: Running my file:
            Once you have everything above done, you will be able to run this project. To run this project on the XAMPP control panel Start the Apache module. Go to your browser and type: 
                http://localhost/IndividualAssignment3/
            You should be greeted with a barebones login screen with a button that takes you to register for an account. Once registered you use your email and password to login to your profile. This will tell you your Firstname, Lastname, Email, and Phone Number used. From here you can delete your account or update your account information which is stored in MongoDB.

* To access the MongoDB database email me (r_baraho@uncg.edu) to send you an exported file of the database which will include the information that was added or deleted. Ill provide a sample file in my IndividualAssignment3 GitHub repository.
                assignment3.users.json
If I missed any steps or file is not working email me and I can come to office hours or give you a demonstration from my end.

# Minerva #

## Prerequisites ##
* In VsCode, install the extension "PHP Intelephense". It will make VsCode able to predict and help with PHP syntax.
    * Go to: File > Preferences > Extensions, search for the extension and install it.
* Install GIT, make sure to select "(NEW) Add GIT Bash profile to Windows terminal" in the first page of the installation. No need to change anything else. Link: https://git-scm.com/download/win

## GIT Clone ##
* Restart your terminal if it was open.
* Create a GIT account on: https://github.com/
* Run this command to initiate the email address you used for GIT as a global variable in your terminal (it will be appended to your commits): git config --global user.email "your.email@mail.com"
* In your terminal, navigate to your working directory (PHP).
* Clone the repository locally: git clone https://github.com/chad83/Minerva.git you might be asked to sign in, selected "browser sign in" and allow the GIT client its permissions (you must be signed in to github on your browser).
    * This will create a directory called "Minerva" with all the code in it. The code is missing some details as an example of GIT security (pointless here but a good practice).

## Running Minerva ##
* The default "docker-compose.yml" has been removed for security reasons (it has the db password) and was replaced with an example one without the sensitive data. Copy "docker-compose-example.yml" to "docker-compose.yml" (don't just rename it) and change the db password in the new file, not in the examlpe.
    * "docker-compose.yml" has been configured to be ignored by GIT so it won't be committed, "docker-compose-example.yml", however, will be committed so if you add the password in it, it will be available on GIT.
* From your terminal in the Minerva folder, run: **docker-compose up -d** to launch the applicat, first time might take a while. When you're done, **docker-compose down** shuts it down.

## Accessing the Database ##
This docker setup comes with **Adminer** as a database client that you can use to browse the database.
* In your browser, go to http://localhost:8080/ enter the correct credentials, the database name is "minerva". If it is the first time you're logging in, the db might not have been created, keep the db field blank and move on to the next step to initiate the db.
* On the first run only, Initiate the db: In you project directory, open the file "dbinit.txt". In Adminer, go to "SQL Command", copy the content of dbinit.txt in the text box to initiate the db with some basic structure and data.

**NB: If you have just launched docker, it might take a few seconds after the containers have started for the db to be available**

## Committing to GIT ##
All of this section is run from your terminal, while in the working directory of your project.
* [optional] you can run **git status** at any time to see the current status of the repository. Try it before committing changes to see your changes.
* Run **git add .* (with the dot, reference to the current directory) to add all changed files to the next commit. The changes are now "staged" but still on your machine.
* Run **git commit -m "commit message"** to commit your changes. Change "commit message" to a description of the changes you are introducing to the project (keep the double quotes).
* Run **git push** to push your changes.

## Updating GIT Repository##
In the event that someone else made a contribution to the project, you would want your files to be in sync. This is useful to do frequently but mandatory before you commit your changes.
* Run **git pull** to get the latest version of the reposirtory.

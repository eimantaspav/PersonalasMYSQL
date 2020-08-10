# INSTRUCTIONS:

1. Open visual studio and run a new terminal.
2. Use the cd command in the terminal to change the working directory to your "Ampps" "www" folder. 
(Example: cd "C:\Program Files\Ampps\www" (it is usually the  default installation path, but please change it accordingly).
3. If you have cloned the project before, please delete the "PersonalasMYSQL" folder in the "www" folder.
4. After making sure that you are in the "www" folder, clone the project with the following command: git clone https://github.com/eimantaspav/PersonalasMYSQL.git

5. DATABASE IMPORT

Open Mysql Workbench software and create a new connection with the following information:

	Connection name: ProjectStaff
	Hostname: 127.0.0.1 
	Username: root

Now please connect with the password "mysql".
Once connected, select "Server" -> "Data Import".
Change the path of "Import from Dump Project Folder" to the cloned "mysqldb" folder (Example: C:\Program Files\Ampps\www\PersonalasMYSQL\mysqldb).
Press the "Start Import" button at the bottom right.

6. Open your browser and enter the following page "http://localhost/PersonalasMYSQL/" (without the quatation marks).
7. To make sure that you are currently viewing the latest version of the project, please press Ctrl+f5 to clear the browser cache.


FEATURES:

1. Create/delete/asign project.
2. Add/delete/asign new employee.
3. Edit project/employee name.

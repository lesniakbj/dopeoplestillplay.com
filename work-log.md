
- Database:
  - Create game_game table = id, game_name, year_released, description
  - Create a game_data_feed_* tables with data feeds about games
  - Come up with a process for backing up the email list each night, or at least throw away useless emails.
	- Have a secondary database that the current one is backed up to each night; run as a MySQL job
  - Schedule a job to run each night to do the following:
    - Scrape data from the various data_providers
    - Email the contact@dopeoplestillplay.com with an updated list of emails added that day.
  - Look at the data feeds for ideas on table structure, game_game will most likely include Rating as well.
  - Create game_us_rating table for US game ratings (id, rating, min_user_age, description) 
  - Create game_us_rating_descriptors for US game ratings (id, rating_descriptor, description)
  
  - Once game table is created, add FK to game_available_platforms
  - Thoughts...
  
****

- On home:
  - Cycle through "flavor text" under the images; create flavor text to cycle through
  - Add more images to cycle through for the bottom images
  - Controller receives data from GameModel with text and images from the model
  - Model loops through 3 received images and text and displays them in place
  - Controller:
    - Add a new method (new-home?) to serve the actual home page.
    - Begin construction on the look & feel of the actual home page.

****

- Admin:
  - Google: admin page design, look @ images
  - Display entered data
	- Display the current data in each table, chosen by the admin
	- Display a list of tables for the admin to look @
	- Create an admin_table_exception table with a list of tables that will NOT be delivered to an admin
	- Display user stats when they are collected
	- Google Analytics Stats
  - Enter new data
	- Add tools to allow the admin to alter/add data to tables
	- Add tools to add news/announcments to the main screen (title, text)
	- Add 
  - Move AdminHome to subfolder and change all routes to be in /admin
  - Data Tool:
    - Make it so the datascrape is done with an AJAX call into the DataViewer
	- Load the response of the AJAX call in the data viewer along with relevant call information
	- Have the right side be the tool options (example: DataInformation has options for platform/game combo (form) / scrape all data from database games (button))
	  - The AJAX call will call controller method that returns a single view. On .done() the ajax call injects the view into the right side. 
	  - Each call should populate fields associated with the data returned.
  - Database Tool:
    - Look @ data feeds tool, Left Side will be list of tables; right side will be actions able to be taken on the table
	- Left (list of tables); Right (Add data, Delete Data, Drop Table, View Data, etc..)
  - Top side nav with following items:
    - View list of all database tables - click to view data on the table (database tool)
    - Create new tables (database tool)
    - Add data to existing tables. (database tool)
    - Remove data from the system (add an is_delted flag to the base data) (database tool)
	- Scrape data from all the datasourcese (datatool)
	- View Logs
  - Add following functions:
    - View/Clear error logs
    - Data Feed Management (Schedule job running, view jobs, recieve all data, view status of data feeds, view most recent data)
    - Database Utility
    - Viewing game data
  - On each page, replicate the look & feel of the home page
    - Fill the tool into the .tool-area container.
  - Change admin tool routes to ONLY respect strings, NO numbers
  - Change each data scrape tool to do the following:
	- Scrape all data related to the tool
	- Scrape specific data (passed as param, or searched by admin)
  - CSS:
	- Admin Nav = Horizontal
	- Figure out a new way to display data, tools should be better aligned
	- The main tool area should be split in half when there is no specific tool (example, left side datascrape buttons, right side live view of the data scrape)

****

- Images:
  - game-banner instead of game-images
  - game-slot instead of game-image
  - game-img -> game-img

****

- Forum:
  - Overclock.net style news section with most recently commented topics

****

- Login:
  - Handle login sessions
  - Handle user input
    - On input, check if user exists, if not generate a salt and hash salt + password
    - If exists, grab the salt, hash and check against hashed_pw
  - If no user, state can't find user/email/password combination.
  - Ajax?

****

- Rewrites:
  - Figure out how to force http:// to https:// while not breaking image/resource paths

****

- Stats:
  - Scrape data from steam website on game stats
  - Every hr? Every 1/2 hr? ()
  - API: https://www.mashape.com/lesniakbj/applications/do-people-still-play

****

- .htaccess:
  - Current root .htaccess no longer redirects to subdomains when the index.php .htaccess is present within the root of the subdomain; fix this.
  
****

- Google:
  - Analytics integration to the main site.
  - Look @ most common JS functions on websites

****

- **Completed:**
  - Database:
    - ~~Add game sub genres~~
    - ~~Add game genres~~
    - ~~Create a user_user table = id, username, salt, hashed_pw, last_visit~~
    - ~~Add some seed data to the table~~
    - ~~[Added data to game_genre and game_sub_genre]~~
    - ~~[Added a user to user_user]~~
    - ~~[Added column to user_email_list, date_added]~~
    - ~~[Added 4 game data providers, URL's to API's, and keys when needed]~~
    - ~~[Created better IP tracking in Admin Login attempt]~~
	- ~~[Added game_platform and game_available_platforms tables]~~
    - ~~[Populated game_platform with current & next gen platforms]~~
    - ~~[Added tables to table_exclusions]~~
    - ~~[Changed table names to be more succinct] ~~
    - ~~[Added datafeeds to schema table]~~
    - ~~[Added steamspy and gameinformation datafeeds]~~
  
  - Admin: 
    - ~~Create login for admin~~
    - ~~/admin redirects~~
	
  - Home:
    - ~~Loop through CSS to add multiple CSS strings to a page if needed.~~
   
  - Forum:
    - ~~forum.dopeoplestillplay.com~~
    - ~~/forums redirects~~
   
  - Login:
    - ~~Handle login sessions (admin)~~
   
  - Rewrites:
    - ~~Handle redirects to subdomain through controller if not able to MOD_REWRITE~~
  

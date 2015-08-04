```
1. Database:
  - Add game genres XX
  - Add game sub genres XX
  - Create a user_user table = id, username, salt, hashed_pw, last_visit XX
  - Create game_game table = id, game_name, year_released, description
  - Add some seed data to the table XX
  - Come up with a process for backing up the email list each night, or at least throw away useless emails.
  - Schedule a job to run each night to do the following:
    - Scrape data from the various data_providers
    - Email the contact@dopeoplestillplay.com with an updated list of emails added that day.
  - [Added data to game_genre and game_sub_genre]
  - [Added a user to user_user]
  - [Added column to user_email_list, date_added]
  - [Added 4 game data providers, URL's to API's, and keys when needed]
```

2. On home:
  - Cycle through "flavor text" under the images; create flavor text to cycle through
  - Add more images to cycle through for the bottom images
  - Controller receives data from GameModel with text and images from the model
  - Model loops through 3 received images and text and displays them in place
  - Controller:
    - Add a new method (new-home?) to serve the actual home page.
    - Begin construction on the look & feel of the actual home page.

3. Admin:
  - Create login for admin
  - Display entered data
  - Enter new data
  - Left side nav with following items:
    - View list of all database tables - click to view data on the table
    - Create new tables
    - Add data to existing tables. 
    - Remove data from the system (add an is_delted flag to the base data)
	
4. Images:
  - game-banner instead of game-images
  - game-slot instead of game-image
  - game-img -> game-img
	
5. Forum:
  - Overclock.net style news section with most recently commented topics
  - forum.dopeoplestillplay.com
	
6. Login:
  - Handle login sessions
  - Handle user input
    - On input, check if user exists, if not generate a salt and hash salt + password
    - If exists, grab the salt, hash and check against hashed_pw
  - If no user, state can't find user/email/password combination.
	
7. Rewrites:
  - Figure out how to force http:// to https:// while not breaking image/resource paths
	
8. Stats:
  - Scrape data from steam website on game stats
  - Every hr? Every 1/2 hr? ()
  - API: https://www.mashape.com/lesniakbj/applications/do-people-still-play
	
9. .htaccess:
  - Current root .htaccess no longer redirects to subdomains when the index.php .htaccess is present within the root of the subdomain; fix this.
	  
	

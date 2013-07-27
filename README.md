jingo
=====
Helps you get updates when you have to check-in to a place.
Also set updates during the timeslot
Story

Suppose you discover a nice restaurant (by ﬁnding it on the web or by walking by it) and you think your friends might like this place. Or you ﬁnd a nice pair of shoes in a shop window. It would be useful if you could post a note about this place, such that your friends (or maybe everybody) receive the note if they come within 300 yards of this place. Or maybe only if they come within 300 yards during lunch time.
What it does
Part 1

Write a small message of few words and add hyperlink. Note is associated with the localtin and the radius of interest (Say 100 yards) around the location.
Set the note to be seen during the time period (Start date and End date and the time to be seen).
Add keyword(tags or channel) that specifies what the note is (Just like hashtags on twitter).
Part 2

Set the kind of updates people can receive. Like subscribing to a hashtag. e.g. Carol wants to receive #food updates during lunchtime, from friends.
When you check-in somewhere you should get updates on hashtags subscribed to. Or show available hashtags.
Set status message of user during the time interval set by them.
How the code works ?
Include files

header.php : Include scripts , css , twitter bootstrap and database connection.
Signup and Login

create_new_user.php : Page with signup and login form
User Homepage

userhome.php : Home page for the user Contains information about the notes posted by the user. Time when the note was posted in ('x' mins ago format). Add inputs like radius for post , tags and schedule for post.

login.php : Login the user and re-direct him to userhome.php

logout.php : Ends the user session and logs him out.

User Settings

settings.php_ : User can edit his old settings

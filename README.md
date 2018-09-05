Automatic action: Assign a due date to undated cards
====================================================

This plugin adds an automatic action to Kanboard which will add due dates to undated items on a board.

This action is run as part of the daily cron job.

Your configuration may vary depending on how your cronjobs are already configured.

In my environment, my Apache server is running as the www-data user. The base directory for my Kanboard installation is /var/www/html/kanboard

Therefore, I have added the following line to the crontab file for the www-data user and added the following line:

0 1 * * * cd /var/www/html/kanboard && ./cli trigger:tasks >/dev/null 2>&1

This ensures that all task related triggers are processed every day at 1:00am.
The reason for using this action is to ensure that all of the cards on a board will show up on a calendar feed (ICS)

It is a requirement that a card has both a due date and an owner for it to properly appear in ICS feeds.

This action will help ensure that items are not accidentally missed because a due date was not added.

Any undated cards found will have a due date of "today" automatically added

When adding an automatic action, the action name is shown as
"Automatically add a due date to undated items - to force them to appear on the calendar view"

Author
------

- David Morlitz
- License MIT

Requirements
------------

- Kanboard >= 1.0.40

Installation
------------

You have the choice between 3 methods:

1. Install the plugin from the Kanboard plugin manager in one click
2. Download the zip file and decompress everything under the directory `plugins/TaskAssignDateToUndated`
3. Clone this repository into the folder `plugins/TaskAssignDateToUndated`

Note: Plugin folder is case-sensitive.

# Development Log

## Commit Log

### Nightly Build 9 Feb 2019
* Add doctrine/dbal via composer
* Refactor date selection in as formdate component
* Returned expenses now sorted by date
* Add menu for report By Category and By Date
* Add ReportController for reporting
* Add ReportController@byDate for total expense by date
* [TODO 1] Add ReportController@byCategory for total expense per category

### Nightly Build 3 Feb 2019
* Add the following column to expenses table: description
* Add the following column to categories table: level
* Create mutator Expense::setExpenseDateAttribute to format expense_day, expense_year, expense_month, day_of_month
* Fix expense_day, expense_year, expense_month, day_of_month formatting in mutator Expense::setExpenseDateAttribute
* [TODO 1] Categories uniqueness per level and per user_id
* ~~ [TODO 2] Script to correct the field expense_day, expense_year, expense_month, day_of_month for expense already in database~~ - Fixed through phpMyAdmin 3 Feb 2019
* _MERGED TO MASTER_

### Nightly Build 29 Jan 2019
* Homepage now redirect to home view instead of welcome
* Fix screen alignment for big and small screen using input group & grid
* ~~[TODO 1] Add description field to expense~~ - Completed 3 Feb 2019
* [TODO 2] Expense summary as part of reporting, i.e. by category
* _MERGED TO MASTER_

### Nightly Build 28 Jan 2019
* Create expense route and view for GET /expense to ExpenseController@index
* Add function to select date range
* [TODO 1] Create function for selecting "This Month", "This Year", "This Week"
* [TODO 2] Create function for selecting "Last Month", "Last Year", "Last Week"
* ~~[TODO 3] Tidy up screen alignment for big screen~~ - Completed 29 Jan 2019
* ~~[TODO 4] Tidy up screen alignment for small screen~~ - Completed 29 Jan 2019
* ~~[ISSUE 5] New Expense screen after select category still highlight Expense quick access icon instead of New Expense~~ - Fixed 29 Jan 2019

### Nightly Build 27 Jan 2019
* Create category route and view for GET /category to CategoryController@index
* Category view will check if logged in user is admin. If user is admin, then edit action will be shown to edit the category
* [TODO 1] Create page for new category
* [TODO 2] Create page for editing category
* [TODO 3] Place menu for category, not in quick access
* ~~[TODO 4] Create expense summary table~~ - Changed to [TODO 2] in 29 Jan 2019

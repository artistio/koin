# Development Log

## Commit Log

### Nightly Build 29 Jan 2019
* Homepage now redirect to home view instead of welcome
* Fix screen alignment for big and small screen using input group & grid

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
* [TODO 4] Create expense summary table

<div class="container quick-access-menu">
    <div class="row justify-content-center">
        <div class="col-10 col-md-8">
          <div class="row">
            <div class="col-3">
              <a href="/expense/category">
                <img id="new-expense" class="quick-access-menu-icon rounded {{ isset($isExpense) ? 'quick-access-menu-icon-highlight' : ''}}" src="/svg/new_expense.svg">
              </a>
              <div class="quick-access-menu-label d-none d-sm-block">{{ __('New Expense') }}</div>
            </div>
            <div class="col-3">
              <img id="list-expense" class="quick-access-menu-icon rounded" src="/svg/list_expense.svg">
              <div class="quick-access-menu-label d-none d-sm-block">{{ __('List Expenses') }}</div>
            </div>
            <div class="col-3">
              <a href="/budget">
                <img id="budgeting" class="quick-access-menu-icon rounded {{ isset($isBudget) ? 'quick-access-menu-icon-highlight' : ''}}" src="/svg/budgeting.svg">
              </a>
              <div class="quick-access-menu-label d-none d-sm-block">{{ __('Budget') }}</div>
            </div>
            <div class="col-3">
              <a href="/contact">
                <img id="contacts" class="quick-access-menu-icon rounded {{ isset($isContact) ? 'quick-access-menu-icon-highlight' : ''}}" src="/svg/contacts.svg">
              </a>
              <div class="quick-access-menu-label d-none d-sm-block">{{ __('Contacts') }}</div>
            </div>
          </div>
        </div>
    </div>
</div>

<form class="form-date" id="form-date" method="GET" action="{{ $action }}">
  @csrf

  <div class="row no-gutters">
    <div class="col-12 col-md-5">
      <div class="input-group input-group-sm">
        <div class="input-group-prepend">
          <span class="input-group-text">{{ __('From') }}</span>
        </div>
        <input name="start_date" type="date" id="inputStartDate" class="form-control" placeholder="Start Date" value={{ $start_date }} required>
      </div>
    </div>
    <div class="col-12 col-md-5">
      <div class="input-group input-group-sm">
        <div class="input-group-prepend">
          <span class="input-group-text">{{ __('To') }}</span>
        </div>
        <input name="end_date" type="date" id="inputEndDate" class="form-control" placeholder="End Date" value={{ $end_date }} required>
      </div>
    </div>
    <div class="col-12 col-md-2">
      <button class="btn btn-sm btn-primary text-uppercase" type="submit">{{ __('Change') }}</button>
    </div>
  </div>

</form>

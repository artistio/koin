@extends('_layouts.app')

<!-- Contact Index Template -->

@section('content')
@include('_components.quickaccess')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 col-md-8">
      <table class="table">
        <thead>
          <th scope="col">{{ __('Name') }}</th>
          <th scope="col">{{ __('Default Expense Code') }}</th>
        </thead>
        <tbody>
          @foreach ($contactList as $contact)
            <tr>
              <td>{{ $contact->name }}</td>
              <td>{{ $contact->expense_code }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="colmuns">
    <div class="column is-8 is-offset-2">
      <div class="card">
        <div class="card-content">
          <table class="table fullwidth is-hoverable dept">
            <thead>
              <tr>
                <th>#</th>
                <th>Departments/Offices</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($departments as $department)
                <tr>
                  <td>{{ $number++ }}</td>
                  <td>{{ $department->name }}</td>
                  <td><i class="fa fa-edit mr-4"></i> <i class="fa fa-trash"></i></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script>
  $(document).ready( function () {
    $.fn.dataTable.ext.classes.sPageButton = 'button pagination-link';
    $.fn.dataTable.ext.classes.sPageButtonActive = 'button is-current';
    $('.dept').DataTable({
        "processing": true,
    });
  } );
  </script>
@endsection

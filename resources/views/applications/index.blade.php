@extends('layouts.app')

@section('content')
  <div class="section">
    <nav class="breadcrumb">
      <ul>
        <li class="is-active"><a href="#" aria-current="page">Applications</a></li>
        <li><a href="{{ route('applications.create') }}" class="button ml-3"><i class="fa fa-plus mr-2"></i> Create</a></li>
      </ul>
    </nav>
    <div class="card">
      <div class="card-content">
        @if (count($applicants) > 0)
          <table class="table is-fullwidth appl">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Course</th>
                <th>School</th>
                <th>Department</th>
                <th>No. of HRS</th>
                <th>Deployment</th>
                <th>End Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($applicants as $key => $applicant)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td><a href="{{ route('applications.show', $applicant->id) }}">{{ $applicant->first_name .' '. $applicant->m_i.'. '.$applicant->last_name }}</a></td>
                  {{-- <td>{{ $applicant->last_name }}</td>
                  <td>{{ $applicant->m_i }}</td> --}}
                  {{-- <td>{{ $applicant->gender }}</td> --}}
                  <td>{{ $applicant->course }}</td>
                  <td>{{ $applicant->school }}</td>
                  <td>{{ $applicant->department->name }}</td>
                  <td>{{ $applicant->no_hrs }}</td>
                  <td>{{ $applicant->start_date }}</td>
                  <td>{{ $applicant->endo }}</td>
                  <td>
                    @include('applications.actions')
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <i>No data found!</i>
        @endif
      </div>
    </div>
  </div>

  <div class="modal" :class="{ 'is-active': isActive }">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Add</p>
        <button class="delete" aria-label="close" @click="close"></button>
      </header>
      <section class="modal-card-body">
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Name</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded has-icons-left">
                <input class="input" type="text" placeholder="First Name">
                <span class="icon is-small is-left">
                  <i class="fa fa-user"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control is-expanded has-icons-left">
                <input class="input" type="text" placeholder="Last Name">
                <span class="icon is-small is-left">
                  <i class="fa fa-user"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control is-expanded has-icons-left">
                <input class="input" type="text" placeholder="M.I.">
                <span class="icon is-small is-left">
                  <i class="fa fa-user"></i>
                </span>
              </p>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label">
            <label class="label">Gender</label>
          </div>
          <div class="field-body">
            <div class="field is-narrow">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="member">
                  Male
                </label>
                <label class="radio">
                  <input type="radio" name="member">
                  Female
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Course</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded has-icons-left">
                <input class="input" type="text" placeholder="">
                <span class="icon is-small is-left">
                  <i class="fa fa-graduation-cap"></i>
                </span>
              </p>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">School</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded has-icons-left">
                <input class="input" type="text" placeholder="">
                <span class="icon is-small is-left">
                  <i class="fa fa-building"></i>
                </span>
              </p>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Department</label>
          </div>
          <div class="field-body">
            <div class="field is-narrow">
              <div class="control">
                <div class="select is-fullwidth">
                  <select>
                    <option>Business development</option>
                    <option>Marketing</option>
                    <option>Sales</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <hr>

        <div class="field is-horizontal">
          <div class="field-label">
            <div class="field is-narrow">
              <label class="label">No of Hours</label>
              <p class="control is-expanded has-icons-left">
                <input class="input" type="text" placeholder="">
                <span class="icon is-small is-left">
                  <i class="fa fa-hourglass"></i>
                </span>
              </p>
            </div>
          </div>
          <div class="field-body">
            <div class="field">
              <label class="label">Deployment date</label>
              <p class="control is-expanded has-icons-left">
                <input class="input" type="date" placeholder="deploy">
                <span class="icon is-small is-left">
                  <i class="fa fa-hourglass-start"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <label class="label">End Date</label>
              <p class="control is-expanded has-icons-left">
                <input class="input" type="date" placeholder="">
                <span class="icon is-small is-left">
                  <i class="fa fa-hourglass-end"></i>
                </span>
              </p>
            </div>
          </div>
        </div>

        <hr>

        <div class="field is-horizontal">
          <div class="field-label">
            <label class="label">Requirements </label>
          </div>
          <div class="field-body">
            <div class="field is-narrow">
              <div class="control">
                <label class="checkbox">
                  <input type="checkbox">
                  Endorsement from School
                </label>
              </div>
            </div>
            <div class="field is-narrow">
              <div class="control">
                <label class="checkbox">
                  <input type="checkbox">
                  DOLE
                </label>
              </div>
            </div>
            <div class="field is-narrow">
              <div class="control">
                <label class="checkbox">
                  <input type="checkbox">
                  Resume
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label">
            {{-- <label class="label">Requirements</label> --}}
          </div>
          <div class="field-body">
            <div class="field is-narrow ml-2">
              <div class="control">
                <label class="checkbox">
                  <input type="checkbox">
                  Barangay/Police Clearance
                </label>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <label class="checkbox">
                  <input type="checkbox">
                  2x2 Picture
                </label>
              </div>
            </div>
          </div>
        </div>

      </section>
      <footer class="modal-card-foot">
        <button class="button is-success">Save changes</button>
        <button class="button" @click="close">Cancel</button>
      </footer>
    </div>
</div>
@endsection

@section('scripts')
  <script>
  $(document).ready( function () {
    $.fn.dataTable.ext.classes.sPageButton = 'button pagination-link';
    $.fn.dataTable.ext.classes.sPageButtonActive = 'button is-current';
    $('.appl').DataTable({
        "processing": true,
    });
  } );
  </script>
 <script type="text/javascript">
   new Vue({
     el: '#app',
     data: {
      isActive: false
    },
    methods: {
      openAdd() {
        this.isActive = true
      },
      close() {
        this.isActive = false
      },
    }
   })
 </script>
@endsection

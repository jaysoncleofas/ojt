@extends('layouts.app')

@section('content')
  <div class="section">
    <nav class="breadcrumb">
      <ul>
        <li><a href="{{ route('applications.index') }}">Applications</a></li>
        <li><a href="{{ route('applications.create') }}">Create</a></li>
        <li class="is-active"><a class="">Show</a></li>
      </ul>
    </nav>
    <div class="card">
      <header class="card-header">
        <p class="card-header-title">
          Details
        </p>
        <a href="{{ route('applications.edit',$applicant->id) }}" class="card-header-icon" aria-label="more options">
          <span class="icon">
            <i class="fa fa-edit" aria-hidden="true"></i>
          </span>
        </a>
      </header>
      <div class="card-content">
        <div class="columns is-multiline">
          <div class="column is-7">

            <div class="field is-grouped">
              <p class="control">
                <label class="label">Name</label>
              </p>
              <p class="control">
                {{ $applicant->first_name .' '. $applicant->m_i .'. '. $applicant->last_name }}
              </p>
            </div>

            <div class="field is-grouped">
              <p class="control">
                <label class="label">Birth date</label>
              </p>
              <p class="control">
                {{ Carbon\Carbon::parse($applicant->bday)->format('M d, Y') }}
              </p>
            </div>

            <div class="field is-grouped">
              <p class="control">
                <label class="label">Gender</label>
              </p>
              <p class="control">
                @if ($applicant->gender == 1)
                  Male
                @else
                  Female
                @endif
              </p>
            </div>

            <div class="field is-grouped">
              <p class="control">
                <label class="label">Address</label>
              </p>
              <p class="control">
                {{ $applicant->address }}
              </p>
            </div>

            <div class="field is-grouped">
              <p class="control">
                <label class="label">Course</label>
              </p>
              <p class="control">
                {{ $applicant->course }}
              </p>
            </div>

            <div class="field is-grouped">
              <p class="control">
                <label class="label">School</label>
              </p>
              <p class="control">
                {{ $applicant->school }}
              </p>
            </div>

            <div class="field is-grouped">
              <p class="control">
                <label class="label">Department</label>
              </p>
              <p class="control">
                {{ $applicant->department->name }}
              </p>
            </div>

            <div class="field is-grouped">
              <p class="control">
                <label class="label">No of Hours</label>
              </p>
              <p class="control">
                {{ $applicant->no_hrs }}
              </p>
            </div>

          </div>

          <div class="column is-5">
            <div class="field is-grouped">
              <p class="control">
                <label class="label">Start date</label>
              </p>
              <p class="control">
                @if ($applicant->start_date == null)
                  <i class="has-text-danger">no date</i>
                @else
                  {{ Carbon\Carbon::parse($applicant->start_date)->format('M d, Y') }}
                @endif
              </p>
            </div>

            <div class="field is-grouped">
              <p class="control">
                <label class="label">End date</label>
              </p>
              <p class="control">
                @if ($applicant->endo == null)
                  <i class="has-text-danger">no date</i>
                @else
                  {{ Carbon\Carbon::parse($applicant->endo)->format('M d, Y') }}
                @endif
              </p>
            </div>

            <label class="label">Requirements</label>
            <div class="field">
              <p class="control">
                <ul>
                  <li>
                    @if ($applicant->access_pass_app == false)
                        <strike>Access Pass Application</strike>
                    @else
                        Access Pass Application
                    @endif
                  </li>
                  <li>
                    @if ($applicant->school_endorsement == false)
                        <strike>Endorsement from School</strike>
                    @else
                        Endorsement from School
                    @endif
                  </li>
                  <li>
                    @if ($applicant->brgy_police == false)
                        <strike>Barangay/Police Clearance</strike>
                    @else
                        Barangay/Police Clearance
                    @endif
                  </li>
                  <li>
                    @if ($applicant->dole == false)
                        <strike>DOLE</strike>
                    @else
                        DOLE
                    @endif
                  </li>
                  <li>
                    @if ($applicant->cv == false)
                        <strike>Resume</strike>
                    @else
                        Resume
                    @endif
                  </li>
                  <li>
                    @if ($applicant->pic2x2 == false)
                        <strike>2x2 Picture</strike>
                    @else
                        2x2 Picture
                    @endif
                  </li>
                  <li>
                    @if ($applicant->start_date )
                      <a href="#" class="button">Deploy</a>
                    @else
                      <i class="has-text-danger">Unable to deploy</i>
                    @endif
                  </li>
                </ul>
              </p>
            </div>
          </div> <!-- col-6 -->
        </div> <!-- columns -->
      </div> <!-- card-content -->
    </div> <!-- card -->
  </div> <!-- section -->
@endsection

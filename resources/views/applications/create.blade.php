@extends('layouts.app')

@section('content')
  <div class="section">
    <nav class="breadcrumb">
      <ul>
        <li><a href="{{ route('applications.index') }}" aria-current="page">Applications</a></li>
        <li class="is-active"><a class="">Create</a></li>
      </ul>
    </nav>
    <div class="card">
      <header class="card-header">
        <p class="card-header-title">
          ADD
        </p>
      </header>
      <div class="card-content">

        <form class="" action="{{ route('applications.store') }}" method="post">
          {{ csrf_field() }}
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Name</label>
            </div>
            <div class="field-body">
              <div class="field is-grouped">
                <p class="control is-expanded has-icons-left">
                  <input class="input {{ $errors->has('first_name') ? 'is-danger' : '' }}" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                  <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                  </span>
                </p>
                <p class="control is-expanded has-icons-left">
                  <input class="input {{ $errors->has('last_name') ? 'is-danger' : '' }}" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                  <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                  </span>
                </p>
                <p class="control is-expanded has-icons-left">
                  <input class="input {{ $errors->has('m_i') ? 'is-danger' : '' }}" type="text" name="m_i" value="{{ old('m_i') }}" placeholder="M.I">
                  <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                  </span>
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Birth date</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <p class="control is-expanded has-icons-left">
                  <input class="input {{ $errors->has('bday') ? 'is-danger' : '' }}" type="date" name="bday" value="{{ old('bday') }}">
                  <span class="icon is-small is-left">
                    <i class="fa fa-hourglass-start"></i>
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
                  <label class="radio is-danger">
                    <input type="radio" name="gender" value="1">
                    Male
                  </label>
                  <label class="radio">
                    <input type="radio" name="gender" value="0">
                    Female
                  </label>
                </div>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Address</label>
            </div>
            <div class="field-body">
              <div class="field is-normal">
                <p class="control is-expanded has-icons-left">
                  <input class="input {{ $errors->has('address') ? 'is-danger' : '' }}" type="text" name="address" value="{{ old('address') }}" placeholder="">
                  <span class="icon is-small is-left">
                    <i class="fa fa-map-marker"></i>
                  </span>
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Course</label>
            </div>
            <div class="field-body">
              <div class="field is-normal">
                <p class="control is-expanded has-icons-left">
                  <input class="input {{ $errors->has('course') ? 'is-danger' : '' }}" type="text" name="course" value="{{ old('course') }}" placeholder="">
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
                  <input class="input {{ $errors->has('school') ? 'is-danger' : '' }}" type="text" name="school" value="{{ old('school') }}" placeholder="">
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
                <div class="control has-icons-left">
                  <div class="select {{ $errors->has('department_id') ? 'is-danger' : ''  }}">
                    <select name="department_id">
                      <option selected disabled>Select Department</option>
                      @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="icon is-small is-left">
                    <i class="fa fa-briefcase"></i>
                  </div>
                </div>
              </div>
              {{-- @if ($errors->has('department_id'))
                <p class="help is-danger">
                  {{ $errors->first('department_id') }}
                </p>
              @endif --}}
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">No of Hours</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <p class="control is-expanded has-icons-left">
                  <input class="input {{ $errors->has('no_hrs') ? 'is-danger' : '' }}" type="text" v-model="no_hrs" name="no_hrs" value="{{ old('no_hrs') }}" placeholder="hours" style="width:215px;">
                  <span class="icon is-small is-left">
                    <i class="fa fa-hourglass"></i>
                  </span>
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Start date</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <p class="control is-expanded has-icons-left">
                  <input class="input {{ $errors->has('start_date') ? 'is-danger' : '' }}" type="date" v-model="start_date" name="start_date" value="{{ old('start_date') }}">
                  <span class="icon is-small is-left">
                    <i class="fa fa-hourglass-start"></i>
                  </span>
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">End date</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <p class="control is-expanded has-icons-left">
                  <textarea id="endo" name="endo" class="textarea is-small" :value="endo" rows="1" style="width:215px;"></textarea>
                  <span class="icon is-small is-left">
                    <i class="fa fa-hourglass-end"></i>
                  </span>
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label">
              <label class="label">Requirements </label>
            </div>
            <div class="field-body">
              <div class="field is-grouped is-grouped-multiline">
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="access_pass_app">
                    Access Pass Application
                  </label>
                </div>
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="school_endorsement">
                    Endorsement from School
                  </label>
                </div>
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="brgy_police">
                    Barangay/Police Clearance
                  </label>
                </div>
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="dole">
                    DOLE
                  </label>
                </div>
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="cv">
                    Resume
                  </label>
                </div>
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="pic2x2">
                    2x2 Picture
                  </label>
                </div>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label">
              {{-- <label class="label">Requirements </label> --}}
            </div>
            <div class="field-body">
              <div class="field">
                <button type="submit" class="button is-primary">Save</button>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js"></script>

  <script type="text/javascript">

    var app = new Vue({
      el: '#app',
      data: {
        no_hrs: '',
        start_date: '',
        days: ''
      },
      computed: {
        endo: function () {
          // no of hours / 8hrs then + 14days
          this.days = (this.no_hrs / 8) + 14
          return moment(this.start_date).add(this.days, 'days').calendar()
        }
      }

    });
  </script>
@endsection

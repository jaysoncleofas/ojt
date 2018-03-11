@extends('layouts.app')

@section('content')
  <div class="section">
    <nav class="breadcrumb">
      <ul>
        <li><a href="{{ route('applications.index') }}">Applications</a></li>
        <li><a href="{{ route('applications.create') }}">Create</a></li>
        <li class="is-active"><a class="">Edit</a></li>
      </ul>
    </nav>
    <div class="card">
      <header class="card-header">
        <p class="card-header-title">
          Edit
        </p>
      </header>
      <div class="card-content">

        <form class="" action="{{ route('applications.update', $applicant->id) }}" method="post">
          {{ method_field('put') }}
          {{ csrf_field() }}
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Name</label>
            </div>
            <div class="field-body">
              <div class="field is-grouped">
                <p class="control is-expanded has-icons-left">
                  <input class="input" type="text" placeholder="First Name" name="first_name" value="{{ $applicant->first_name }}">
                  <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                  </span>
                </p>
                <p class="control is-expanded has-icons-left">
                  <input class="input" type="text" placeholder="Last Name" name="last_name" value="{{ $applicant->last_name }}">
                  <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                  </span>
                </p>
                <p class="control is-expanded has-icons-left">
                  <input class="input" type="text" placeholder="M.I" name="m_i" value="{{ $applicant->m_i }}">
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
                  <input class="input" type="date" placeholder="deploy" name="bday" value="{{ $applicant->bday }}">
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
                  <label class="radio">
                    <input type="radio" name="gender" value="1" {{ ($applicant->gender == 1) ? 'checked' : ''}}>
                    Male
                  </label>
                  <label class="radio">
                    <input type="radio" name="gender" value="0" {{ ($applicant->gender == 0) ? 'checked' : ''}}>
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
                  <input class="input" type="text" placeholder="" name="address" value="{{ $applicant->address }}">
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
                  <input class="input" type="text" placeholder="" name="course" value="{{ $applicant->course }}">
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
                  <input class="input" type="text" placeholder="" name="school" value="{{ $applicant->school }}">
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
                      <option selected :value="oldDept">{{ $applicant->department->name }}</option>
                      @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{(old('department_id')==$department->id)? 'selected':''}}>{{ $department->name }}</option>
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
                  <input class="input" type="text" name="no_hrs" placeholder="" v-model="no_hrs" value="{{ $applicant->no_hrs }}" style="width:215px;">
                  <span class="icon is-small is-left">
                    <i class="fa fa-hourglass"></i>
                  </span>
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Update Start date</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <p class="control is-expanded has-icons-left">
                  <input type="date" class="input {{ $errors->has('start_date') ? 'is-danger' : '' }}" v-model="form.mydate" name="start_date">
                  <span class="icon is-small is-left">
                    <i class="fa fa-hourglass-start"></i>
                  </span>
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Current Start date</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <p class="control is-expanded has-icons-left">
                  <input type="date" class="input" value="{{ $applicant->start_date }}" disabled>
                  <span class="icon is-small is-left">
                    <i class="fa fa-hourglass-end"></i>
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
                  <textarea id="endo" name="endo" class="textarea is-small" :value="endo" rows="1" style="width:215px;" readonly></textarea>
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
                    <input type="checkbox" name="access_pass_app" {{ $applicant->access_pass_app ? 'checked' : ''}}>
                    Access Pass Application
                  </label>
                </div>
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="school_endorsement" {{ $applicant->school_endorsement ? 'checked' : ''}}>
                    Endorsement from School
                  </label>
                </div>
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="brgy_police" {{ $applicant->brgy_police ? 'checked' : ''}}>
                    Barangay/Police Clearance
                  </label>
                </div>
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="dole" {{ $applicant->dole ? 'checked' : ''}}>
                    DOLE
                  </label>
                </div>
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="cv" {{ $applicant->cv ? 'checked' : ''}}>
                    Resume
                  </label>
                </div>
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="pic2x2" {{ $applicant->pic2x2 ? 'checked' : ''}}>
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
                <button type="submit" class="button is-primary">Update</button>
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
  var vueData = {}
  vueData.mydate = moment({!! $applicant->start_date !!}).format('YYYY-MM-DD HH:mm:ss');

    var app = new Vue({
      el: '#app',
      data: {
        form: vueData,
        no_hrs: {!! $applicant->no_hrs !!},
        start_date: new Date('{!! $applicant->start_date !!}'),
        days: '',
        oldDept: {!! $applicant->department_id !!}
      },
      computed: {
        endo: function () {
          // no of hours / 8hrs then + 14days
          this.days = (this.no_hrs / 8) + 14
          return moment(this.start_date).add(this.days, 'days').calendar()
        }
      },
      method: {
        getDate(value) {
          this.start_date = moment(value + ":07", moment.ISO_8601).format("x");
        }
      }

    });
  </script>
@endsection

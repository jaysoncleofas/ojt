<form class="" action="{{ route('applications.destroy', $applicant->id) }}" method="post">
   {{ csrf_field() }}{{ method_field('DELETE') }}
   <a href="{{ route('applications.edit', $applicant->id) }}" title="Edit" class="button is-primary is-small"><i class="fa fa-edit"></i></a>
   <button class="button is-small is-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')" title="Delete">
      <i class="fa fa-trash"></i>
   </button>
</form>

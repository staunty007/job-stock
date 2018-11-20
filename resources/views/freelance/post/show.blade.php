@extends('freelance.layouts.app')
@section('headsection')
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <div class="card">
            <div class="card-header">
             <div class="row">
                <div class="col-md-8">
                  <h3 class="card-title">View Jobs</h3>
                </div>
                <div class="col-md-4">
                  <a href="{{ route('post.create') }}" class="btn btn-success pull-right">Post New Article</a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Status</th>
                      <th>Edit</th>
                      <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->slug }}</td>
                      <td>
                        @if ($post->status == 0)
                          <i>Not Published</i>
                        @else
                          <i>Published</i>
                        @endif
                      </td>
                      <td>
                            <a href="{{ route('post.edit',$post->id) }}" class="btn btn-primary btn-block">Edit</a>
                      </td>
                      <td>
                            <form id="delete-form-{{$post->id}}" method="post" action="{{ route('post.destroy',$post->id) }}" style="display: none;">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        </form>
                        <a href="" onclick="
                          if(confirm('Are you sure, You want to delete ??'))
                            {
                              event.preventDefault();
                              document.getElementById('delete-form-{{$post->id}}').submit();
                            }
                          else
                            {
                              event.preventDefault();
                            }" class="btn btn-danger btn-block">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Status</th>
                      <th>Edit</th>
                      <th>Delete</th>
                </tr>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('footersection')
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection
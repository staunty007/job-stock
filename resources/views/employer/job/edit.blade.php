@extends('employer.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/select2.min.css')}}">
<script src="//cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>
@endsection

@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Post Job</h3>
              </div>
              @include('includes.messages')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('job.update', $job->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="card-body">
					       <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="subtitle">Job Title</label>
                          <input type="text" class="form-control" name="job_title" id="title" placeholder="Title" value="{{ $job->job_title }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="subtitle">Job Location</label>
                          <input type="text" class="form-control" name="job_location" id="location" placeholder="Location" value="{{ $job->job_location }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Education Level</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Qualification"
                                style="width: 100%;" name="education_level">
                           <option value="O Level">O Level</option>
                           <option value="National Diploma (ND)">National Diploma (ND)</option>
                           <option value="Higher National Diploma (HND)">Higher National Diploma (HND)</option>
                           <option value="Bachelor Degree">Bachelor Degree</option>
                           <option value="Masters">Masters</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="subtitle">Job Salary</label>
                        <input type="number" class="form-control" name="job_salary" id="salary" placeholder="Salary Amount" value="{{ $job->job_salary }}">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Job Schedule</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Schedule"
                                style="width: 100%;" name="schedule">
                           <option value="Full Time">Full Time</option>
                           <option value="Part Time">Part Time</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group" style="margin-top: 14px;">
                        <label>Select Categories</label>
                          <select class="form-control select2" multiple="multiple"data-placeholder="Select a State"style="width: 100%;" name="cats[]"> @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}"
                          @foreach ($job->categories as $jobCat)
                            @if ($jobCat->id == $cat->id)
                            selected
                            @endif
                          @endforeach
                          >{{ $cat->name }}</option>
                        @endforeach
                  </select>
                </div>
                    </div>
                    <div class="col-md-2">
                       <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="negotiable" value="1" @if ($job->negotiable == 1) checked @endif value="1">
                        <label class="form-check-label"><b>Negotiable</b></label>
                      </div>
                    </div>
                  <div class="col-md-12">
                    <div class="card-body pad">
                      <div class="mb-3">
                        <label for="">Job Description</label>
                        <textarea class="ckeditor" placeholder="Place some text here" name="job_description" 
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $job->job_description }}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="status" value="1" @if ($job->status == 1) checked @endif value="1">
                      <label class="form-check-label"><b>Publish</b></label>
                    </div>
                  </div>
                 </div>
                 

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('job.index') }}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->


        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
@section('footersection')
<script src="{{asset('admin/plugins/select2/select2.full.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
@endsection
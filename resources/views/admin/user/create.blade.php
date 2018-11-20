@extends('admin.layouts.app')

@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Text Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Text Editors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

          <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @include('includes.messages')
              <form role="form" action="{{ route('user.store') }}" method="POST">
                  {{ csrf_field() }}
                <div class="card-body">
          <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">User Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="username" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="phone">Phone No</label>
                          <input type="phone" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ old('phone') }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="email">Status</label>
                          <div class="checkbox">
                          <label for=""><input type="checkbox" value="1" name="status"
                            @if (old('status') == 1)
                              checked
                            @endif>  Status</label>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
                    </div>

                    <div class="form-group">
                      <label for="confirm_password">Confirm Password</label>
                      <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                      <label>Assign Roles</label>
                      <div class="row">
                      @foreach ($roles as $role)
                          <div class="col-lg-4">
                            <div class="checkbox">
                            <label><input type="checkbox" name="role[]" value="{{ $role->id }}"> {{ $role->name }}</label>
                            </div>
                          </div>
                      @endforeach
                      

                      </div>
                      
                    </div>

                  </div>

              </div> <!-- /.row -->

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
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
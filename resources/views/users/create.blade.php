@extends('layouts.dashboard')
@section('title', 'Tambah Akun')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Akun</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label for="id_role" class="form-label">ID Role</label>
                            <select class="form-select" id="id_role" name="id_role" required>
                                <option value="" active>Select one</option>
                                <option value="1">Admin</option>
                                <option value="2">Siswa</option>
                                <option value="3">Guru</option>

                            </select>
                        </div>
                        <div class="mb-3" id="emailAndPassword">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">

                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>



                        <div class="mb-3">
                            <label for="id_cl" class="form-label">ID Class Level</label>
                            <select class="form-select" id="id_cl" name="id_cl" required>
                                @foreach($classLevels as $classLevel)
                                <option value="{{ $classLevel->cl_id }}">{{ $classLevel->cl_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="acc_class" class="form-label">Account Class</label>
                            <input type="text" class="form-control" id="acc_class" name="acc_class" required>
                        </div>
                        <div class="mb-3">
                            <label for="acc_gender" class="form-label">Gender</label>
                            <select class="form-select" id="acc_gender" name="acc_gender" required>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
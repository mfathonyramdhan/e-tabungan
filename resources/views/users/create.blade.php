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
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" autofocus required placeholder="Masukkan nama ...">
                        </div>
                        <div class="mb-3">
                            <label for="id_role" class="form-label">Role</label>
                            <select class="form-select" id="id_role" name="id_role" required>
                                <option selected disabled>Pilih Role Akun</option>
                                <option value="1">Admin</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Siswa</option>

                            </select>
                        </div>
                        <div class="mb-3" id="emailAndPassword">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_input" name="email_input" autocomplete="off" placeholder="Masukkan email...">

                            <div class="mt-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password_input" name="password_input" autocomplete="off" placeholder="Masukkan password...">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col" id="satdik">
                                <label for="id_cl" class="form-label">Satuan Pendidikan</label>
                                <select class="form-select" id="id_cl" name="id_cl">
                                    <option selected disabled>Pilih Satuan Pendidikan</option>

                                    @foreach($classLevels as $classLevel)
                                    <option value="{{ $classLevel->cl_id }}">{{ $classLevel->cl_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col" id="kelas">
                                <label for="acc_class" class="form-label">Kelas</label>
                                <select class="form-select" id="acc_class" name="acc_class">
                                </select>
                            </div>

                        </div>


                        <div class="mb-3" id="nis">
                            <label for="acc_nis" class="form-label">NIS</label>
                            <input type="number" class="form-control" id="acc_nis" name="acc_nis" placeholder="Masukkan Nomor Induk Siswa ...">
                        </div>
                        <div class="row mb-3">


                            <div class="col">
                                <label for="acc_gender" class="form-label">Gender</label>
                                <select class="form-select" id="acc_gender" name="acc_gender" required>
                                    <option selected disabled>Pilih Jenis Kelamin</option>

                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="col" id="ta">
                                <label for="ta" class="form-label">Tahun Ajaran</label>
                                <select class="form-select" id="ta" name="ta" required>
                                    <option selected disabled>Pilih Tahun Ajaran</option>
                                    <option value="2022/2023">2022/2023</option>
                                    <option value="2023/2024">2023/2024</option>
                                    <option value="2024/2025">2024/2025</option>
                                    <option value="2025/2026">2025/2026</option>
                                    <option value="2026/2027">2026/2027</option>
                                </select>
                            </div>

                            <div class="col" id="status">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option selected value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>

                        </div>

                        <div class="mb-3" id="acc_parents">
                            <label for="acc_parents" class="form-label">Nama Wali Murid</label>
                            <input type="text" class="form-control" id="acc_parents" name="acc_parents" autofocus required placeholder="Masukkan nama wali murid...">
                        </div>

                        <div class="mb-3">
                            <label for="acc_address" class="form-label">Alamat</label>
                            <input type="textarea" class="form-control" id="acc_address" name="acc_address" autofocus required placeholder="Masukkan alamat...">
                        </div>

                        <div class="mb-3">
                            <label for="acc_phone" class="form-label">No HP</label>
                            <input type="text" class="form-control" id="acc_phone" name="acc_phone" autofocus required placeholder="Masukkan no. HP...">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
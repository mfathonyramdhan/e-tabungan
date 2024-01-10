@extends('layouts.dashboard')
@section('title', 'Data Akun')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Siswa</h4>
                    <a href="{{ route('users.export') }}">
                        <button type="button" class="btn btn-primary mb-2"> <i class="fa fa-file-export"></i> &nbsp; Export Excel</button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>

                                    <th>Satdik</th>
                                    <th>Kelas</th>
                                    <th>Jenis Kelamin</th>

                                    <th>NIS</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Wali Siswa</th>
                                    <th>Status</th>
                                    <th>No. HP</th>
                                    <th>Alamat</th>
                                    @if(Auth::user()->id_role == 1)
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name ?? '-' }}</td>

                                    <td>{{ $user->cl_name ?? '-' }}</td>
                                    <td>{{ $user->acc_class ?? '-' }}</td>
                                    <td>{{ $user->acc_gender ?? '-' }}</td>

                                    <td>{{ $user->nis ?? '-' }}</td>

                                    <td>{{ $user->ta ?? '-' }}</td>

                                    <td>{{ $user->acc_parents ?? '-' }}</td>

                                    <td>{{ $user->status ?? '-' }}</td>

                                    <td>{{ $user->acc_phone ?? '-' }}</td>

                                    <td>{{ $user->acc_address ?? '-' }}</td>


                                    @if(Auth::user()->id_role == 1)

                                    <td>
                                        <div class="d-flex">
                                            <!-- Add the edit and delete links here -->
                                            <!-- <a href="#" class="btn btn-primary shadow sharp me-1" style="padding-left: 10px; padding-right: 10px;">
                                                <i class="fas fa-pencil-alt"></i> &nbsp;Edit
                                            </a> -->
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Menghapus data akun ini juga akan menghapus data transaksi yang dimiliki akun ini. Apakah anda yakin ?')">
                                                @csrf
                                                @method('DELETE') <!-- Add the method spoofing for DELETE request -->
                                                <button type="submit" class="btn btn-danger shadow sharp" style="padding-left: 10px; padding-right: 10px;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>@endif
                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>

                                    <th>Satdik</th>
                                    <th>Kelas</th>
                                    <th>Jenis Kelamin</th>

                                    <th>NIS</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Wali Siswa</th>
                                    <th>Status</th>
                                    <th>No. HP</th>
                                    <th>Alamat</th>
                                    @if(Auth::user()->id_role == 1)
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
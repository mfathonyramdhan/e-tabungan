@extends('layouts.dashboard')
@section('title', 'Histori Transaksi')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-end mb-3">

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Histori Transaksi</h4>
                    <a href="{{ route('transactions.print') }}" class="btn btn-primary" target="_blank">
                        <i class="fa fa-print"></i> Print Semua HIstori Transaksi
                    </a>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Trans.</th>

                                    <th>Nama</th>
                                    <th>Satdik & Kelas</th>
                                    <th>Tabungan</th>
                                    <th>Penarikan</th>
                                    <th>Waktu Transaksi</th>
                                    <!-- <th>Diupdate Pada</th> -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $key => $transaction)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $transaction->tr_id  ?? '-' }}</td>

                                    <td>{{ $transaction->acc_name  ?? '-' }}</td>
                                    <td>{{ $transaction->cl_name ? $transaction->cl_name . ' Kelas ' . $transaction->acc_class : '-' }}</td>

                                    <td>{{ $transaction->tr_debt !== null ? 'Rp ' . number_format($transaction->tr_debt, 0, ',', '.') : '-' }}</td>
                                    <td>{{ $transaction->tr_credit !== null ? 'Rp ' . number_format($transaction->tr_credit, 0, ',', '.') : '-' }}</td>


                                    <td>
                                        {{ $transaction->datecreated ? \Carbon\Carbon::parse($transaction->datecreated)->translatedFormat('l, d F Y, H:i') : '-' }}
                                    </td>
                                    <!-- <td>
                                        {{ $transaction->datemodified ? \Carbon\Carbon::parse($transaction->datemodified)->translatedFormat('l, d F Y, H:i') : '-' }}
                                    </td> -->

                                    <td>
                                        <div class="d-flex">
                                            <!-- Add the edit and delete links here -->
                                            <!-- <a href="#" class="btn btn-primary shadow sharp me-1" style="padding-left: 10px; padding-right: 10px;">
                                                <i class="fas fa-pencil-alt"></i> &nbsp;Edit
                                            </a> -->
                                            <a href="{{ route('transactions.printTransaction', ['transaction' => $transaction]) }}" class="btn btn-primary shadow sharp me-1" style="padding-left: 10px; padding-right: 10px;" target="_blank">
                                                <i class="fas fa-print"></i>
                                            </a>

                                            <form action="{{ route('transactions.destroy', ['transaction' => $transaction]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this transaction?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger shadow sharp" style="padding-left: 10px; padding-right: 10px;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>ID Trans.</th>

                                    <th>Nama</th>
                                    <th>Satdik & Kelas</th>
                                    <th>Tabungan</th>
                                    <th>Penarikan</th>
                                    <th>Waktu Transaksi</th>
                                    <!-- <th>Diupdate Pada</th> -->
                                    <th>Aksi</th>
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
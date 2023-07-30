@extends('layouts.dashboard')
@section('title', 'Tambah Transaksi')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Transaksi</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id_acc" class="form-label">Akun</label>
                            <select class="form-select" id="id_acc" name="id_acc" required>
                                <option selected disabled>Pilih Akun</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="qqq" class="form-label">Jenis Transaksi</label>
                            <select class="form-select" id="qqq" name="qqq">
                                <option selected disabled>Pilih Jenis Transaksi</option>
                                <option value="1">Tabungan</option>
                                <option value="2">Pengambilan</option>
                            </select>
                        </div>

                        <div id="tabunganFields">
                            <div class="mb-3">
                                <label for="tr_debt" class="form-label">Tabungan</label>
                                <input type="number" class="form-control" id="tr_debt" name="tr_debt" maxlength="20" placeholder="Masukkan Nominal Tabungan">
                            </div>
                        </div>

                        <div id="pengambilanFields">
                            <div class="mb-3">
                                <label for="tr_credit" class="form-label">Penarikan</label>
                                <input type="number" class="form-control" id="tr_credit" name="tr_credit" maxlength="20" placeholder="Masukkan Nominal Penarikan">
                            </div>
                        </div>




                        <!-- Add other form fields here -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Function to show/hide fields based on the selected option
        function toggleFields(selectedOption) {
            if (selectedOption === "1") { // Tabungan
                $("#tabunganFields").show();
                $("#pengambilanFields").hide();
                // Clear the value of Pengambilan input field
                $("#tr_credit").val("");
            } else if (selectedOption === "2") { // Pengambilan
                $("#tabunganFields").hide();
                $("#pengambilanFields").show();
                // Clear the value of Tabungan input field
                $("#tr_debt").val("");
            } else { // No option selected or other options
                $("#tabunganFields").hide();
                $("#pengambilanFields").hide();
                // Clear the values of both input fields
                $("#tr_debt").val("");
                $("#tr_credit").val("");
            }
        }

        // Event handler for the dropdown
        $("#qqq").on("change", function() {
            const selectedOption = $(this).val();
            toggleFields(selectedOption);
        });

        // Call the toggleFields function initially to set the initial state
        const selectedOption = $("#qqq").val();
        toggleFields(selectedOption);
    });
</script>


@endsection
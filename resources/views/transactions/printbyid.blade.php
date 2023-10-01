<?php

use Illuminate\Support\Facades\DB;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- PAGE TITLE HERE -->
    <title>{{ config('app.name') }} | Print Transaksi</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.description,
        th.description {
            width: 75px;
            max-width: 75px;
        }

        td.quantity,
        th.quantity {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 155px;
            max-width: 155px;
        }

        img {
            width: 50px;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="ticket">
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
        <p class="centered">
            <strong>E-Tabungan</strong>
            <br>
            <strong>Pendidikan Integral</strong>
            <br>
            <strong>Hidayatullah</strong>
            <br>
            <br>

            @if ($transaction->tr_debt === null)
            <strong>BUKTI PENARIKAN</strong>
            @elseif ($transaction->tr_credit === null)
            <strong>BUKTI TABUNGAN</strong>
            @else
            <strong>UNKNOWN ERROR</strong>
            @endif
            <br>ID Trans. : {{ $transaction->tr_id }}
            <br>

            <?php
            $acc_name = DB::table('transactions')
                ->join('users', 'transactions.id_acc', '=', 'users.id')
                ->where('transactions.id_acc', $transaction->id_acc)
                ->value('users.name');
            ?>
            {{ $acc_name }}

            <hr>
            <hr>
        </p>
        @php
        $lastTransaction = DB::table('transactions')
        ->where('id_acc', $transaction->id_acc)
        ->where('created_at', '<', $transaction->created_at)
            ->orderBy('created_at', 'desc')
            ->first();

            $lastAmount = $lastTransaction ? ($lastTransaction->tr_debt ?? 0) - ($lastTransaction->tr_credit ?? 0) : 0;
            @endphp

            <p class="centered">Saldo {{ $lastTransaction ? 'Terakhir' : 'Awal' }} {!! $lastTransaction ? "<br> (".\Carbon\Carbon::parse($lastTransaction->created_at)->translatedFormat('l, d F Y, H:i').")" : "" !!} : <br> Rp {{ number_format($lastAmount, 0, ',', '.') }}</p>
            <hr>

            <hr>


            <p class="centered">
                {{ $transaction->created_at ? \Carbon\Carbon::parse($transaction->created_at)->translatedFormat('l, d F Y, H:i') : '-' }}
                <br>
                @if ($transaction->tr_credit === null)
                Menabung sebesar : <br> Rp {{ number_format($transaction->tr_debt, 0, ',', '.') }}
                @else
                Menarik sebesar : <br> Rp {{ number_format($transaction->tr_credit, 0, ',', '.') }}
                @endif
            </p>
            <hr>
            @php
            $currentAmount = $lastAmount;
            if ($transaction->tr_credit === null) {
            $currentAmount += $transaction->tr_debt ?? 0;
            } elseif ($transaction->tr_debt === null) {
            $currentAmount -= $transaction->tr_credit ?? 0;
            }
            @endphp

            <p class="centered">Saldo setelah @if ($transaction->tr_credit === null) menabung
                @else penarikan
                @endif : <br> Rp {{ number_format($currentAmount, 0, ',', '.') }}</p>
            <hr>
    </div>
</body>

</html>

<script>
    // Trigger the print dialog when the page is loaded
    window.onload = function() {
        window.print();
    };
</script>
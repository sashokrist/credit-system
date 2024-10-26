@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="mb-4">Списък с кредити</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Код</th>
                <th scope="col">Име на кредитополучателя</th>
                <th scope="col">Сума (лв)</th>
                <th scope="col">Срок (месеци)</th>
                <th scope="col">Месечна вноска (лв)</th>
                <th scope="col">Остатъчна сума (лв)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($credits as $credit)
                <tr class="{{ $credit->remaining_balance == 0 ? 'table-danger text-muted blur-text' : 'table-success' }}">
                    <td>{{ $credit->credit_id }}</td>
                    <td>{{ $credit->borrower_name }}</td>
                    <td>{{ number_format($credit->amount, 2) }}</td>
                    <td>{{ $credit->term_months }}</td>
                    <td>{{ number_format($credit->monthly_payment, 2) }}</td>
                    <td class="{{ $credit->remaining_balance > 0 ? 'bold-red' : '' }}">
                        {{ number_format($credit->remaining_balance, 2) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Пагинация -->
        <div class="d-flex justify-content-center">
            {{ $credits->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <style>
        .blur-text {
            filter: blur(1px);
        }
        .bold-red {
            font-weight: bold;
            color: red;
        }
    </style>
@endsection

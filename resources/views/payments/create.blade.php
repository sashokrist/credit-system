@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Ново плащане</h1>

        <!-- Показване на съобщения за грешки -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('payments.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="credit_id">Кредит:</label>
                <select class="form-control" name="credit_id" id="credit_id" required>
                    @foreach($credits as $credit)
                        <option value="{{ $credit->id }}">
                            {{ $credit->borrower_name }} - Остатъчна сума: {{ number_format($credit->remaining_balance, 2) }} лв - Месечна вноска: {{ number_format($credit->monthly_payment, 2) }} лв
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Сума (лв):</label>
                <input type="number" class="form-control" name="amount" id="amount" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Извърши плащане</button>
        </form>
    </div>
@endsection

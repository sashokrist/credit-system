@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Създаване на нов кредит</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('credits.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="borrower_name">Име на кредитополучателя:</label>
                <input type="text" class="form-control" name="borrower_name" id="borrower_name" value="{{ auth()->user()->name }}" readonly>
            </div>

            <div class="form-group">
                <label for="amount">Сума (лв):</label>
                <input type="number" class="form-control" name="amount" id="amount" step="0.01" min="1" max="80000" required>
            </div>

            <div class="form-group">
                <label for="term_months">Срок (месеци):</label>
                <input type="number" class="form-control" name="term_months" id="term_months" min="3" max="120" required>
            </div>

            <button type="submit" class="btn btn-primary">Създай кредит</button>
        </form>
    </div>
@endsection

@extends('layouts.template')

@section('title', 'Transaksi')

@section('content')
    @if ($featured)
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="row mb-2">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 fst-italic">{{ $featured->type }}</h1>
                    <p class="lead my-3">{{ $featured->notes }}</p>
                    <p class="lead my-3">Rp. {{ number_format($featured->amount) }}</p>
                    <p class="lead my-3">Category:<br>{{ $featured->category }}</p>
                    <p class="lead mb-0">
                        <a href="{{ route('transactions.show', $featured) }}" class="text-white fw-bold">
                            More details...
                        </a>
                    </p>
                </div>
            </div>
        </div>
    @endif

    <div class="row mb-2">
        @forelse ($transaction as $transactions)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">{{ $transactions->type }}</strong>
                        <h3 class="mb-0">{{ $transactions->notes }}</h3>
                        <div class="mb-1 text-muted">Rp. {{ number_format($transactions->amount) }}</div>
                        <p class="card-text mb-auto">{{ $transactions->category }}</p>
                        <a href="{{ route('transactions.show', $transaction) }}" class="stretched-link">See details...</a>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-md-12">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h2 class="card-text mb-auto">No transactions found.</h2>
                    </div>
                </div>
            </div>
        @endforelse

        {{ $transaction->links() }}
    </div>
@endsection

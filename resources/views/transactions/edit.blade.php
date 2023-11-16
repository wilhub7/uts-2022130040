@extends('layouts.template')

@section('title', 'Update Transaction')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Edit Transaction ID: {{$transaction->id}}</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('transactions.update', $transaction) }}" method="POST" name="frm" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="title" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount', $transaction->amount) }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" id="type" name="type" required>
                        <option disabled selected="selected">Select Option Here</option>
                        <option value="Income" {{ old('type', $transaction->type) === 'Income' ? 'selected' : ''}}>Income</option>
                        <option value="Expense" {{ old('type', $transaction->type) === 'Expense' ? 'selected' : ''}}>Expense</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category" class="form-control" required>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="title" class="form-label">Notes</label>
                    <input type="text" class="form-control" id="notes" name="notes" value="{{ old('notes') }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>

    <script>
        // Klasifikasi dropdown type dan kategori
        var typeDropdown = document.getElementById('type');
        var categoryDropdown = document.getElementById('category');

        // Pilihan untuk dropdown kategori
        var categoryOptions = {
            Income: ['Uncategorized', 'Wage', 'Bonus', 'Gift'],
            Expense: ['Uncategorized', 'Food & Drinks', 'Shopping', 'Charity', 'Housing', 'Insurance', 'Taxes', 'Transportation']
        };

        // Event listener untuk update kategori sesuai type
        typeDropdown.addEventListener('change', function() {
            categoryDropdown.innerHTML = '';

            // Membuat opsi baru sesuai dengan type
            var selectedType = typeDropdown.value;
            categoryOptions[selectedType].forEach(function(category) {
                addCategoryOption(category);
            });
        });

        // Fungsi untuk menambah opsi kedalam kategori
        function addCategoryOption(value) {
            var option = document.createElement('option');
            option.value = value;
            option.textContent = value;
            categoryDropdown.appendChild(option);
        }
        </script>
@endsection

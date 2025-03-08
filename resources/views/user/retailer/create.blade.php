<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retailer Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            max-width: 500px;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: linear-gradient(45deg, #007bff, #6610f2);
            color: white;
            text-align: center;
            font-size: 18px;
            border-radius: 10px 10px 0 0;
        }

        .form-select,
        .btn {
            border-radius: 5px;
        }

        .btn-primary {
            background: linear-gradient(45deg, #007bff, #6610f2);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #0056b3, #4e0bb4);
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Select District</h3>
        </div>
        <div class="card-body">
            <!-- Form to Submit District Selection -->
            <form action="{{ route('retailer-create') }}" method="GET">
                <div class="mb-3">
                    <label for="district-dropdown" class="form-label">Select District</label>
                    <select class="form-select" id="district-dropdown" name="district" required onchange="this.form.submit()">
                        <option value="">-- Select District --</option>
                        @foreach($districts as $district)
                        <option value="{{ $district }}" {{ isset($selectedDistrict) && $selectedDistrict == $district ? 'selected' : '' }}>
                            {{ $district }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </form>

            <!-- Distributor List (Shown Only If District Is Selected) -->
            @if(isset($distributors) && count($distributors) > 0)
            <div class="mt-4">
                <label for="distributor-dropdown" class="form-label">Available Distributors are</label>
                <select class="form-select" id="distributor-dropdown">
                    <option value="">-- Choose Distributor --</option>
                    @foreach($distributors as $distributor)
                    <option>{{ $distributor }}</option>
                    @endforeach
                </select>
            </div>
            @endif
        </div>
    </div>
</body>







</html>
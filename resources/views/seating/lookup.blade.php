<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dianne's Birthday Party • Find Your Seat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fdf6f0, #f8e8e0);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .btn-find {
            background: #c45c26;
            border: none;
            padding: 14px;
            font-size: 1.15rem;
            border-radius: 12px;
        }
        .btn-find:hover {
            background: #a34a1e;
        }
        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-md-6 col-lg-5">
                <div class="card p-4 p-md-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold" style="color:#c45c26;">Dianne's Birthday Party</h2>
                        <p class="text-muted mb-1">At: Your Address</p>
                        <h5 class="mt-3">Find Your Seat</h5>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('seating.search') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Last Name</label>
                            <input type="text" name="last_name" class="form-control form-control-lg"
                                   value="{{ old('last_name') }}" required placeholder="e.g. Young">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Phone Number</label>
                            <input type="tel" name="phone" class="form-control form-control-lg"
                                   value="{{ old('phone') }}" required placeholder="e.g. 3479986033">
                        </div>

                        <button type="submit" class="btn btn-find text-white w-100">
                            Show My Seat
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
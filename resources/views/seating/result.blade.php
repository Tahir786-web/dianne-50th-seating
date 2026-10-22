<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Seat • Dianne's 50th</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fdf6f0, #f8e8e0);
            min-height: 100vh;
            display: flex;
            align-items: center;
            text-align: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border: none;
            border-radius: 28px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.12);
            overflow: hidden;
        }
        .flower-box {
            background: linear-gradient(to bottom, #fff9f5, #ffffff);
            padding: 40px 20px 30px;
        }
        .flower-img {
            width: 220px;
            height: 220px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            animation: float 4s ease-in-out infinite;
            border: 6px solid #fff;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-16px); }
        }
        .table-name {
            font-size: 1.7rem;
            font-weight: 700;
            color: #c45c26;
            margin-top: 22px;
        }
        .seat-info {
            font-size: 1.25rem;
            color: #666;
            margin-top: 4px;
        }
        .guest-name {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }
        .with-text {
            color: #888;
            font-size: 0.95rem;
            margin-top: 6px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-md-7 col-lg-5">
                <div class="card">
                    <div class="flower-box">

                        @php
    $flowerImage = match(true) {
        str_contains($guest->table_name, 'White Rose')     => asset('images/flowers/white-rose.jpeg'),
        str_contains($guest->table_name, 'Dahlia')         => asset('images/flowers/dahlia.jpeg'),
        str_contains($guest->table_name, 'Alstroemeria')   => asset('images/flowers/alstroemeria.jpeg'),
        str_contains($guest->table_name, 'Lisianthus')     => asset('images/flowers/lisianthus.jpeg'),
        str_contains($guest->table_name, 'Mini Calla')     => asset('images/flowers/mini-calla.jpeg'),
        str_contains($guest->table_name, 'Aster')          => asset('images/flowers/aster.jpeg'),
        str_contains($guest->table_name, 'Snapdragon')     => asset('images/flowers/snapdragon.jpeg'),
        str_contains($guest->table_name, 'Stock')          => asset('images/flowers/stock-flower.jpeg'),
        str_contains($guest->table_name, 'Cymbidium')      => asset('images/flowers/cymbidium-orchid.jpeg'),
        str_contains($guest->table_name, 'Hydrangea')      => asset('images/flowers/garden-hydrangea.jpeg'),
        str_contains($guest->table_name, 'Dais')           => asset('images/flowers/dais.jpeg'),
        default                                           => asset('images/flowers/white-rose.jpeg'),
    };
@endphp



                        <img src="{{ $flowerImage }}" alt="{{ $guest->table_name }}" class="flower-img">

                        <div class="table-name">Table, {{ $guest->table_name }}</div>
                        <div class="seat-info">Seat #{{ $guest->seat_number }}</div>
                    </div>

                    <div class="p-4 p-md-5">
                        <div class="guest-name">{{ $guest->guest_name }}</div>

                      

                        <hr class="my-4">

                        <a href="{{ route('seating.lookup') }}" class="btn btn-outline-secondary px-4">
                            Search Again
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
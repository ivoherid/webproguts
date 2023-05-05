<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo asset('css/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('css/transaction.css'); ?>">

</head>

<body>
    @include('.component/navbar')
    <section class="hero">
        <main class="jumbotron jumbotron-fluid">
            <div class="transaction">
                @foreach ($transaction as $data)
                    <div class="card" style="width: 18rem;">
                        <img src={{ asset('img/img_stock.jpg') }} alt="{{ $data->menu->name }}">
                        <div class="card-body">
                            <p class="transaction-date"><span>Transaction Date: </span> {{ $data->transactiondate }}</p>
                            <p class="transaction-menu"><span>Item Name: </span>{{ $data->menu->name }}</p>
                            <p class="transaction-price"><span>Price: </span> Rp.{{ $data->menu->price }},00</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </section>
    @include('.component/footer')
</body>
<script>
    var member = {!! json_encode($user->loyalty) !!};
    if (member == 'GOLD') {
        document.documentElement.style.setProperty('--primary', '#C6A961');

    }
</script>

</html>

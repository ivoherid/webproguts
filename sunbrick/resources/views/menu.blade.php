<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo asset('css/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('css/menu.css'); ?>">
</head>

<body>
    @include('.component/navbar')
    <section class="hero">
        <main class="content">
            <ul class="category">
                <li><a href="#" id="1">Signature</a></li>
                <li><a href="#" id="2">Espresso</a></li>
                <li><a href="#" id="3">Brewed</a></li>
                <li><a href="#" id="4">Blended Coffee</a></li>
            </ul>
            <div class="jumbotron jumbotron-fluid">
                @foreach ($menu as $data)
                    <a style="text-decoration: none;" href="#"
                        onclick="purchaseConfirmation({{ $data->name }}, {{ $data->id }}, {{ $user->id }})">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('img/img_stock.jpg') }}"
                                alt="{{ $data->name }} Image">
                            <div class="card-body">
                                <p class="card-title">{{ $data->name }}</p>
                                <p class="card-text">Rp {{ $data->price }},-</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </main>
    </section>
    @include('.component/footer')
</body>
<script>
    var member = {!! json_encode($user->loyalty) !!};
    alert(member);
    if (member == 'GOLD') {
        document.documentElement.style.setProperty('--primary', '#C6A961');

    }

    function purchaseConfirmation(coffee_name, coffee_id, user_id) {
        if (confirm('Are you sure want to buy ' + coffee_name + '?')) {
            // Jika pengguna mengklik OK, tambahkan riwayat transaksi
            addTransaction(coffee_id, user_id);
        }
    }

    function addTransaction(coffee_id, user_id) {
        $.ajax({
            url: '/user/' + user_id + '/transaction',
            method: 'POST',
            data: {
                coffee_id: coffee_id
            },
            success: function(response) {
                alert('Transaksi Sukses');
            },
            error: function() {
                alert('Terjadi kesalahan saat menambahkan transaksi.');
            }
        });
    }
</script>

</html>

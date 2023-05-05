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
                <li><button onclick="filterSelection('1')" id="1">Signature</button></li>
                <li><button onclick="filterSelection('2')" id="2">Espresso</button></li>
                <li><button onclick="filterSelection('3')" id="3">Brewed</button></li>
                <li><button onclick="filterSelection('4')" id="4">Blended Coffee</button></li>
            </ul>
            <div class="jumbotron jumbotron-fluid">
                @foreach ($menu as $data)
                    <a style="text-decoration: none;" href="#"
                        onclick="purchaseConfirmation({{ $data->name }}, {{ $data->id }}, {{ $user->id }})">
                        <div class="card {{ $data->types }}">
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
    if (member == 'GOLD') {
        document.documentElement.style.setProperty('--primary', '#C6A961');
    }

    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("card");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            HideClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) ShowClass(x[i], "show");
        }
    }

    function ShowClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    // Hide elements that are not selected
    function HideClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
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

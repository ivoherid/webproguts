<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo asset('css/main.css'); ?>">

</head>
<style>

</style>

<body>
    @include('.component/navbar')

    <section class="hero">
        <main class="content">
            <div class="jumbotron jumbotron-fluid">
                <div class="container-atas">
                    @if ($hour >= 5 && $hour < 12)
                        <h2 class="text-white">Good Morning,</h2>
                    @elseif($hour >= 12 && $hour < 18)
                        <h2 class="text-white">Good Afternoon,</h2>
                    @else
                        <h2 class="text-white">Good Evening,</h2>
                    @endif
                    <h2 class="text-white">{{ $user->name }}</h2>

                    <div class="progress">
                        <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuenow="70"
                            aria-valuemin="0" aria-valuemax="100">
                            Star Level
                        </div>
                    </div>
                    <button class="btn" id="redeem" type="submit">Redeem</button>
                </div>
                <div class="container-fluid">
                    <h3 class="text-white">Promo Hari Ini</h3>
                    <div class="row">
                        <div class="col">
                            <div class="card m-4" style="background:none;">
                                <div class="card" id="card-promo">
                                    <img src="{{ asset('img/img_stock.jpg') }}" class="card-img-top" alt="...">
                                    <div class="card-body" id="card-text">
                                        <p class="title">Black History Month</p>
                                        <p class="text-promo">Promo Black History, beli 2 tumbler gratis 1 caramel
                                            macchiatto
                                            venti</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card m-4" style="background:none;">
                                <div class="card" id="card-promo">
                                    <img src="{{ asset('img/img_stock.jpg') }}" class="card-img-top" alt="...">
                                    <div class="card-body" id="card-text">
                                        <p class="title">Bring Your own Tumbler</p>
                                        <p class="text-promo">Bawa Tumbler gratis minuman large</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
    <a type="button" href="/user/{{ $user->id }}/menu" class="button" id="order">Coffee</a>
    @include('.component/footer')
</body>

<script>
    var member = {!! json_encode($user->loyalty) !!};
    var points = {!! json_encode($user->points) !!};
    if (member == 'GOLD') {
        document.documentElement.style.setProperty('--primary', '#C6A961');

    }
    point = points.toString() + "%";
    document.getElementById("progress-bar").style.width = point;
</script>

</html>

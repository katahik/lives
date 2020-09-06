<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Lives</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet"/>
</head>
<body>
<div class="othersWrapper">
    {{-- ナビゲーションバー --}}
    @include('commons.navbar')

    <div class="container">
        {{-- エラーメッセージ --}}
        @include('commons.error_messages')

        @yield('content')
    </div>
    {{--フッター--}}
    @include('commons.footer')
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
 @yield('script')
</body>
</html>

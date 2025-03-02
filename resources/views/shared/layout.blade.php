<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")|{{ config('app.name') }}</title>

    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;
  var userId = @json(Auth::id());


  const pusher = new Pusher("6da7e21ba44ca88537cf", {
            cluster: "eu",
            encrypted: true,
            authEndpoint: "/broadcasting/auth", // This is required for private channels
            auth: {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}" // Required if using Laravel
                }
            }
        });

const channel = pusher.subscribe("private-notify."+userId);

  channel.bind('done', function(data) {
    showRealtimeNotification(data.user_name + " posted a new idea");

  });

  function showRealtimeNotification(message) {
    const notification = document.getElementById('realtime-notification');
    const messageSpan = document.getElementById('notification-message');

    messageSpan.textContent = message;
    notification.style.display = 'block';

    // Auto-hide after 6 seconds (same as animation duration)
    setTimeout(() => {
        notification.style.display = 'none';
    }, 6000);}
</script>

<body>
    @include('shared.navbar')
    <div class="container py-4">
        <div class="row">

            <div class="col-3">
                @yield('left_col')

            </div>

            <div class="col-6">
                @include("notification")
                @yield('content')


            </div>

            <div class="col-3">
                @yield('right_col')


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>

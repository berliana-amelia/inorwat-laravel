<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ secure_asset('assets/css/custom.css') }}">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#" style="display: flex; align-items: center;">
                <div>
                    <img src="https://i.ibb.co/z6Kj3hR/logo-no-background.png" alt="Logo"
                        style="max-width: 40px; max-height: 40px; margin-right: 10px;">
                </div>
                <div class="header-text"
                    style="color: #27774C; font-size: 24px; font-family: 'Lato', sans-serif; font-weight: 700; word-wrap: break-word;">
                    Inorwat
                </div>
            </a>

            <div class="mx-3" id="clock"
                style="color: #51916E; font-size: 18px; font-family: Lato; font-weight: 600; word-wrap: break-word">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item" style="display: flex; align-items: center;">
                        <a class="nav-link" href="#" style="display: flex; align-items: center;">

                            <div style="text-align: center; margin-right: 8px;">
                                <span
                                    style="color: #27774C; font-size: 18px; font-family: 'Lato', sans-serif; font-weight: 500; word-wrap: break-word;">Hello,</span>
                                <span
                                    style="color: #27774C; font-size: 18px; font-family: 'Lato', sans-serif; font-weight: 700; word-wrap: break-word; margin-left: 4px;">{{ $name }}!</span>
                                <i class="fa-solid fa-circle-user" style="color: #27774C; font-size: 22px;"></i>
                            </div>


                            <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                @csrf
                            </form>
                            <a href="#" onclick="document.getElementById('logoutForm').submit()">
                                <div style="width: 1.38888rem; height: 1.5625rem; flex-shrink: 0; margin: 0;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                        viewBox="0 0 24 25" fill="none">
                                        <path
                                            d="M21.2598 12.5L22.0747 13.0795C22.3214 12.7326 22.3214 12.2674 22.0747 11.9205L21.2598 12.5ZM12.9265 11.5C12.3742 11.5 11.9265 11.9477 11.9265 12.5C11.9265 13.0523 12.3742 13.5 12.9265 13.5L12.9265 11.5ZM18.371 18.2879L22.0747 13.0795L20.4448 11.9205L16.7411 17.1288L18.371 18.2879ZM22.0747 11.9205L18.371 6.71215L16.7411 7.8712L20.4448 13.0795L22.0747 11.9205ZM21.2598 11.5L12.9265 11.5L12.9265 13.5L21.2598 13.5L21.2598 11.5Z"
                                            fill="#27774C" />
                                        <path
                                            d="M13.8525 16.5292L13.8525 17.5136C13.8525 19.1014 13.8525 19.8953 13.3916 20.4507C12.9306 21.0062 12.1503 21.1525 10.5897 21.4451L9.84719 21.5843C6.55549 22.2015 4.90964 22.5101 3.82555 21.6104C2.74146 20.7107 2.74146 19.0362 2.74146 15.6871L2.74146 9.31289C2.74146 5.96383 2.74146 4.2893 3.82555 3.38958C4.90964 2.48986 6.55549 2.79846 9.84719 3.41566L10.5897 3.55488C12.1503 3.84749 12.9306 3.99379 13.3916 4.54924C13.8525 5.10469 13.8525 5.89858 13.8525 7.48636L13.8525 8.26461"
                                            stroke="#27774C" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </div>
                            </a>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <div class="">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 sidebar ">

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <div class="nav-link-custom mt-5 d-flex align-items-center justify-content-center">
                            <a class=" text-center text-white" href="#"
                                style="margin-right: 1rem; text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 30 30" fill="none">
                                    <path
                                        d="M6.25 15.9495C6.25 14.2523 6.25 13.4037 6.59308 12.6578C6.93615 11.9119 7.58046 11.3596 8.86906 10.2551L10.1191 9.18366C12.4482 7.18725 13.6128 6.18904 15 6.18904C16.3872 6.18904 17.5518 7.18725 19.8809 9.18366L21.1309 10.2551C22.4195 11.3596 23.0638 11.9119 23.4069 12.6578C23.75 13.4037 23.75 14.2523 23.75 15.9495V21.25C23.75 23.607 23.75 24.7855 23.0178 25.5178C22.2855 26.25 21.107 26.25 18.75 26.25H11.25C8.89298 26.25 7.71447 26.25 6.98223 25.5178C6.25 24.7855 6.25 23.607 6.25 21.25V15.9495Z"
                                        stroke="#E7ECEF" stroke-width="2" />
                                    <path
                                        d="M18.125 26.25V19.75C18.125 19.1977 17.6773 18.75 17.125 18.75H12.875C12.3227 18.75 11.875 19.1977 11.875 19.75V26.25"
                                        stroke="#E7ECEF" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                Home
                            </a>
                        </div>


                    </li>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main id="content" class="col-md-9 px-md-4">

                <div class="row">
                    <!-- Cards -->
                    <div class="col-md-5">
                        <div class="card-custom" style="height: 184px">
                            <div class="card-body">
                                <h5 class="card-tittle-custom">Humidity</h5>
                                <div class="row align-items-center text-center justify-content-center">
                                    <div class="col-md-6">
                                        <!-- Icon (Assuming you have an icon, replace this with your actual icon) -->
                                        <img src="{{ secure_asset('IMG/humidity.svg') }}" alt="Icon"
                                            class="img-fluid" />
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text-custom">{{ $data['humidity'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="card-custom" style="height: 184px">
                            <div class="card-body">
                                <h5 class="card-tittle-custom">Temperature</h5>
                                <div class="row align-items-center text-center justify-content-center">
                                    <div class="col-md-6">
                                        <!-- Icon (Assuming you have an icon, replace this with your actual icon) -->
                                        <img src="{{ secure_asset('IMG/temperature.svg') }}" alt="Icon"
                                            class="img-fluid" />
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text-custom">{{ $data['temperature'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card-custom" style="height: 184px">
                            <div class="card-body">
                                <h5 class="card-tittle-custom">pH</h5>
                                <div class="row align-items-center text-center justify-content-center">
                                    <div class="col-md-6">
                                        <!-- Icon (Assuming you have an icon, replace this with your actual icon) -->
                                        <img src="{{ secure_asset('IMG/ph.svg') }}" alt="Icon"
                                            class="img-fluid" />
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text-custom">{{ $data['ph'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="card-custom" style="height: 184px">
                            <div class="card-body ">
                                <h5 class="card-tittle-custom">Amonia</h5>
                                <div class="row align-items-center text-center justify-content-center">
                                    <div class="col-md-6">
                                        <!-- Icon (Assuming you have an icon, replace this with your actual icon) -->
                                        <img src="{{ secure_asset('IMG/amonia.svg') }}" alt="Icon"
                                            class="img-fluid" />
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text-custom">{{ $data['amonia'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card-custom" style="height: 184px">
                            <div class="card-body">
                                <h5 class="card-tittle-custom">Motor</h5>
                                <div class="row align-items-center text-center justify-content-center">
                                    <div class="col-md-6">
                                        <!-- Icon (Assuming you have an icon, replace this with your actual icon) -->
                                        <img src="{{ secure_asset('IMG/humidity.svg') }}" alt="Icon"
                                            class="img-fluid" />
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text-custom">{{ $data['motor'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="card-custom" style="height: 184px">
                            <div class="card-body">
                                <h5 class="card-tittle-custom">Water Sprayer</h5>
                                <div class="row align-items-center text-center justify-content-center">
                                    <div class="col-md-6">
                                        <!-- Icon (Assuming you have an icon, replace this with your actual icon) -->
                                        <img src="{{ secure_asset('IMG/humidity.svg') }}" alt="Icon"
                                            class="img-fluid" />
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text-custom">{{ $data['sprayer'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateClock() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');

            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const dateString = now.toLocaleDateString(undefined, options);

            const timeString = `${hours}:${minutes}:${seconds}`;

            document.getElementById('clock').innerText = `${dateString}   -   ${timeString}`;
        }

        // Update the clock every second
        setInterval(updateClock, 1000);

        // Initial update
        updateClock();
        setTimeout(function() {
            location.reload();
        }, 15000);
    </script>
</body>

</html>

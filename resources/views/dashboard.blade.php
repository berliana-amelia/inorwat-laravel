<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inorwat Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ secure_asset('assets/css/custom.css') }}">

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 167px;
            /* Increase the width */
            height: 93.94px;
            /* Increase the height */
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            border-radius: 60px;
            /* Make it round */
            -webkit-transition: 0.4s;
            transition: 0.4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 58px;
            /* Increase the height of the knob */
            width: 58px;
            /* Increase the width of the knob */
            left: 18px;
            /* Adjust the position */
            bottom: 18px;
            /* Adjust the position */
            background-color: white;
            border-radius: 50%;
            /* Make it round */
            -webkit-transition: 0.4s;
            transition: 0.4s;
        }

        input:checked+.slider {
            background-color: #27774c;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #27774c;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(68px);
            -ms-transform: translateX(68px);
            transform: translateX(68px);
        }
    </style>
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


                            <form action="{{ secure_url('logout') }}" method="POST" id="logoutForm">
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
                    <div class="col-md-11">
                        <div class="card-custom" style="height: 184px">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-11   ">
                                        <div class="row">
                                            <div class="col-md-12 d-flex align-items-center" style="height: 8rem">
                                                @if ($data['startStatus'] == 0)
                                                    <h5 class="card-text-custom2">Ayo Mulai!</h5>
                                                @else
                                                    <div class="row">
                                                        <h5 class="card-text-custom2">Hari ke-{{ $daysDifference }}</h5>
                                                        <p>Start Date :
                                                            {{ \Carbon\Carbon::parse($data['startDate'])->format('l, d F Y') }}
                                                            -
                                                            {{ $data['startTime'] }} WIB
                                                        </p>

                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-12" style="text-align: left;">
                                                @php
                                                    $lastOnlineTimestamp = strtotime($data['lastOnline']);
                                                    $currentTime = time();
                                                    $differenceInMinutes = round(($currentTime - $lastOnlineTimestamp) / 60);
                                                    $isWithinLast5Minutes = $differenceInMinutes <= 5;

                                                    $lastOnlineFormatted = \Carbon\Carbon::parse($data['lastOnline'])->format('l, j M Y H:i:s');
                                                @endphp

                                                <div class="last-online-indicator">
                                                    <div class="circle"
                                                        style="background-color: {{ $isWithinLast5Minutes ? 'green' : 'red' }}">
                                                    </div>
                                                    Last Online: {{ $lastOnlineFormatted }} (~{{ $differenceInMinutes }}
                                                    {{ $differenceInMinutes === 1 ? 'minute' : 'minutes' }} ago)
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 position-absolute bottom-0 end-0 m-3">
                                        @if ($data['startStatus'] == 0)
                                            <form action="{{ secure_url('startStatus') }}" method="POST">
                                                @csrf
                                                <input hidden name="status" value="1" />
                                                <button class="btn btn-primary btn-lg" id="startButton">Start</button>
                                            </form>
                                        @else
                                            <form action="{{ secure_url('startStatus') }}" method="POST">
                                                @csrf
                                                <input hidden value="0" name="status" />
                                                <button class="btn btn-danger btn-lg" id="stopButton">Stop</button>
                                            </form>
                                        @endif
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <p class="card-text-custom" id="humidityValue">{{ $data['humidity'] }}</p>
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
                                        <p class="card-text-custom" id="temperatureValue">
                                            {{ number_format($data['temperature'], 1) }}

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="card-custom" style="height: 184px">
                            <div class="card-body">
                                <h5 class="card-tittle-custom">Motor</h5>
                                <div class="text-center">
                                    <label class="switch">
                                        <input type="checkbox" id="motorSwitch"
                                            {{ $data['motor'] == 1 ? 'checked' : '' }}
                                            onchange="toggleMotor(this.checked)">
                                        <span class="slider
                                            round"
                                            style="{{ $data['motor'] == 1 ? 'background-color: #27774C;' : '' }} "></span>
                                    </label>
                                    <div class="spinner-border text-primary" role="status" id="loadingSpinner"
                                        style="display: none;">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <p class="card-text mt-2" id="motorStatus">Motor Status:
                                        {{ $data['motor'] == 1 ? 'ON' : 'OFF' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="card-custom" style="height: 184px">
                            <div class="card-body">
                                <h5 class="card-tittle-custom">Water Sprayer</h5>
                                <div class="text-center">
                                    <label class="switch">
                                        <input type="checkbox" id="sprayerSwitch"
                                            {{ $data['sprayer'] == 1 ? 'checked' : '' }}
                                            onchange="toogleSprayer(this.checked)">
                                        <span class="slider
                                            round"
                                            style="{{ $data['sprayer'] == 1 ? 'background-color: #27774C;' : '' }} "></span>
                                    </label>
                                    <div class="spinner-border text-primary" role="status"
                                        id="loadingSpinnerSprayer" style="display: none;">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <p class="card-text mt-2" id="motorStatus">Sprayer Status:
                                        {{ $data['sprayer'] == 1 ? 'ON' : 'OFF' }}</p>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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

        function fetchLatestData() {
            // Fetch the latest data from the server
            fetch('/get-data')
                .then(response => response.json())
                .then(data => {
                    // Update the UI for each data point
                    updateDataPoint('humidity', data.humidity);
                    updateDataPoint('temperature', data.temperature);
                    updateMotorStatus(data.motor);
                    updateSprayerStatus(data.sprayer);

                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function updateDataPoint(dataPoint, value) {
            // Update the value of the specified data point on the UI
            document.getElementById(dataPoint + 'Value').innerText = value;
        }

        function updateMotorStatus(motorValue) {
            // Update the motor status text on the UI
            var motorStatusElement = $('#motorStatus');
            motorStatusElement.text('Motor Status: ' + (motorValue == 1 ? 'ON' : 'OFF'));

            // Update the background color of the slider based on the motor status
            var motorSwitchElement = $('#motorSwitch');
            var sliderElement = $('.slider.round', motorSwitchElement.parent());

            if (motorValue == 1) {
                motorSwitchElement.prop('checked', true);
                sliderElement.css('background-color', '#27774C');
            } else {
                motorSwitchElement.prop('checked', false);
                sliderElement.css('background-color', '');
            }
        }

        function updateSprayerStatus(sprayerValue) {
            // Update the sprayer status text on the UI
            var sprayerStatusElement = $('#sprayerStatus');
            sprayerStatusElement.text('Sprayer Status: ' + (sprayerValue == 1 ? 'ON' : 'OFF'));

            // Update the background color of the slider based on the sprayer status
            var sprayerSwitchElement = $('#sprayerSwitch');
            var sliderElement = $('.slider.round', sprayerSwitchElement.parent());

            if (sprayerValue == 1) {
                sprayerSwitchElement.prop('checked', true);
                sliderElement.css('background-color', '#27774C');
            } else {
                sprayerSwitchElement.prop('checked', false);
                sliderElement.css('background-color', '');
            }
        }

        setInterval(fetchLatestData, 5000);
    </script>
    <script>
        $(document).ready(function() {
            $("#startButton, #stopButton").click(function() {
                var startStatus = ($(this).attr("id") === "startButton") ? 0 : 1;

                $.ajax({
                    type: "PUT",
                    url: "/startStatus",
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    data: JSON.stringify({
                        "startStatus": startStatus
                    }),
                    success: function(response) {
                        console.log(response);
                        // Handle the response as needed
                    },
                    error: function(error) {
                        console.error(error);
                        // Handle the error as needed
                    }
                });
            });
        });

        function toggleMotor(isChecked) {
            var motorValue = isChecked ? 1 : 0;

            // Show loading spinner
            document.getElementById('loadingSpinner').style.display = 'block';

            // Send a POST request to the Laravel controller
            fetch('/toggle-motor', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        motor: motorValue,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    // Hide loading spinner when the response is received
                    document.getElementById('loadingSpinner').style.display = 'none';

                    // Process the response data (if needed)
                    console.log(data);
                    location.reload();

                    // Handle success or update UI as needed
                })
                .catch(error => {
                    // Hide loading spinner on error
                    document.getElementById('loadingSpinner').style.display = 'none';

                    // Handle errors (if needed)
                    console.error('Error:', error);
                });
        }

        function toogleSprayer(isChecked) {
            var motorValue = isChecked ? 1 : 0;

            // Show loading spinner
            document.getElementById('loadingSpinnerSprayer').style.display = 'block';

            // Send a POST request to the Laravel controller
            fetch('/toggle-sprayer', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        sprayer: motorValue,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    // Hide loading spinner when the response is received
                    document.getElementById('loadingSpinnerSprayer').style.display = 'none';

                    // Process the response data (if needed)
                    console.log(data);
                    location.reload();

                    // Handle success or update UI as needed
                })
                .catch(error => {
                    // Hide loading spinner on error
                    document.getElementById('loadingSpinner').style.display = 'none';

                    // Handle errors (if needed)
                    console.error('Error:', error);
                });
        }
    </script>



</body>

</html>

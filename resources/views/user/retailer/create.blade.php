<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retailer Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            max-width: 500px;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: linear-gradient(45deg, #007bff, #6610f2);
            color: white;
            text-align: center;
            font-size: 18px;
            border-radius: 10px 10px 0 0;
        }

        .form-select,
        .btn {
            border-radius: 5px;
        }

        .btn-primary {
            background: linear-gradient(45deg, #007bff, #6610f2);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #0056b3, #4e0bb4);
        }

        video,
        canvas {
            width: 100%;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Select District</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('retailer-create') }}" method="GET">
                <div class="mb-3">
                    <label for="district-dropdown" class="form-label">Select District</label>
                    <select class="form-select" id="district-dropdown" name="district" required onchange="this.form.submit()">
                        <option value="">-- Select District --</option>
                        @foreach($districts as $district)
                        <option value="{{ $district }}" {{ isset($selectedDistrict) && $selectedDistrict == $district ? 'selected' : '' }}>
                            {{ $district }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </form>

            @if(isset($distributors) && count($distributors) > 0)
            <div class="mt-4">
                <label for="distributor-dropdown" class="form-label">Available Distributors</label>
                <select class="form-select" id="distributor-dropdown" onchange="showRetailerForm()">
                    <option value="">-- Choose Distributor --</option>
                    @foreach($distributors as $distributor)
                    <option value="{{ $distributor }}">{{ $distributor }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            <!-- Retailer Registration Form (Initially Hidden) -->
            <div id="retailer-form" class="mt-4" style="display: none;">
                <form action="{{ route('retailer-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Shop Name</label>
                        <input type="text" class="form-control" name="shop_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Owner Name</label>
                        <input type="text" class="form-control" name="owner_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mobile No</label>
                        <input type="text" class="form-control" name="mobile_no" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alternative Mobile No</label>
                        <input type="text" class="form-control" name="alt_mobile_no">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Shop Address</label>
                        <textarea class="form-control" name="shop_address" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">State</label>
                        <input type="text" class="form-control" name="state" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pin Code</label>
                        <input type="text" class="form-control" name="pin_code" required>
                    </div>

                    <!-- Camera Capture -->
                    <div class="mb-3">
                        <label class="form-label">Photo (Capture Image)</label>
                        <video id="camera" autoplay></video>
                        <button type="button" class="btn btn-secondary mt-2" onclick="capturePhoto()">Capture</button>
                        <canvas id="canvas" style="display:none;"></canvas>
                        <input type="hidden" name="photo" id="photo">
                    </div>

                    <!-- Geo Location -->
                    <div class="mb-3">
                        <label class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" readonly required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" readonly required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showRetailerForm() {
            let distributorDropdown = document.getElementById('distributor-dropdown');
            let retailerForm = document.getElementById('retailer-form');
            retailerForm.style.display = distributorDropdown.value ? 'block' : 'none';
        }

        // Camera Capture Functionality
        let video = document.getElementById('camera');
        let canvas = document.getElementById('canvas');
        let photoInput = document.getElementById('photo');

        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(err => console.error("Camera access denied!", err));

        function capturePhoto() {
            let context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            photoInput.value = canvas.toDataURL('image/png'); // Store image as base64
            alert("Photo Captured!");
        }

        // Get Geolocation
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                document.getElementById('latitude').value = position.coords.latitude;
                document.getElementById('longitude').value = position.coords.longitude;
            }, () => alert("Geolocation access denied!"));
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    </script>

</body>

</html>
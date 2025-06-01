<!DOCTYPE html>
<html>

<head>
    <title>University CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #003366 !important;
        }

        .navbar-brand,
        .nav-link {
            color: #FFD700 !important;
            font-weight: bold;
        }

        .nav-link:hover {
            background-color: #FFD700;
            color: #003366 !important;
            border-radius: 4px;
        }

        .card-hover:hover {
            transform: scale(1.03);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s, box-shadow 0.2s;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px;" class="me-2">
                    <span class="text-warning fw-bold">NU LAGUNA</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('instructors.index') }}">Instructors</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('departments.index') }}">Departments</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('students.index') }}">Students</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Courses</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        @yield('content')
    </div>

    {{-- Bootstrap JS and auto-dismiss script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const alerts = document.querySelectorAll('.auto-dismiss');
            alerts.forEach(alert => {
                setTimeout(() => {
                    const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                    bsAlert.close();
                }, 4000); // 4 seconds
            });
        });
    </script>
</body>
</html>

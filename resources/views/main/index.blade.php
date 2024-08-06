<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            flex: 0 0 250px;
            background-color: #343a40;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .navbar,
        .footer {
            flex: 0 0 auto;
        }

        .main-content {
            flex: 1 1 auto;
            padding: 20px;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Admin</h2>
        {{-- <a href="/admin/namatoko">Nama Toko</a> --}}
        <a href="/admin/produk">Produk</a>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item">
                Logout
            </button>
        </form>
    </div>

    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/guruu">Admin Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item pe-2">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="main-content">
            @yield('body')
        </div>

        <footer class="footer bg-light text-center">
            <div class="container">
                <span class="text-muted">&copy; 2024 Powered by Baju Bodo dan Jas Tutup Indonesia</span>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

    <script>
        feather.replace();
    </script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.3/purify.min.js"></script>

    <script>
        function renderHtml() {
            const inputArea = document.getElementById('isi_bab');
            const output = document.getElementById('output');

            // Dapatkan nilai dari textarea
            const content = inputArea.value;

            // Bersihkan konten menggunakan DOMPurify
            const cleanContent = DOMPurify.sanitize(content);

            // Set konten dalam div output, memperbolehkan HTML yang sudah dibersihkan
            output.innerHTML = cleanContent;
        }
    </script>
    {{-- <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script> --}}
</body>

</html>

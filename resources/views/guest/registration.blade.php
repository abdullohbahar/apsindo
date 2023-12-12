<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .form-label {
            font-weight: bold;
        }
    </style>
</head>

<body style="background-color:rgb(243, 243, 243)">
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo"
                    width="30" height="24" class="d-inline-block align-text-top">
                Bootstrap
            </a>
            {{-- <div>
                asdf
            </div> --}}
        </div>
    </nav>

    <section class="mb-5">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-9">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Asosiasi Pendidik Seni Indonesia</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">NIDN</label>
                                        <input type="text" class="form-control" name="nidn" placeholder="NIDN"
                                            id="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Alamat Email" id="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="fullname"
                                            placeholder="Nama Lengkap" id="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" name="phone_number"
                                            placeholder="Nomor Telepon" id="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password" id="" autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            placeholder="Konfirmasi Password" id="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Alamat</label>
                                        <textarea name="address" class="form-control" rows="3" placeholder="Alamat"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Provinsi</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">-- Pilih Provinsi --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Universitas</label>
                                        <input type="text" class="form-control" name="university"
                                            placeholder="Universitas" id="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Foto Profil</label>
                                        <input type="file" class="form-control" name="picture" id="imageUpload">
                                    </div>
                                    <img src="{{ asset('guest-assets/dummy-profile.jpg') }}" alt=""
                                        class="rounded-circle mt-3" id="imagePreview"
                                        style="width: 150px; height: 150px;">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success mt-5"
                                        style="width: 100%">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        imageUpload.onchange = (evt) => {
            const [file] = imageUpload.files;
            if (file) {
                // Batasan ukuran file (2MB)
                const maxSizeInBytes = 2 * 1024 * 1024; // 2MB
                if (file.size <= maxSizeInBytes) {
                    // Batasan jenis file (PNG, JPG, JPEG)
                    const allowedExtensions = ["png", "jpg", "jpeg", "webp"];
                    const fileExtension = file.name.split(".").pop().toLowerCase();
                    if (allowedExtensions.includes(fileExtension)) {
                        imagePreview.src = URL.createObjectURL(file);
                    } else {
                        alert(
                            "Jenis file yang diunggah tidak diizinkan. Harap pilih file dengan format PNG, JPG, atau JPEG."
                        );
                        imageUpload.value = null; // Menghapus file yang dipilih
                    }
                } else {
                    alert("Ukuran file terlalu besar. Harap pilih file dengan ukuran maksimal 2MB.");
                    imageUpload.value = null; // Menghapus file yang dipilih
                }
            }
        };
    </script>
</body>

</html>

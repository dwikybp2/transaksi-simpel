<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table - Bootstrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .required::after {
            content: " *";
            color: red;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">MyApp</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Data Table</h5>
                <a class="btn btn-light btn-sm" href="{{ url('barangs') }}">Kembali</a>
            </div>
            <div class="card-body">
                <!-- Search Box -->
                <div class="mb-3">
                    {{-- <input type="text" id="searchInput" class="form-control" placeholder="Search..."> --}}
                </div>

                <!-- Data Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Transaksi</th>
                            </tr>
                        </thead>
                        <tbody id="dataTable">
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav>
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addForm">
                        <div class="mb-3">
                            <label class="form-label required">Nama Barang</label>
                            <input type="text" id="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Stok</label>
                            <input type="number" id="stok" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Jenis</label>
                            <select id="jenis" class="form-control">
                                <option value="Konsumsi">Konsumsi</option>
                                <option value="Pembersih">Pembersih</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Barang -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editModalLabel">Edit Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="edit_id" name="id"> <!-- ID Barang -->
                        <div class="mb-3">
                            <label for="edit_nama" class="form-label required">Nama Barang</label>
                            <input type="text" class="form-control" id="edit_nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_stok" class="form-label required">Stok</label>
                            <input type="number" class="form-control" id="edit_stok" name="stok" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_jenis" class="form-label required">Jenis</label>
                            <input type="text" class="form-control" id="edit_jenis" name="jenis" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            fetchData(1, ''); // Load first page with empty search

            // Search functionality
            $("#searchInput").on("keyup", function() {
                let value = $(this).val();
                fetchData(1, value); // Fetch with search query
            });

            // Pagination click event
            $(document).on("click", ".page-link", function(e) {
                e.preventDefault();
                let page = $(this).attr("data-page");
                let search = $("#searchInput").val();
                fetchData(page, search);
            });


            // Add Form Submission
            $("#addForm").submit(function(e) {
                e.preventDefault();
                let nama = $("#nama").val();
                let stok = $("#stok").val();
                let jenis = $("#jenis").val();

                $.ajax({
                    url: "{{ url('api/barangs') }}",
                    type: "POST",
                    data: {
                        nama: nama,
                        stok: stok,
                        jenis: jenis
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.message) {
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil!",
                                text: response.message,
                                timer: 2000,
                                // showConfirmButton: false
                            });

                            $("#addForm")[0].reset(); // Reset form
                            $("#addModal").modal("hide"); // Tutup modal
                            fetchData(1, ""); // Reload data
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: "error",
                            title: "Gagal!",
                            text: xhr.responseJSON.message || "Terjadi kesalahan!",
                        });
                    }
                });
            });


            $(document).on("click", ".edit-btn", function() {
                let id = $(this).data("id");
                let nama = $(this).data("nama");
                let stok = $(this).data("stok");
                let jenis = $(this).data("jenis");

                // Isi modal edit dengan data yang dipilih
                $("#edit_id").val(id);
                $("#edit_nama").val(nama);
                $("#edit_stok").val(stok);
                $("#edit_jenis").val(jenis);

                // Tampilkan modal edit
                $("#editModal").modal("show");
            });
            $("#editForm").submit(function(e) {
                e.preventDefault(); // Mencegah reload halaman

                let formData = {
                    id: $("#edit_id").val(),
                    nama: $("#edit_nama").val(),
                    stok: $("#edit_stok").val(),
                    jenis: $("#edit_jenis").val(),
                };

                $.ajax({
                    url: `{{ url('api/barangs') }}/${formData.id}`,
                    type: "PUT",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil!",
                                text: response.message,
                                timer: 2000,
                            });

                            $("#editForm")[0].reset(); // Reset form
                            $("#editModal").modal("hide"); // Tutup modal
                            fetchData(1, ""); // Reload data
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: "error",
                            title: "Gagal!",
                            text: xhr.responseJSON.message || "Terjadi kesalahan!",
                        });
                    }
                });
            });

            $(document).on("click", ".delete-btn", function() {
                let id = $(this).data("id");

                // Konfirmasi sebelum hapus
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Lakukan AJAX DELETE
                        $.ajax({
                            url: `{{ url('api/barangs') }}/${id}`,
                            type: "DELETE",
                            dataType: "json",
                            success: function(response) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil!",
                                    text: response.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                fetchData(1, ""); // Reload data setelah hapus
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal!",
                                    text: xhr.responseJSON.message ||
                                        "Terjadi kesalahan!",
                                });
                            }
                        });
                    }
                });
            });

        });

        function fetchData(page, search) {
            const barangId = "{{ $barangId }}";
            const baseUrl = "{{ url('api/barangs') }}";

            $.ajax({
                url: `${baseUrl}/${barangId}/transaksi?page=${page}&search=${search}`,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    let tableBody = "";
                    $.each(response.data.data, function(index, item) {
                        tableBody += `
                            <tr>
                                <td>${(response.data.current_page - 1) * response.data.per_page + index + 1}</td>
                                <td>${item.nama_barang}</td>
                                <td class="text-center">${item.tanggal}</td>
                            </tr>
                        `;
                    });
                    $("#dataTable").html(tableBody);
                    updatePagination(response.data);
                },
                error: function() {
                    alert("Failed to fetch data.");
                }
            });
        }

        function updatePagination(data) {
            let paginationHtml = "";
            if (data.total > 0) {
                paginationHtml += `<li class="page-item ${data.prev_page_url ? '' : 'disabled'}">
                                    <a class="page-link" href="#" data-page="${data.current_page - 1}">Previous</a>
                                </li>`;
                for (let i = 1; i <= data.last_page; i++) {
                    paginationHtml += `<li class="page-item ${data.current_page === i ? 'active' : ''}">
                                        <a class="page-link" href="#" data-page="${i}">${i}</a>
                                    </li>`;
                }
                paginationHtml += `<li class="page-item ${data.next_page_url ? '' : 'disabled'}">
                                    <a class="page-link" href="#" data-page="${data.current_page + 1}">Next</a>
                                </li>`;
            }
            $(".pagination").html(paginationHtml);
        }
    </script>



</body>

</html>

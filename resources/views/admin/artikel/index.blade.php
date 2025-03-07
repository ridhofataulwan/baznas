<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.stisla.head')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('admin.stisla.navbar')
            @include('admin.stisla.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Admin Page</h1>
                    </div>
                    <a href="{{ route('add.artikel') }}" class="btn btn-success mb-1"><i class="fa fa-plus" aria-hidden="true"></i> Input Artikel </a>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tabel Artikel</h4>
                                    </div>
                                    <div class="card-body">
                                        @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-md" id="myTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" style="width: 5%">No</th>
                                                        <th scope="col">Judul</th>
                                                        <th scope="col" width="">Deskripsi</th>
                                                        <th scope="col" style="width: 10%">Gambar</th>
                                                        <th scope="col" style="width: 5%">Status</th>
                                                        <th scope="col" style="width: 15%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach ($artikel as $b)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td>{{ $b->judul }}</td>
                                                        <td>{{ $b->deskripsi }}</td>
                                                        <td><img src="{{ asset($b->gambar) }}" alt="" style="height: 40px; width:70px;">
                                                        </td>
                                                        <td style="text-align: center">
                                                            @if ($b->status == 'ACTIVE')
                                                            <span class="badge badge-success">Aktif</span>
                                                            @else
                                                            <span class="badge badge-danger">Nonaktif</span>
                                                            @endif
                                                        </td>
                                                        <td>

                                                            <a href="{{ url('admin/artikel/edit/'.$b->id) }}" class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </a>
                                                            <a href="{{ url('admin/artikel/status/'.$b->id) }}" class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-power-off"></i>
                                                            </a>
                                                            <a href="{{ url('admin/artikel/delete/'.$b->id) }}" class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-trash-alt fa-2x"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $artikel->links() }}
                                        </div>

                                    </div>
                                    <!-- This is where your code ends -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                @include('admin.stisla.footer')
            </footer>
        </div>
    </div>

    @include('admin.stisla.script')
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

</html>
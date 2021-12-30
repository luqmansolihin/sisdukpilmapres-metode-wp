@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12 mb-3">
            @if (session()->has('success'))
                <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body my-1">
                        {{ session('success') }}
                        <button data-dismiss="toast" type="button" class="ml-xl-5 mb-1 close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Data Kriteria
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <p><strong>Kriteria Pemilihan Mahasiswa Berprestasi Program Pendidikan Sarjana</strong></p>
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama Kriteria</th>
                                    <th scope="col">Bobot Kriteria</th>
                                    <th scope="col">Jenis Kriteria</th>
                                    <th scope="col">Normalisasi Bobot</th>
                                    <th scope="col">Bobot Pangkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriteria_sarjanas as $kriteria_sarjana)    
                                    <tr>
                                        <td>{{ $kriteria_sarjana->name }}</td>
                                        <td>{{ $kriteria_sarjana->bobot }}</td>
                                        <td>{{ $kriteria_sarjana->keterangan }}</td>
                                        <td>{{ $kriteria_sarjana->bobot_normalisasi }}</td>
                                        <td>{{ $kriteria_sarjana->bobot_pangkat }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p><strong>Kriteria Pemilihan Mahasiswa Berprestasi Program Pendidikan Diploma</strong></p>
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama Kriteria</th>
                                    <th scope="col">Bobot Kriteria</th>
                                    <th scope="col">Jenis Kriteria</th>
                                    <th scope="col">Normalisasi Bobot</th>
                                    <th scope="col">Bobot Pangkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriteria_diplomas as $kriteria_diploma)    
                                    <tr>
                                        <td>{{ $kriteria_diploma->name }}</td>
                                        <td>{{ $kriteria_diploma->bobot }}</td>
                                        <td>{{ $kriteria_diploma->keterangan }}</td>
                                        <td>{{ $kriteria_diploma->bobot_normalisasi }}</td>
                                        <td>{{ $kriteria_diploma->bobot_pangkat }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="small">
                            Keterangan
                            <ol>
                                <li>Normalisasi Bobot<sub>n</sub> = Bobot Kriteria<sub>n</sub> / Total Bobot Kriteria</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ url('/dashboard/kriteria/edit') }}" class="btn btn-primary"><i class="fas fa-edit mr-2"></i><b>Edit Bobot Kriteria</b></a>
                </div>
            </div>
        </div>
    </div>
@endsection
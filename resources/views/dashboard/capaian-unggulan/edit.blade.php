@extends('dashboard.layouts.main')

@section('container')
    @if ($seleksi->tanggal_buka <= now() and $seleksi->tanggal_tutup >= now())
        <div class="row">
            <div class="col-lg-5">
                <div class="card card-primary card-outline">
                    <!-- form start -->
                    <form action="{{ url('/dashboard/prestasi/capaian-unggulan/'.$pcu->slug) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $pcu->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode">Kode Capaian Unggulan</label>
                                <select name="kode" class="form-control custom-select @error('kode') is-invalid @enderror" id="kode" required>
                                    @foreach ($capaian_unggulans as $cu)
                                        <option value="{{ $cu->kode }}" @if (old('kode', $pcu->capaian_unggulan->kode) == $cu->kode) selected @endif>{{ $cu->kode }}</option>                                    
                                    @endforeach
                                </select>
                                @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Capaian Unggulan</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $pcu->name) }}" placeholder="Masukkan Nama Capaian Unggulan" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Bukti Capaian Unggulan</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image" onchange="previewImageCU()">
                                    <label class="custom-file-label" for="image">Bukti Capaian Unggulan</label>
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <img class="profile-user-img img-fluid img-preview mb-3" src="{{ asset('/storage/'.$pcu->image) }}" alt="Bukti Capaian Unggulan">
                            <div class="form-group">
                                <label for="penerbit">URL Penerbit SK/Piagam</label>
                                <input type="text" name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" value="{{ old('penerbit', $pcu->penerbit) }}" placeholder="Masukkan Nama Capaian Unggulan" required>
                                @error('penerbit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kodifikasi Capaian Unggulan</h3>
                    </div>
                    <!-- /.card-header -->
                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_data_capaian_unggulan" class="table table-hover table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Bidang</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Wujud</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($capaian_unggulans as $cu)    
                                        <tr>
                                            <td>{{ $cu->kode }}</td>
                                            <td>{{ $cu->bidang }}</td>
                                            <td>{{ $cu->kategori }}</td>
                                            <td>{{ $cu->wujud }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="thead-dark">
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Bidang</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Wujud</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    @else
        <p>Pendaftaran ditutup.</p>
    @endif
@endsection
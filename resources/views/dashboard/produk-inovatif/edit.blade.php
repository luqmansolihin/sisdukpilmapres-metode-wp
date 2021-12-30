@extends('dashboard.layouts.main')

@section('container')
    @if ($seleksi->tanggal_buka <= now() and $seleksi->tanggal_tutup >= now())
        <div class="row">
            <div class="col-lg-7">
                <div class="card card-primary card-outline">
                    <!-- form start -->
                    <form action="{{ url('/dashboard/prestasi/produk-inovatif/'.$prestasi->slug) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5>
                                    <strong>
                                        Tema Produk Inovatif: <br> 
                                        {{ $seleksi->tema_produk_inovatif }}
                                    </strong>
                                </h5>
                            </div>

                            <input type="hidden" name="id" value="{{ $prestasi->id }}">
                            <div class="form-group">
                                <label for="judul">Judul Produk Inovatif</label>
                                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{ old('judul', $prestasi->judul) }}" placeholder="Masukkan Judul Gagasan Kreatif" required>
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file">Naskah Produk Inovatif</label>
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror" id="file">
                                    <label class="custom-file-label" for="file">Naskah Produk Inovatif</label>
                                    @error('file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <p>Pendaftaran ditutup.</p>
    @endif
@endsection
@extends('dashboard.layouts.main')

@section('container')
    @if ($seleksi->tanggal_buka <= now() and $seleksi->tanggal_tutup >= now())
        <div class="row">
            <div class="col-lg-7">
                <div class="card card-primary card-outline">
                    <!-- form start -->
                    <form action="{{ url('/dashboard/prestasi/gagasan-kreatif') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5>
                                    <strong>
                                        Tema Gagasan Kreatif: <br> 
                                        {{ $seleksi->tema_gagasan_kreatif }}
                                    </strong>
                                </h5>
                            </div>

                            <input type="hidden" name="kriteria_id" value="{{ $kriteria->id }}">
                            <input type="hidden" name="tahun_seleksi_id" value="{{ $seleksi->id }}">
                            <div class="form-group">
                                <label for="judul">Judul Gagasan Kreatif</label>
                                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{ old('judul') }}" placeholder="Masukkan Judul Gagasan Kreatif" required>
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file">Naskah Gagasan Kreatif</label>
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" required>
                                    <label class="custom-file-label" for="file">Naskah Gagasan Kreatif</label>
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
@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-primary card-outline">
                <!-- form start -->
                <form action="{{ url('/dashboard/tahun-seleksi') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tahun_akademik">Tahun</label>
                            <select name="tahun_akademik" class="form-control @error('tahun_akademik') is-invalid @enderror" id="tahun_akademik" required>
                                @for ($i = $j = date('Y'); $i >= $j-5 ; $i--)
                                    <option value="{{ $i }}" @if (old('tahun_akademik') == $i) selected @endif>{{ $i }}</option>               
                                @endfor
                            </select>
                            @error('tahun_akademik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_buka">Tanggal Buka</label>
                            <input type="text" id="tanggal_buka" name="tanggal_buka" class="form-control datetimepicker-input @error('tanggal_buka') is-invalid @enderror" data-target="#tanggal_buka" value="{{ old('tanggal_buka') }}" data-toggle="datetimepicker" required>
                            @error('tanggal_buka')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_tutup">Tanggal Tutup</label>
                            <input type="text" id="tanggal_tutup" name="tanggal_tutup" class="form-control datetimepicker-input @error('tanggal_tutup') is-invalid @enderror" data-target="#tanggal_tutup" value="{{ old('tanggal_tutup') }}" data-toggle="datetimepicker" required>
                            @error('tanggal_tutup')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tema_gagasan_kreatif">Tema Gagasan Kreatif</label>
                            <input type="text" name="tema_gagasan_kreatif" class="form-control @error('tema_gagasan_kreatif') is-invalid @enderror" id="tema_gagasan_kreatif" value="{{ old('tema_gagasan_kreatif') }}" placeholder="Masukkan Tema Gagasan Kreatif" required>
                            @error('tema_gagasan_kreatif')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tema_produk_inovatif">Tema Produk Inovatif</label>
                            <input type="text" name="tema_produk_inovatif" class="form-control @error('tema_produk_inovatif') is-invalid @enderror" id="tema_produk_inovatif" value="{{ old('tema_produk_inovatif') }}" placeholder="Masukkan Tema Gagasan Kreatif" required>
                            @error('tema_produk_inovatif')
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
    </div>
@endsection
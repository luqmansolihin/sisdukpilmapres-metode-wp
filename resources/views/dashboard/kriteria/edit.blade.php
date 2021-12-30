@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <!-- form start -->
                <form action="{{ url('/dashboard/kriteria/edit') }}" method="POST">
                    @csrf
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriteria_sarjanas as $kriteria_sarjana)
                                        <?php 
                                            $kriteria_name = Str::slug($kriteria_sarjana->name, '_');
                                        ?>
                                        <input type="hidden" name="{{ 'id'.$loop->index.'_sarjana' }}" value="{{ $kriteria_sarjana->id }}">    
                                        <tr>
                                            <td>{{ $kriteria_sarjana->name }}</td>
                                            <td>
                                                <input type="number" name="{{ $kriteria_name.'_sarjana' }}" class="form-control @error($kriteria_name.'_sarjana') is-invalid @enderror" id="{{ $kriteria_name.'_sarjana' }}" placeholder="Masukkan Bobot {{ $kriteria_sarjana->name }}" value="{{ old($kriteria_name.'_sarjana', $kriteria_sarjana->bobot) }}" required>
                                                @error($kriteria_name.'_sarjana')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <select name="{{ 'keterangan_'.$kriteria_name.'_sarjana' }}" class="form-control @error('status') is-invalid @enderror" required>
                                                    <option selected disabled>Pilih Jenis Kriteria</option>
                                                    <option value="benefit" @if (old('keterangan_'.$kriteria_name.'_sarjana', $kriteria_sarjana->keterangan) == 'benefit') selected @endif>Benefit</option>
                                                    <option value="cost" @if (old('keterangan_'.$kriteria_name.'_sarjana', $kriteria_sarjana->keterangan) == 'cost') selected @endif>Cost</option>
                                                </select>
                                                @error('keterangan_'.$kriteria_name.'_sarjana')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriteria_diplomas as $kriteria_diploma)
                                        <?php 
                                            $kriteria_name = Str::slug($kriteria_diploma->name, '_');
                                        ?>
                                        <input type="hidden" name="{{ 'id'.$loop->index.'_diploma' }}" value="{{ $kriteria_diploma->id }}">    
                                        <tr>
                                            <td>{{ $kriteria_diploma->name }}</td>
                                            <td>
                                                <input type="number" name="{{ $kriteria_name.'_diploma' }}" class="form-control @error($kriteria_name.'_diploma') is-invalid @enderror" id="{{ $kriteria_name.'_diploma' }}" placeholder="Masukkan Bobot {{ $kriteria_diploma->name }}" value="{{ old($kriteria_name.'_diploma', $kriteria_diploma->bobot) }}" required>
                                                @error($kriteria_name.'_diploma')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <select name="{{ 'keterangan_'.$kriteria_name.'_diploma' }}" class="form-control @error('status') is-invalid @enderror" required>
                                                    <option selected disabled>Pilih Jenis Kriteria</option>
                                                    <option value="benefit" @if (old('keterangan_'.$kriteria_name.'_diploma', $kriteria_diploma->keterangan) == 'benefit') selected @endif>Benefit</option>
                                                    <option value="cost" @if (old('keterangan_'.$kriteria_name.'_diploma', $kriteria_diploma->keterangan) == 'cost') selected @endif>Cost</option>
                                                </select>
                                                @error('keterangan_'.$kriteria_name.'_diploma')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i><b>Simpan</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
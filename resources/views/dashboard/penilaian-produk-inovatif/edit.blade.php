@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg mb-3">
            @if (session()->has('success'))
                <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body my-1">
                        {{ session('success') }}
                        <button data-dismiss="toast" type="button" class="ml-xl-8 mb-1 close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if (!empty($penilaian_produk_inovatifs))
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Penilaian Prestasi Produk Inovatif</h3>
                    </div>
                    
                    <form action="{{ url('/dashboard/prestasi/penilaian/produk-inovatif/'.$prestasi->slug) }}" method="POST">
                        @method('put')
                        @csrf
                        
                        <div class="card-body">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Judul</b> <a class="float-right">{{ $prestasi->judul }}</a>
                                </li>
                            </ul>    
                            <div class="embed-responsive embed-responsive-16by9 rounded mb-3">
                                <iframe class="embed-responsive-item" src="{{ asset($prestasi->file) }}" allowfullscreen></iframe>
                            </div>

                            <h4>Rubrik Penilaian Naskah Produk Inovatif</h4>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Kriteria</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Rentang Skor</th>
                                            <th scope="col">Rubrik</th>
                                            <th scope="col">Skor</th>                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produk_inovatifs as $gk)
                                            <tr>
                                                <td rowspan="5" class="align-middle">{{ $gk->kode }}</td>
                                                <td rowspan="5" class="align-middle">{{ $gk->keterangan }}</td>
                                                <td rowspan="5" class="align-middle">{{ $gk->bobot }}</td>
                                                <td class="align-middle">{{ $gk->rubrik_produk_inovatif[0]->nilai_min .' <= Skor < '. $gk->rubrik_produk_inovatif[0]->nilai_max }}</td>
                                                <td class="align-middle">{{ $gk->rubrik_produk_inovatif[0]->rubrik }}</td>
                                                <td rowspan="5" class="align-middle">
                                                    <input type="hidden" name="{{ 'bobot'.$gk->id }}" value="{{ $gk->bobot }}">
                                                    <input type="hidden" name="prestasi_id" value="{{ $prestasi->id }}">
                                                    <input type="text" name="{{ 'skor'.$gk->id }}" class="form-control @error('skor'.$gk->id) is-invalid @enderror" value="{{ old('skor'.$gk->id, $penilaian_produk_inovatifs[$loop->index]->skor) }}" placeholder="Skor" required>
                                                    @error('skor'.$gk->id)
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </td>
                                            </tr>

                                            @for ($i = 1; $i < 5; $i++)
                                                <tr>
                                                    <td class="align-middle">
                                                        @if ($gk->rubrik_produk_inovatif[$i]->nilai_min == 9)
                                                            {{ $gk->rubrik_produk_inovatif[$i]->nilai_min .' <= Skor <= '. $gk->rubrik_produk_inovatif[$i]->nilai_max }}
                                                        @else
                                                            {{ $gk->rubrik_produk_inovatif[$i]->nilai_min .' <= Skor < '. $gk->rubrik_produk_inovatif[$i]->nilai_max }}
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">{{ $gk->rubrik_produk_inovatif[$i]->rubrik }}</td>
                                                </tr>
                                            @endfor
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- card body --}}

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Penilaian Prestasi Produk Inovatif</h3>
                    </div>
                    
                    <form action="{{ url('/dashboard/prestasi/penilaian/produk-inovatif/'.$prestasi->slug) }}" method="POST">
                        @method('put')
                        @csrf
                        
                        <div class="card-body">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Judul</b> <a class="float-right">{{ $prestasi->judul }}</a>
                                </li>
                            </ul>    
                            <div class="embed-responsive embed-responsive-16by9 rounded mb-3">
                                <iframe class="embed-responsive-item" src="{{ asset($prestasi->file) }}" allowfullscreen></iframe>
                            </div>

                            <h4>Rubrik Penilaian Naskah Produk Inovatif</h4>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Kriteria</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Rentang Skor</th>
                                            <th scope="col">Rubrik</th>
                                            <th scope="col">Skor</th>                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produk_inovatifs as $gk)
                                            <tr>
                                                <td rowspan="5" class="align-middle">{{ $gk->kode }}</td>
                                                <td rowspan="5" class="align-middle">{{ $gk->keterangan }}</td>
                                                <td rowspan="5" class="align-middle">{{ $gk->bobot }}</td>
                                                <td class="align-middle">{{ $gk->rubrik_produk_inovatif[0]->nilai_min .' <= Skor < '. $gk->rubrik_produk_inovatif[0]->nilai_max }}</td>
                                                <td class="align-middle">{{ $gk->rubrik_produk_inovatif[0]->rubrik }}</td>
                                                <td rowspan="5" class="align-middle">
                                                    <input type="hidden" name="{{ 'bobot'.$gk->id }}" value="{{ $gk->bobot }}">
                                                    <input type="hidden" name="prestasi_id" value="{{ $prestasi->id }}">
                                                    <input type="text" name="{{ 'skor'.$gk->id }}" class="form-control @error('skor'.$gk->id) is-invalid @enderror" value="{{ old('skor'.$gk->id) }}" placeholder="Skor" required>
                                                    @error('skor'.$gk->id)
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </td>
                                            </tr>

                                            @for ($i = 1; $i < 5; $i++)
                                                <tr>
                                                    <td class="align-middle">
                                                        @if ($gk->rubrik_produk_inovatif[$i]->nilai_min == 9)
                                                            {{ $gk->rubrik_produk_inovatif[$i]->nilai_min .' <= Skor <= '. $gk->rubrik_produk_inovatif[$i]->nilai_max }}
                                                        @else
                                                            {{ $gk->rubrik_produk_inovatif[$i]->nilai_min .' <= Skor < '. $gk->rubrik_produk_inovatif[$i]->nilai_max }}
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">{{ $gk->rubrik_produk_inovatif[$i]->rubrik }}</td>
                                                </tr>
                                            @endfor
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- card body --}}

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
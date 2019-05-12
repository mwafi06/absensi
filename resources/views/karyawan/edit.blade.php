@extends('layouts.base')

@section('content')

<section class="main-section">
    <!-- Add Your Content Inside -->
    <div class="content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <!-- Remove This Before You Start -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-1">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload">
                        <i class="fa fa-redo"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                        data-click="panel-collapse">
                        <i class="fa fa-minus"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <h4 class="panel-title">Edit Data</h4>
            </div>
            <div class="panel-body">
                <form method="post" action="/karyawan/update/{{ $karyawan->id }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        @csrf
                        <label for="nip">NIP</label>
                        <input type="number" value={{ $karyawan->nip }} class="form-control" name="nip" />
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" value={{ $karyawan->nama }} class="form-control" name="nama" />
                    </div>
                    <div class="form-group">
                        <label for="tgl_lhr">Tanggal Lahir</label>
                        <input type="date" value={{ $karyawan->tgl_lhr }} class="form-control" name="tgl_lhr" />
                    </div>
                    <div class="form-group">
                        <label for="asal">Asal</label>
                        <input type="text" value={{ $karyawan->asal }} class="form-control" name="asal" />
                    </div>
                    <div class="form-group">
                        <label for="j_kel">Jenis Kelamin :</label><br>
                        <div class="radio radio-css radio-inline">
                            <input type="radio" {{ $karyawan->j_kel == 'Laki-Laki' ? 'checked' : ''}} id="Radio1"
                                name="j_kel" value="Laki-Laki" />
                            <label for="Radio1">Laki-Laki</label>
                        </div>
                        <div class="radio radio-css radio-inline">
                            <input type="radio" value="Perempuan" {{ $karyawan->j_kel == 'Perempuan' ? 'checked' : ''}}
                                id="Radio2" name="j_kel" />
                            <label for="Radio2">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" value={{ $karyawan->alamat }} class="form-control" name="alamat" />
                    </div>
                    <div class="form-group">
                        <label for="no_tlp">No. Telp</label>
                        <input type="number" value={{ $karyawan->no_tlp }} class="form-control" name="no_tlp" />
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" value={{ $karyawan->status }} class="form-control" name="status" />
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select name="jabatan_id" class="form-control">
                            @foreach ($jabatans as $item)
                            <?php if($item->id == $karyawan->jabatan_id){ ?>
                            <option selected="selected" value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
                            <?php } else { ?>
                            <option value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
                            <?php } ?>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </form>
            </div>
        </div>
</section>
@endsection
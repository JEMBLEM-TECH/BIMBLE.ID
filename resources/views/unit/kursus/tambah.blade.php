@extends('admin.layouts.tutor')

@section('title','Bimble - Data Unit Kursus')
@section('content')

@push('after-style')
<link href="{{ asset('assets/js/picker/mdtimepicker.css') }}" rel="stylesheet">
@endpush

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Kursus </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('unit.kursus.home') }}">Kursus</a></li>
                            <li class="active">Tambah Detail {{ $kursus->nama_kursus }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('status'))
@push('after-script')
<script>
    swal({
        title: "Success",
        text: "{{session('status')}}",
        icon: "success",
        button: false,
        timer: 2000
    });

</script>
@endpush
@endif

<div class="content">
    <div class="card">
        <div class="card-header">
            <strong>Tambah Detail Kursus {{ $kursus->nama_kursus }}</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('unit.kursus.update', $kursus_unit->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="">Pilih Type Kursus</label>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                                    Private
                                </label>
                                <label class="form-check-label ml-4">
                                    <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                                    Kelompok
                                </label>
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="">Hari Kursus</label>
                            <input type="date" name="" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Help text</small>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="awal">Jam Awal</label>
                                    <input type="text" id="timepicker1" class="form-control" placeholder=""
                                        aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="akhir">Jam Akhir</label>
                                    <input type="text" id="timepicker2" class="form-control" placeholder=""
                                        aria-describedby="helpId">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Harga Kursus</label>
                            <input type="number" id="biaya_kursus" name="biaya_kursus"
                                class="input-sm form-control-sm form-control"
                                value="{{ $kursus_unit->biaya_kursus != 0 ? $kursus_unit->biaya_kursus : 0 }}">
                            <div class="invalid-feedback">
                                {{$errors->first('biaya_kursus')}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('after-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/picker/mdtimepicker.js') }}"></script>
<script>
    $(document).ready(function () {

        $('#timepicker1').mdtimepicker({

            // format of the time value (data-time attribute)
            timeFormat: 'hh:mm:ss.000',

            // format of the input value
            format: 'h:mm tt',

            // theme of the timepicker
            // 'red', 'purple', 'indigo', 'teal', 'green', 'dark'
            theme: 'blue',

            // determines if input is readonly
            readOnly: true,

            // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
            hourPadding: false,

            // determines if clear button is visible  
            clearBtn: false

        });
        $('#timepicker2').mdtimepicker({

            // format of the time value (data-time attribute)
            timeFormat: 'hh:mm:ss.000',

            // format of the input value
            format: 'h:mm tt',

            // theme of the timepicker
            // 'red', 'purple', 'indigo', 'teal', 'green', 'dark'
            theme: 'blue',

            // determines if input is readonly
            readOnly: true,

            // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
            hourPadding: false,

            // determines if clear button is visible  
            clearBtn: false

        });
    });

</script>
@endpush

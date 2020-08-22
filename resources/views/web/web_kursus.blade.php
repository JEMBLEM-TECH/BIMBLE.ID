@extends('web.layouts.main')

@section('title','Bimble | Daftar Kursus')
@section('content')

<div class="container-fluid py-5 px-lg-5">

    <div class="row">
        <div class="col-lg-3 ">
            {{-- <form action="#" class="pr-xl-3">
                <div class="mb-4">
                    <label for="form_search" class="form-label">Pencarian</label>
                    <div class="input-label-absolute input-label-absolute-right">
                        <div class="label-absolute"><i class="fa fa-search"></i></div>
                        <input type="search" name="keyword" placeholder="Cari Kursus?" id="form_search"
                            class="form-control pr-4" value="{{ Request::get('keyword') }}">
                    </div>
                </div>
                
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-search mr-1"> Cari </i>
               
                </button>
            </form> --}}
            <h4 class="mb-4 mt-2">Daftar Kursus </h4>
            <div class="list-group">
                @foreach ($kursus as $item)
                <a href="{{ route('kursus.unit', $item->id) }}" class="list-group-item list-group-item-action 
                    {{ $item->nama_kursus == $kursus_unit->kursus->nama_kursus ? 'active' : '' }}">
                    {{ $item->nama_kursus }}
                </a>
                @endforeach
            
              </div>

               <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-template d-flex justify-content-center">
                    {{ $kursus->appends(Request::all())->links() }}
                </ul>
            </nav>
        </div>
        <div class="col-lg-9">
            <h4 class="mb-4  mt-2 text-center"> Unit Kursus </h4>
            <div class="row">
                <!-- venue item-->
              
                <div data-marker-id="59c0c8e322f3375db4d89128" class="col-sm-6 col-xl-4 mb-5 hover-animate">
                    <div class="card card-kelas h-100 border-0 shadow">
                        <div class="card-img-top overflow-hidden gradient-overlay">
                            <img src="{{ Storage::url('public/'. $kursus_unit->unit->gambar_unit) }}"
                                alt="{{ $kursus_unit->unit->nama_unit }}" class="img-fluid" /><a
                                href="{{ route('unit.detail.kursus',  [$kursus_unit->unit->slug,$kursus_unit->kursus->slug]) }}" class="tile-link"></a>
                            <div class="card-img-overlay-top d-flex justify-content-between align-items-center">
                                <div class="badge badge-transparent badge-pill px-3 py-2">{{ $kursus_unit->unit->nama_unit }}</div>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center">
                            <div class="w-100">
                                <h6 class="card-title"><a href="{{ route('unit.detail.kursus',  [$kursus_unit->unit->slug,$kursus_unit->kursus->slug]) }}"
                                        class="text-decoration-none text-dark">{{ $kursus_unit->unit->nama_unit }}</a></h6>
                                <div class="d-flex card-subtitle mb-3">
                                    <p class="flex-grow-1 mb-0 text-muted text-sm">{{ $kursus_unit->kursus->nama_kursus }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
               

            </div>
           
        </div>
    </div>
</div>

@endsection

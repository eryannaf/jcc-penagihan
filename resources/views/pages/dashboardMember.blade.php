@extends('layouts.app')

@section('content')


<div class="content-body" style="min-height: 788px;">
    <section class="content-header">
        <div class="container-fluid">
            <!-- End Row -->
            <div class="row">
                <div class="col-12 m-b-30">
                    <div class="row">
                        @foreach ($data as $item)
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <img class="img-fluid" src="{{ asset('/assets2/images/big/laptop.png')}}" alt="">
                                <div class="card-body">
                                    <h3 class="card-title"> {{ $item->brand }}</h3>
                                    <h5 class="card-text"> {{ $item->seri }}</h5>
                                    <p class="card-text">{{ $item->detail}}</p>
                                    <p class="card-text"><small class="text-muted">Harga Rp {{ number_format($item->harga)}}</small></p>
                                    <p class="card-text"><small class="text-muted">Stok: {{ $item->stok}}</small></p>
                                    {{-- selalu pake csrf kalo ada form --}}
                                    {{-- <form action="{{ url('/pesan/'.$item->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="member_id" value="{{ $item->id}}">
                                        <button  class="btn mb-1 btn-secondary" onclick="create()">Pesan</button>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </section>
</div>


@endsection


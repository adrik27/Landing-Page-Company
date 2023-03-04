@extends('admin.main')

@section('template')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box text-center">
                    <h4 class="mb-sm-0">{{ $tittlePage }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Image</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <img src="{{ asset('storage/'.$portfolio->image) }}" alt="" class="img-fluid d-block" />
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

            </div>
            <div class="col-lg-8">
                <form action="/portfolio/{{ $portfolio->id }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Kategori Portfolio</label>
                                <select class="form-select mb-3" aria-label="Default select example" name="kategori">
                                    @foreach ($portfolios as $portfolio)
                                    @if (!old('kategori', $portfolio->kategori) == $portfolio->kategori)
                                    <option value="{{ $portfolio->kategori }}" selected>{{ $portfolio->kategori }}
                                    </option>
                                    @else
                                    <option value="{{ $portfolio->kategori }}">{{ $portfolio->kategori }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('kategori')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                {{-- <input type="text" name="kategori" class="form-control" id="product-title-input"
                                    placeholder="Enter Kategori" value="{{ old('kategori',$portfolio->kategori) }}">
                                --}}
                            </div>
                            <div>
                                <label>Title Portfolio</label>
                                <input type="text" name="tittle" class="form-control" id="product-title-input"
                                    placeholder="Enter Title" value="{{ old('tittle',$portfolio->tittle) }}">
                                {{-- <div id="ckeditor-classic">
                                    <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material
                                        composition is 100% organic cotton. This is one of the world’s leading designer
                                        lifestyle brands and is internationally recognized for celebrating the essence
                                        of classic American cool style, featuring preppy with a twist designs.</p>
                                    <ul>
                                        <li>Full Sleeve</li>
                                        <li>Cotton</li>
                                        <li>All Sizes available</li>
                                        <li>4 Different Color</li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Portfolio Image</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <p class="text-muted">Update Portfolio Image.</p>
                                <input class="form-control" id="product-image-input" type="hidden"
                                    name="imageprodukOld">
                                <input class="form-control" id="product-image-input" type="file" name="image">
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="text-start mb-3">
                        <button type="submit" class="btn btn-success w-sm">Update</button>
                        <a href="/portfolio" class="btn btn-danger w-sm">Kembali</a>
                    </div>
                </form>
            </div>
            <!-- end col -->


        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
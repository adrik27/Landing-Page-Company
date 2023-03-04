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
                            <img src="{{ asset('storage/'.$testimoni->image) }}" alt="" class="img-fluid d-block" />
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

            </div>
            <div class="col-lg-8">
                <form action="/testimoni/{{ $testimoni->id }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Testimoni Nama Pembuat</label>
                                <input type="text" name="nama" class="form-control" id="product-title-input"
                                    placeholder="Enter Nama Pembuat" value="{{ old('nama',$testimoni->nama) }}">
                            </div>
                            <div>
                                <label>Testimoni Kutipan</label>
                                <textarea type="text" name="kutipan" class="form-control" id="product-title-input"
                                    placeholder="Enter Kutipan" value="{{ old('kutipan',$testimoni->kutipan) }}">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Testimoni Image</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <p class="text-muted">Update Testimoni Image.</p>
                                <input class="form-control" id="product-image-input" type="hidden"
                                    name="imageprodukOld">
                                <input class="form-control" id="product-image-input" type="file" name="image">
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="text-start mb-3">
                        <button type="submit" class="btn btn-success w-sm">Update</button>
                        <a href="/testimoni" class="btn btn-danger w-sm">Kembali</a>
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
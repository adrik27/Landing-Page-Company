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
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- end page title -->



        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="orderList">
                    <div class="card-header mb-2  border-0">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Portfolio Table</h5>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                    id="create-btn" data-bs-target="#showModal"><i
                                        class="ri-add-line align-bottom me-1"></i> Create
                                    Portfolio</button>

                                {{-- start tidak digunakan --}}
                                <button type="button" class="btn btn-info d-none"><i
                                        class="ri-file-download-line align-bottom me-1"></i> Import</button>
                                <button class="btn btn-soft-danger d-none" onClick="deleteMultiple()"><i
                                        class="ri-delete-bin-2-line"></i></button>
                                {{-- end tidak digunakan --}}
                            </div>
                        </div>
                    </div>

                    {{-- start tidak digunakan --}}
                    <div class="card-body border border-dashed border-end-0 border-start-0 d-none">
                        <form>
                            <div class="row g-3">
                                <div class="col-xxl-5 col-sm-6">
                                    <div class="search-box">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for order ID, customer, order status or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-2 col-sm-6">
                                    <div>
                                        <input type="text" class="form-control" data-provider="flatpickr"
                                            data-date-format="d M, Y" data-range-date="true" id="demo-datepicker"
                                            placeholder="Select date">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-2 col-sm-4">
                                    <div>
                                        <select class="form-control" data-choices data-choices-search-false
                                            name="choices-single-default" id="idStatus">
                                            <option value="">Status</option>
                                            <option value="all" selected>All</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Inprogress">Inprogress</option>
                                            <option value="Cancelled">Cancelled</option>
                                            <option value="Pickups">Pickups</option>
                                            <option value="Returns">Returns</option>
                                            <option value="Delivered">Delivered</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-2 col-sm-4">
                                    <div>
                                        <select class="form-control" data-choices data-choices-search-false
                                            name="choices-single-default" id="idPayment">
                                            <option value="">Select Payment</option>
                                            <option value="all" selected>All</option>
                                            <option value="Mastercard">Mastercard</option>
                                            <option value="Paypal">Paypal</option>
                                            <option value="Visa">Visa</option>
                                            <option value="COD">COD</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-1 col-sm-4">
                                    <div>
                                        <button type="button" class="btn btn-primary w-100" onclick="SearchData();">
                                            <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                            Filters
                                        </button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    {{-- end tidak digunakan --}}
                    <div class="card-body pt-0">
                        <div>

                            {{-- start tidak digunakan --}}
                            <ul class="nav d-none nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#home1"
                                        role="tab" aria-selected="true">
                                        <i class="ri-store-2-fill me-1 align-bottom"></i> All Orders
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3 Delivered" data-bs-toggle="tab" id="Delivered"
                                        href="#delivered" role="tab" aria-selected="false">
                                        <i class="ri-checkbox-circle-line me-1 align-bottom"></i> Delivered
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3 Pickups" data-bs-toggle="tab" id="Pickups" href="#pickups"
                                        role="tab" aria-selected="false">
                                        <i class="ri-truck-line me-1 align-bottom"></i> Pickups <span
                                            class="badge bg-danger align-middle ms-1">2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3 Returns" data-bs-toggle="tab" id="Returns" href="#returns"
                                        role="tab" aria-selected="false">
                                        <i class="ri-arrow-left-right-fill me-1 align-bottom"></i> Returns
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3 Cancelled" data-bs-toggle="tab" id="Cancelled"
                                        href="#cancelled" role="tab" aria-selected="false">
                                        <i class="ri-close-circle-line me-1 align-bottom"></i> Cancelled
                                    </a>
                                </li>
                            </ul>
                            {{-- end tidak digunakan --}}

                            <div class="table-responsive table-card mb-1">
                                <table class="table table-nowrap align-middle" id="orderTable">
                                    <thead class="text-muted table-light">
                                        <tr class="text-uppercase">
                                            <th class="sort" data-sort="id">No</th>
                                            <th class="sort" data-sort="customer_name">Image</th>
                                            <th class="sort" data-sort="product_name">Kategori</th>
                                            <th class="sort" data-sort="date">Title</th>
                                            <th class="sort" data-sort="city">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($allport as $port)
                                        <tr>
                                            <td class="id">{{ $loop->iteration }}</td>
                                            <td class="customer_name">
                                                <img src="{{ asset('storage/'). '/' . $port->image }}" height="45"
                                                    alt="">
                                            </td>
                                            <td class="date">{{ $port->kategori }}</td>
                                            <td class="product_name">{{ $port->tittle }}</td>
                                            <td>
                                                <ul class="list-inline hstack gap-2 mb-0">
                                                    <li class="list-inline-item" data-bs-toggle="tooltip"
                                                        data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                        <a href="/portfolio/{{ $port->id }}"
                                                            class="text-primary d-inline-block">
                                                            <i class="ri-eye-fill fs-16"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item edit" title="Edit">
                                                        <a href="/portfolio/{{ $port->id }}/edit"
                                                            class="text-primary d-inline-block edit-item-btn">
                                                            <i class="ri-pencil-fill fs-16"></i>
                                                        </a>
                                                    </li>

                                                    <li class="list-inline-item" data-bs-toggle="tooltip"
                                                        data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                        <form action="/portfolio/{{ $port->id }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn text-danger" data-bs-toggle="modal"
                                                                onclick="return confirm('Yakin data ingin di hapus?')">
                                                                <i class="ri-delete-bin-5-fill fs-16"></i>
                                                            </button>
                                                        </form>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
                                        </lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted">We've searched more than 150+ Orders We did
                                            not find any
                                            orders for you search.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="#">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="#">
                                        Next
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close" id="close-modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="/portfolio" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Image</label>
                                                <input type="file" name="image" id="customername-field"
                                                    class="form-control @error('image')is-invalid @enderror" required
                                                    autocomplete="off" />
                                                @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Kategori</label>
                                                <input type="text" name="kategori" id="customername-field"
                                                    class="form-control @error('kategori')is-invalid @enderror"
                                                    placeholder="Enter Kategori" value="{{ old('kategori') }}" required
                                                    autocomplete="off">
                                                @error('kategori')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Title</label>
                                                <input type="text" name="tittle" id="customername-field"
                                                    class="form-control @error('tittle')is-invalid @enderror"
                                                    placeholder="Enter Tittle" value="{{ old('tittle') }}" required
                                                    autocomplete="off" />
                                                @error('tittle')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" id="add-btn">Add
                                                        Service</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->

                        <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body p-5 text-center">
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                            colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px">
                                        </lord-icon>
                                        <div class="mt-4 text-center">
                                            <h4>You are about to delete a order ?</h4>
                                            <p class="text-muted fs-15 mb-4">Deleting your order will remove
                                                all of
                                                your information from our database.</p>
                                            <div class="hstack gap-2 justify-content-center remove">
                                                <button class="btn btn-link link-success fw-medium text-decoration-none"
                                                    data-bs-dismiss="modal"><i
                                                        class="ri-close-line me-1 align-middle"></i>
                                                    Close</button>

                                                {{-- @method('delete')
                                                @csrf --}}
                                                <button type="submit" class="btn btn-danger" id="delete-record">Yes,
                                                    Delete It</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end modal -->
                    </div>
                </div>

            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h4 class="fw-bold mb-4" style="    padding-top: 4rem !important;">
                            <span class="text-muted fw-light">Reports</span>
                        </h4>
                        <form action="" method="post">
                            @csrf
                        <div class="row mb-4">
                            <div class="col-md-4 mb-4 input-felds">
                                <div class="form-group">

                                    <small class="mb-1">Family owner name/కుటుంబ యజమాని పేరు</small>
                                    <input type="text" class="form-control" id="owner_name" placeholder="" name="owner_name">
                                </div>
                            </div>
                            <div class="col-md-4 mb-4 input-felds">
                                <div class="form-group">
                                    <small class="mb-1">House No / ఇంటి నెం</small>
                                    <input type="text" class="form-control" id="house_no" placeholder="" name="house_no">
                                </div>
                            </div>
                            <div class="col-md-4 mb-4 input-felds">
                                <div class="form-group">
                                    <small class="mb-1">Mobile Number/మొబైల్ నంబర్</small>
                                    <input type="text" class="form-control" id="mobilenumber" placeholder="" name="mobilenumber">
                                </div>
                            </div>
                            <div class="col-md-4 mb-4 input-felds">
                                <div class="form-group">
                                    <small class="mb-1">Occupation/వృత్తి</small>
                                    <select class="form-select" name="occupation" id="occupation">
                                        <option value="">-- Select --</option>


                                        @foreach ($occupation as $store)

                                        <option value="{{$store->id}}">{{$store->occupation}}/{{$store->telugu}}</option>

                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4 input-felds">
                                <div class="form-group">
                                    <small class="mb-1">Gender/లింగం</small>
                                    <select class="form-select" name="gender" id="gender">
                                        <option>-- Select --</option>
                                        <option> Male / పురుషుడు</option>
                                        <option> Female / స్త్రీ </option>
                                        <option> Others / ఇతరులు</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4 input-felds">
                                <div class="form-group">
                                    <small class="mb-1">Education Details/విద్య వివరాలు </small>
                                    <select class="form-select" name="education" id="education">
                                        <option>-- Select --</option>
                                        @foreach ($education as $value )
                                        <option value="{{$value->id}}">{{$value->education}}/{{$value->telugu}}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 float-end">
                                <button type="submit" class="btn btn-primary me-2">Search</button>
                            </div>

                        </div>
                    </form>
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-primary text-center">
                                            <th>Sl.no / క్రమసంఖ్య</th>
                                            <th>House No / ఇంటి నెం</th>
                                            <th>Address/Street అడ్రస్/వీధి</th>
                                            <th>Family Owner Name / కుటుంబ యజమాని పేరు</th>
                                            <th>Mobile Number / మొబైల్ నంబర్</th>
                                            <th>No of People / వ్యక్తుల సంఖ్య</th>
                                            <th>Edit / సవరించు</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        <tr>
                                        @foreach ($details as $data )
                                            <td>{{$i++}}</td>
                                            <td>{{$data->house_no}}</td>
                                            <td>{{$data->address}}</td>
                                            <td>{{@$data->ownerdetails->owner_name}}</td>
                                            <td>{{@$data->ownerdetails->mobilenumber}}</td>
                                            <td><a href="{{ url('wards_family_report')}}/{{@$data->ownerdetails->id}}">{{@$data->ownerdetails->familymembers_count}}</a></td>


                                             <td>
                                              {{--  <a href="{{url('wards_add_member_edit')}}/{{@$data->id}}"><i class="bx bx-edit"></i></a> --}}
                                                <a class="btn btn-success btn-sm mb-1" href="{{url('wards_house_edit')}}/{{@$data->ownerdetails->id}}">house_owner</a><br>

                                                <a class="btn btn-success btn-sm mb-1" href="{{ url('enter_service_edit')}}/{{@$data->id }}">enter_service</a><br>

                                                <a class="btn btn-success btn-sm mb-1" href="{{ url('wards_basic_edit')}}/{{@$data->id}}">basic_details</a>

                                            </td>




                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- / Content -->




                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                © 2023 ALl Rights Reserved by Ward Details.
                            </div>

                        </div>
                    </footer>
                    <!-- / Footer -->


                    <div class="content-backdrop fade"></div>
                </div>

@endsection
@push('scripts')

@endpush

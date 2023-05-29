@extends('admin.layouts.main')

@section('content')
@php
                use Carbon\Carbon;
@endphp
<div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                       <div class="row" style=" margin-top: 3rem;">
                            <div class="col-md-10">
                                <h4 class="fw-bold py-3 mb-4">
                                    <span class="">Family Reports</span>
                                </h4>
                            </div>
                            <div class="col-md-2">
                                <p class="py-3 mb-4"><a href="{{route('wards_reports')}}">Back to Reports</a></p>
                            </div>
                        </div>



                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl.no / క్రమసంఖ్య</th>
                                            <th>Name / పేరు</th>
                                            <th>Relationship<br> / సంబంధం</th>
                                            <th>Gender / లింగం</th>
                                            <th>Age / వయస్సు</th>
                                            <th>Mobile Number<br> / మొబైల్ నంబర్</th>
                                            <th>Full Details<br> / పూర్తి వివరాలు</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        <tr>
                                            @foreach ($family as $store )

                                            <td>{{$i++}}</td>
                                            <td>{{$store->member_name}}</td>
                                            <td>{{$store->relations->relation_name}}</td>
                                            <td>{{$store->gender}}</td>

                                                @php
                                                    $dob1=$store->date_of_birth;
                                                    $dob = Carbon::parse($dob1);
                                                    $now = Carbon::now();

                                        $ageInYears = $dob->diffInYears($now);
                                     $ageInMonths = $dob->diffInMonths($now);
                                   $currentAge = $dob->age;
                                      @endphp

                                            <td>{{$currentAge}}</td>
                                            <td>{{$store->mobile}}</td>
                                            <td><a href="{{url('member_full_details')}}/{{$store->id}}" class="btn btn-sm btn-primary" style="    color: white !important;">View More</a></td>
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



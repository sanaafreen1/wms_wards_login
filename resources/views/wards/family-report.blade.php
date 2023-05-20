@extends('admin.layouts.main')

@section('content')

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
                                <p class="py-3 mb-4"><a href="#">Back to Reports</a></p>
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
                                        <tr>
                                            <td>1</td>
                                            <td>Sriramula Mahesh</td>
                                            <td>Owner</td>
                                            <td>Male</td>
                                            <td>38</td>
                                            <td>9440229402</td>
                                            <td><a href="member-full-details.html" class="btn btn-sm btn-primary" style="    color: white !important;">View More</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Sriramula Indu</td>
                                            <td>Wife</td>
                                            <td>Female</td>
                                            <td>36</td>
                                            <td>9440229402</td>
                                            <td><a href="member-full-details.html" class="btn btn-sm btn-primary" style="    color: white !important;">View More</a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Sriramula Rashmitha</td>
                                            <td>Daugther</td>
                                            <td>Female</td>
                                            <td>15</td>
                                            <td>9440229402</td>
                                            <td><a href="member-full-details.html" class="btn btn-sm btn-primary" style="    color: white !important;">View More</a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Sriramula Manvitha</td>
                                            <td>Daughter</td>
                                            <td>Female</td>
                                            <td>12</td>
                                            <td>9440229402</td>
                                            <td><a href="member-full-details.html" class="btn btn-sm btn-primary" style="    color: white !important;">View More</a></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Sriramula Neehansh</td>
                                            <td>Son</td>
                                            <td>Male</td>
                                            <td>3</td>
                                            <td>9440229402</td>
                                            <td><a href="member-full-details.html" class="btn btn-sm btn-primary" style="    color: white !important;">View More</a></td>
                                        </tr>
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
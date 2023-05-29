<style>
    html:not(.layout-footer-fixed) .content-wrapper {
    padding-bottom: 0 !important;
}
.layout-content-navbar .content-wrapper {
    width: 100%;
}
.content-wrapper {
    padding-bottom: 0px !important;
}
.content-wrapper {
    display: flex;
    align-items: stretch;
    flex: 1 1 auto;
    flex-direction: column;
    justify-content: space-between;
}
</style>


@extends('admin.layouts.main')

@section('content')

   <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row" style=" margin-top: 3rem;">
                            <div class="col-md-10">
                                <h4 class="fw-bold py-3 mb-4">
                                    <span class="">Member Full Details</span>
                                </h4>
                            </div>
                            <div class="col-md-2">
                                <p class="py-3 mb-4"><a href="{{route('wards_family_report',['id' => $family->id])}}">Back to Family Reports</a></p>
                            </div>
                        </div>



                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-bordered mb-3">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <small>Member Name / సభ్యుని పేరు </small>
                                                <p><b>{{$family->member_name}}</b></p>
                                            </td>
                                            <td>
                                                <small>Family owner name / కుటుంబ యజమాని పేరు</small>
                                                <p><b>{{$family->owners->owner_name}}</b></p>
                                            </td>
                                            <td>
                                                <small>Date of Birth / పుట్టిన తేది</small>
                                                <p><b>{{$family->date_of_birth}}</b></p>
                                            </td>
                                            <td rowspan="3">
                                                <center><img style="height:100px ; width:100px;" src="{{url('/images').'/'.$family->upload_photo}}"></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small>Mobile Number / మొబైల్ నంబర్</small>
                                                <p><b>{{$family->mobile}}</b></p>
                                            </td>
                                            <td>
                                                <small>Education / చదువు </small>
                                                <p><b>{{$family->educations->education}}</b></p>
                                            </td>
                                            <td>
                                                <small>Education Details / విద్య వివరాలు </small>
                                                <p><b>{{$family->educationsdetails->edu_details }}</b></p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <small>Staying out of Town / టౌన్ వెలుపల ఉంటున్నారు  </small>
                                                <p><b>{{$family->staying_out_oftown}}</b></p>
                                            </td>
                                            <td>
                                                <small>Location of the Person / వ్యక్తి యొక్క స్థానం  </small>
                                                <p><b>{{$family->location_ofthe_person}}</b></p>
                                            </td>
                                            <td>
                                                <small>View the Details / వివరాలను నమోదు చేయండి </small>
                                                <p><b>{{$family->enter_the_details}}</b></p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <small>Occupation / వృత్తి </small>
                                                <p><b>{{$family->occupations->occupation}}</b></p>
                                            </td>
                                            <td>
                                                <small>Gender / లింగం   </small>
                                                <p><b>{{$family->gender}}</b></p>
                                            </td>
                                            <td>
                                                <small>Blood Group / రక్తపు గ్రూపు </small>
                                                <p><b>{{$family->bloodgroup->blood_group}}</b></p>
                                            </td>
                                            <td>
                                                <small>B.P / బి.పి  </small>
                                                <p><b>{{$family->b_p}}</b></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small>Sugar / షుగర్  </small>
                                                <p><b>{{$family->sugar}}</b></p>
                                            </td>
                                            <td>
                                                <small>Covid Vaccine / కోవిడ్&zwnj;కి టీకా </small>
                                                <p><b>{{$family->covid_vaccine}}</b></p>
                                            </td>
                                            <td>
                                                <small>Pension / పెన్షన్  </small>
                                                <p><b>{{$family->pension}}</b></p>
                                            </td>
                                            <td>
                                                <small>Type of Pension / పెన్షన్ రకం  </small>
                                                <p><b>{{@$family->pensions->type_of_pension}}</b></p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <div class="col-md-12">
                                    <button class="btn btn-warning float-end mb-2" onclick="window.print()">Print this page</button>
                                    <a href="{{route('wards_family_member',['id' => $family->id])}}" class="btn btn-primary float-end me-3 mb-2">Edit</a>
                                </div>
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

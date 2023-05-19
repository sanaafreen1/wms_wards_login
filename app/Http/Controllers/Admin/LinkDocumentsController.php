<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CitizenServiceMst;
use App\Models\CitizenSubServiceMst;
use App\Models\DocumentMst;
use App\Models\SubServiceDocumentMap;
use Illuminate\Support\Facades\Auth;

class LinkDocumentsController extends Controller
{
    public function linkdocument()
    {
        $service = CitizenServiceMst::where('status','=','0')->get();
        $subservice = CitizenSubServiceMst::where('status','=','0')->get();
        $document = DocumentMst::where('status','=','0')->get();
        return view('admin.link-documents',get_defined_vars());
    }

    public function getsubservice(Request $request)
    {
        $data['subservice'] = CitizenSubServiceMst::where('service_id',$request->id)->where('status','=','0')
        ->get(['sub_service_name','sub_service_id']);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required',
            'subservice' => 'required',
            'document' => 'required|array',
        ]);

          $cnt = count($request->document);
         $service= $request->service;
         $subservice = $request->subservice;
          for($i = 0; $i < $cnt; $i++)
          {
            $document = $request->document[$i];
              SubServiceDocumentMap::updateOrCreate([
                'service_id' => $service,
                'sub_service_id' => $subservice,
                'document_id' => $document
              ],
            [
                'service_id' => $service,
                'sub_service_id' => $subservice,
                'document_id' => $document,
                'created_by' => Auth::id(),
            ]);
          }

          return response()->json(['status' => 'success']);

    }

    public function edit($ser_id,$sub_id)
    {
                $document = DocumentMst::where('status','=','0')->get();
                $service=CitizenServiceMst::where('status','=','0')->get();
                $sub_service=CitizenSubServiceMst::where('status','=','0')->where('service_id',$ser_id)->get();
                $updateser=SubServiceDocumentMap::where('service_id',$ser_id)
                ->where('sub_service_id',$sub_id)->where('status','=','0')->get();
              return view('admin.edit-link-doc',get_defined_vars());
    }

    public function update(Request $request)
    {
        $request->validate([
            'service' => 'required',
            'sub_service' => 'required',
            'documents' => 'required|array',
        ]);
          $mapcnt = count($request->map_id);
          $cnt = count($request->documents);
         $service= $request->service;
         $subservice = $request->sub_service;
         if($mapcnt <= $cnt)
         {
            for($i = 0; $i < $cnt; $i++)
            {
              $document = $request->documents[$i];
              if(empty($request->map_id[$i]))
              {
                SubServiceDocumentMap::updateOrCreate([
                    'service_id' => $service,
                    'sub_service_id' => $subservice,
                    'document_id' => $document
                  ],
                [
                    'service_id' => $service,
                    'sub_service_id' => $subservice,
                    'document_id' => $document,
                    'updated_by' => Auth::id(),
                ]);
              }
              else
              {
                $map_id = $request->map_id[$i];
                SubServiceDocumentMap::updateOrCreate([
                  'id' => $map_id,
                ],
              [
                  'service_id' => $service,
                  'sub_service_id' => $subservice,
                  'document_id' => $document,
                  'updated_by' => Auth::id(),
              ]);
              }

            }
         }
         else
         {
            for($i = 0; $i < $mapcnt; $i++)
            {
              $map_id = $request->map_id[$i];
              if(empty($request->documents[$i]))
              {
                  $sts = 2;
                  $document = 0;
              }
              else
              {
                  $sts = 0;
                  $document = $request->documents[$i];
              }

                SubServiceDocumentMap::updateOrCreate([
                  'id' => $map_id,
                ],
              [
                  'service_id' => $service,
                  'sub_service_id' => $subservice,
                  'document_id' => $document,
                  'status' => $sts,
                  'updated_by' => Auth::id(),
              ]);
            }
         }


          return response()->json(['status' => 'success']);

    }

    public function delete(Request $request)
    {
        SubServiceDocumentMap::where('service_id', $request->ser_id)
        ->where('sub_service_id', $request->sub_id)->update(['status' => 2,'updated_by' => Auth::id()]);
        return response()->json(['msg' =>'Record deleted successfully..!'],201);
    }

}

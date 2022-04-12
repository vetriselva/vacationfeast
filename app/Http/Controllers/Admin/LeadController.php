<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Leads;
use App\Models\Admin\PackageInclusions;
use App\Models\Admin\PackageExclusions;
use App\Models\Admin\PaymentPolicy;
use App\Models\Admin\RefoundPolicy;
use App\Models\Admin\CanclePolicy;
use App\Models\Admin\Activity;
use App\Models\Admin\Configs;
use App\Models\Admin\DayActivity;
use App\Models\Admin\HotelData;
use App\Models\Admin\FlightData;
use App\Models\Admin\ItineraryDayactivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDF;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $role_name = Role()->role_name;
        if(auth()->user()->is_admin == 1){
            $data =  Leads::with("LeadItinary")->latest()->get();
            return view("admin.lead.lead", compact('data'));
        } else {
            $data =  Leads::with("LeadItinary")
                            ->where('created_by',user()->id)
                            ->get();
            return view("admin.lead.lead", compact('data'));
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = HotelData::all();
        $act    =  Activity::all();
        $flights    =  FlightData::all();
        return view("admin.lead.create-lead",compact('act','hotels','flights'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $r = Json_decode(Json_encode($request->input('data')));
        // if($r->routeMap) {
        //     $RouteMap = cloudinary()->upload($r->file('RouteMap',["folder" => "VecationFeast","public_id" => "v1642953803"])->getRealPath())->getSecurePath(); 
        // }
        $data   =   Leads::create([
            'pdf_name'          =>  $r->pdf_name,
            'leadNumber'        => $r->leadNumber,
            'subTitle'          => $r->subTitle,
            'packageName'       => $r->packageName,
            'placeToVisit'      => $r->placeToVisit,
            'itDate'            => Carbon::parse($r->itineraryDate)->format('Y-m-d H:i:s'),
            'itValidDate'       => Carbon::parse($r->validDate)->format('Y-m-d H:i:s'),
            'departureDate'     => Carbon::parse($r->departureDate)->format('Y-m-d H:i:s'),
            'numOfNights'       => $r->numofNights,
            'flight_id'         => 1,
            'roomType'          => $r->roomType,
            'costingNotes'      => $r->costingNote ?? "",
            // 'routeMap'          => $this->storeRouteMap(),
            'routeMap'          => $RouteMap ?? "https://res.cloudinary.com/dkgkk5wua/image/upload/v1643536228/fgoxaxhtl9i4hqck6mjb.png",
            'pack_includs'      => json_encode($r->inclusionPolicy),
            'pack_excluds'      => json_encode($r->exclusionpolicy),
            'payment_poly'      => json_encode($r->paymentPolicy),
            'refound_poly'      => json_encode($r->refundPolicy),
            'cancle_poly'       => json_encode($r->cancelPolicy),
            'created_by'        => auth()->user()->id,
        ]);
       
        foreach($r->itineraryDetail as $key => $itinerary){
            // Log::info(json_encode( $itinerary));
            $itineraryObj = $data->LeadItinary()->create([
                'activity_id'   => $itinerary->Activity  ?? "", 
                // 'DayActivity'   => $itinerary->DayActivity  ?? "", 
                'PlacesName'    => $itinerary->PlaceName ?? "",
                'Transfers'     => $itinerary->Transfers ?? "",
                'breack'        => $itinerary->Meals->breack ?? "",
                'lunch'         => $itinerary->Meals->lunch ?? "",
                'dinner'        => $itinerary->Meals->dinner ?? "",
                'others'        => $itinerary->others ?? "",
                'Tickets'       => $itinerary->Tickets ?? "",
                'days'          => $itinerary->DayCount ?? "",
            ]);
            if(!empty($itinerary->DayActivity)) {
                foreach($itinerary->DayActivity as $dayActivity){
                    $itineraryObj->itineraryDayActivities()->create(['dayactivity_id' => $dayActivity]);
                }
            }
        }
        if($r->flightDetail != null){
            foreach($r->flightDetail as $key => $flight){
                // Log::info(json_encode( $flight));
                $data->FlightsDeatils()->create([
                    'from'      => $flight->from ?? "" ,
                    'to'        => $flight->to  ?? "",
                    'flight'    => $flight->flight  ?? "",
                    'date'      => $flight->date  ?? "",
                    'dep'       => $flight->dep  ?? "",
                    'arr'       => $flight->arr  ?? "",
                    'bag'       => $flight->bag  ?? "",
                    'refound'   => $flight->refound  ?? "",
                    'meals'    => $flight->meals ?? "",
                ]);
            }
        }
        
        foreach($r->hotelDetail as $key => $hotels){
            // Log::info(json_encode( $flight));
            foreach($hotels->Details as $opton => $hotel){
                $data->HotalsDeatils()->create([
                    'city'              => $hotel->city ?? "", 
                    'hotel_id'          => $hotel->hotel ?? "",
                    'hotal_room_type'   => $hotel->hotalRoomType  ?? "",
                    'star_ratings'      => $hotel->starRating ?? "" ,
                    'hotal_night'       => $hotel->hotalNight  ?? "",
                    'HotelOptionNumber' => $key + 1?? "",
                ]);
            }
        }

        foreach($r->costDetails as $key => $costcostDetail){
            foreach($costcostDetail->Details as $option => $cost){
                $data->CostDeatils()->create([
                    'optionNumber'  => $key + 1 ?? "", 
                    'costingFor'    => $cost->costTitle  ?? "",
                    'members'       => $cost->member ?? "",
                    'costTotals'    => $cost->costTotal ?? "",
                ]);
            }
        }
        return response(['status' => true, 'id' => $data->id]);
    }


    public function storeRouteMap(Request $request)
    {
        // dd($request->input('lead_id'));
        // return $RouteMap = cloudinary()->upload($request->file('RouteMap',["folder" => "VecationFeast","public_id" => "v1642953803"])->getRealPath())->getSecurePath(); 
        // $RouteMap = cloudinary()->upload($request->file('RouteMap',["folder" => "VecationFeast","public_id" => "v1642953803"])->getRealPath())->getSecurePath(); 
        // 'routeMap'          => $RouteMap ?? "https://res.cloudinary.com/dkgkk5wua/image/upload/v1643536228/fgoxaxhtl9i4hqck6mjb.png",
        // dd( $request->file('RouteMap'));

        if($request->file('RouteMap') == null) {
            $lead = Leads::find($request->input('lead_id'));
            $lead->routeMap = 'https://res.cloudinary.com/dkgkk5wua/image/upload/v1643536228/fgoxaxhtl9i4hqck6mjb.png';
            return $lead->save();    
        } else {
            $RouteMap = cloudinary()->upload($request->file('RouteMap',["folder" => "VecationFeast","public_id" => "v1642953803"])->getRealPath())->getSecurePath(); 
            if($RouteMap){
                $lead = Leads::find($request->input('lead_id'));
                $lead->routeMap = $RouteMap;
                return $lead->save();
            }
        } 
        return false;
    }

    //  vvvvvvv good

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
       
        $data  =  Leads::with("LeadItinary", "LeadItinary.Activity")
                ->with("FlightData")
                ->with("FlightsDeatils")
                ->with("HotalsDeatils", "HotalsDeatils.HotelData")
                ->with("CostDeatils")
                ->find($id);
        $hotelDetails       =   Collect($data->HotalsDeatils)->groupBy('HotelOptionNumber');
        $costDeatils        =   Collect($data->CostDeatils)->groupBy('optionNumber');
        $paymentPolicies    =   PaymentPolicy::find( json_decode($data->payment_poly));
        $refundPolicies     =   RefoundPolicy::find( json_decode($data->refound_poly));
        $cancelPolicies     =   CanclePolicy::find( json_decode($data->cancle_poly));
        $packInclusions     =   PackageInclusions::find( json_decode($data->pack_includs));
        $packExclusions     =   PackageExclusions::find( json_decode($data->pack_excluds));
        $configs            =  Configs::first();
        
            $leadData = [ 
                'data' => $data,
                'hotelDetails' => $hotelDetails, 
                'costDeatils' => $costDeatils, 
                'paymentPolicies' => $paymentPolicies, 
                'refundPolicies' => $refundPolicies, 
                'cancelPolicies' => $cancelPolicies, 
                'packInclusions' => $packInclusions, 
                'packExclusions' => $packExclusions, 
                'configs' => $configs, 
            ];

         
          
        $pdf = PDF::loadView('myPDF', $leadData);
        return $pdf->download($data->pdf_name ?? "vacation feast ".'.pdf');
    }
    public function show($id)
    {
        

        $data =  Leads::with("LeadItinary", "LeadItinary.Activity")
                        ->with("FlightData")
                        ->with("FlightsDeatils")
                        ->with("HotalsDeatils", "HotalsDeatils.HotelData")
                        ->with("CostDeatils")
                        ->find($id);
                    
        if(empty($data)){
            return redirect(route('lead'))->with('error','Item not found!');
        }
        $hotelDetails = Collect($data->HotalsDeatils)->groupBy('HotelOptionNumber');
        $costDeatils = Collect($data->CostDeatils)->groupBy('optionNumber');
        $paymentPolicies = PaymentPolicy::find( json_decode($data->payment_poly));
        $refundPolicies = RefoundPolicy::find( json_decode($data->refound_poly));
        $cancelPolicies = CanclePolicy::find( json_decode($data->cancle_poly));
        $packInclusions = PackageInclusions::find( json_decode($data->pack_includs));
        $packExclusions = PackageExclusions::find( json_decode($data->pack_excluds));
        $configs =  Configs::first();

        return view("admin.lead.show-lead",compact('configs','data','hotelDetails', 'costDeatils','paymentPolicies', 'refundPolicies','cancelPolicies','packInclusions','packExclusions'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pack_in    =  PackageInclusions::all();
        $pack_ex    =  PackageExclusions::all();
        $pay_poly   =  PaymentPolicy::all();
        $refo_poly  =  RefoundPolicy::all();
        $can_poly   =  CanclePolicy::all();
        $act        =  Activity::all();
        $data =  Leads::with("LeadItinary", "LeadItinary.Activity")
                        ->with("FlightData")
                        ->with("FlightsDeatils")
                        ->with("HotalsDeatils", "HotalsDeatils.HotelData")
                        ->with("CostDeatils")
                        ->find($id);
        return view("admin.lead.edit",compact('data','pack_in','pack_ex','pay_poly','refo_poly','can_poly','act'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =  Leads::with("LeadItinary", "LeadItinary.Activity")
                    ->with("FlightData")
                    ->with("FlightsDeatils")
                    ->with("HotalsDeatils", "HotalsDeatils.HotelData")
                    ->with("CostDeatils")
                    ->find($id);
        $data ->delete();
        return back()->with('success','Item deleted successfully!');
    }
}

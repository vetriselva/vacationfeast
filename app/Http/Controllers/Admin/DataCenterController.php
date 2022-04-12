<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\PackageInclusions;
use App\Models\Admin\PackageExclusions;
use App\Models\Admin\PaymentPolicy;
use App\Models\Admin\RefoundPolicy;
use App\Models\Admin\Activity;
use App\Models\Admin\CanclePolicy;
use App\Models\Admin\City;
use App\Models\Admin\Configs;
use App\Models\Admin\DayActivity;
use App\Models\Admin\HotelData;
use App\Models\Admin\FlightData;
use App\Models\Admin\Place;
use App\Models\Admin\State;

class DataCenterController extends Controller
{
    public function index(Request $r , $type)
    {
        if($type == 'Itinerary') {
            $act        =  Activity::latest()->get();
            return view("admin.data-center.itinary",compact('act'));
        }
        else if($type == 'Hotels') {
            $hot        =  HotelData::with(['state','city'])->get();
            $cities     =  City::get();
            $states     =  State::get();
            return view("admin.data-center.hotel",compact('hot','cities','states'));
        }
        else if($type == 'Flights') {
            $hot        =  FlightData::latest()->get();
            return view("admin.data-center.flight",compact('hot'));
        }

        else if($type == 'Package_Inclusions') {
            $hot        =  PackageInclusions::latest()->get();
            return view("admin.data-center.PackageInclusions",compact('hot'));
        }
        else if($type == 'Package_Exclusions') {
            $hot        =  PackageExclusions::latest()->get();
            return view("admin.data-center.PackageExclusions",compact('hot'));
        }
        else if($type == 'Payment_Policy') {
            $hot        =  PaymentPolicy::latest()->get();
            return view("admin.data-center.PaymentPolicy",compact('hot'));
        }
        else if($type == 'Refound_Policy') {
            $hot        =  RefoundPolicy::latest()->get();
            return view("admin.data-center.RefoundPolicy",compact('hot'));
        }
        else if($type == 'Cancel_Policy') {
            $hot        =  CanclePolicy::latest()->get();
            return view("admin.data-center.CanclePolicy",compact('hot'));
        }
        else if($type == 'State') {
            $hot        =  State::latest()->get();
            return view("admin.data-center.State",compact('hot'));
        }
        else if($type == 'City') {
            $hot        =  City::with('state')->latest()->get();
            $states     = State::get();
            return view("admin.data-center.City",compact('hot','states'));
        }
        else if($type == 'Place') {
            $hot        =  Place::with(['state','city'])->latest()->get();
            $cities     =  City::get();
            $states     =  State::get();
            return view("admin.data-center.Place",compact('hot','cities','states'));
        }

        else if($type == 'Activities') {
            $hot          =  Activity::with(['state','city'])->latest()->get();
            $cities       =  City::get();
            $states       =  State::get();
            return view("admin.data-center.Activities",compact('hot','cities','states'));
        }

        else if($type == 'DayActivities') {
            $hot          =  DayActivity::with(['state','city'])->latest()->get();
            $cities       =  City::get();
            $states       =  State::get();
            return view("admin.data-center.DayActivities",compact('hot','cities','states'));
        }

        else if($type == 'Configs') {
            $hot          =  Configs::get();
            return view("admin.data-center.Configs",compact('hot'));
        }

    }
    public function store(Request $r, $type)
    {
        if($type == 'Activities_store') {
            // dd($r->all());
            $data   =    new Activity;
            $data -> city_id  = $r->  city_id;
            $data -> state_id = $r->  state_id;
            $data -> title    = $r->  title;
            $data->save();
            return back()->with('success','Created Successfully!');
        }

        else if($type == 'DayActivites_store') {
            if($r->image) {
                $img = cloudinary()->upload($r->file('image',["folder" => "VecationFeast","public_id" => "v1642953803"])->getRealPath())->getSecurePath(); 
            }
            $data   =    new DayActivity;
            $data -> city_id    = $r->  city_id;
            $data -> state_id   = $r->  state_id;
            $data -> title      = $r->  title; 
            $data -> image      =  $img;
            $data -> content    = $r->  content;
            $data->save();
            return back()->with('success','Created Successfully!');
        }

        else if($type == 'Hotel_store') {
            if($r->image) {
                $img = cloudinary()->upload($r->file('image',["folder" => "VecationFeast","public_id" => "v1642953803"])->getRealPath())->getSecurePath(); 
            }
            $data   =    new HotelData;
            $data->city_id     = $r->city_id;
            $data->state_id    = $r->state_id;
            $data -> name      = $r->  name;
            $data -> location  = $r->  location;
            $data -> image      =  $img;
            $data->save();
            return back()->with('success','Created Successfully!');
        }

        else if($type == 'Flight_store') {
             if($r->image) {
                $img = cloudinary()->upload($r->file('image',["folder" => "VecationFeast","public_id" => "v1642953803"])->getRealPath())->getSecurePath(); 
            }
            $data   =    new FlightData;
            $data -> name   = $r->  name;
            $data -> image  = $img;
            $data->save();
            return back()->with('success','Created Successfully!');
        }
        else if($type == 'Pack_inclu_store') {
            $act    = new PackageInclusions;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Created Successfully!');
        }
        else if($type == 'Pack_exclu_store') {
            $act    = new PackageExclusions;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Created Successfully!');
        }
        else if($type == 'pay_pol_store') {
            $act    = new PaymentPolicy;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Created Successfully!');
        }
        else if($type == 'Refound_Policy_store') {
            $act    = new RefoundPolicy;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Created Successfully!');
        }
        else if($type == 'Cancel_Policy_store') {
            $act    = new CanclePolicy;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Created Successfully!');
        }
        else if($type == 'state_store') {
            $validated = $r->validate([
                'state_name' => 'required|unique:states|max:255',
            ]);
            $state        =  new State();
            $state->state_name = $r->state_name;
            $state->save();
            return back()->with('success','Created Successfully!');
        }
        else if($type == 'city_store') {
            $validated = $r->validate([
                'city_name' => 'required|unique:cities|max:255',
            ]);
            $city            =  new City();
            $city->state_id  = $r->state_id;
            $city->city_name = $r->city_name;
            $city->save();
            return back()->with('success','Created Successfully!');
        }

        else if($type == 'place_store') {
            $validated = $r->validate([
                'place_name' => 'required|unique:place_names|max:255',
            ]);
            $place             =  new Place();
            $place->city_id    = $r->city_id;
            $place->state_id   = $r->state_id;
            $place->place_name = $r->place_name;
            $place->save();
            return back()->with('success','Created Successfully!');
        }
        
    }
    public function destroy(Request $r, $id, $type)
    {
        if($type == 'Activities_delete') {
            $act    =  Activity::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }

        else if($type == 'DayActivities_delete') {
            $act    =  DayActivity::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }

        else if($type == 'Hotel_delete') {
            $act    =  HotelData::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'Flight_delete') {
            $act    =  FlightData::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'Pack_inclu_delete') {
            $act    =  PackageInclusions::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'Pack_exclu_delete') {
            $act    =  PackageExclusions::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }

        else if($type == 'pay_pol_delete') {
            $act    =  PaymentPolicy::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'Refound_Policy_delete') {
            $act    =  RefoundPolicy::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'Cancel_Policy_delete') {
            $act    =  CanclePolicy::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'state_delete') {
            $act    =  State::find($id);
            if($act->city()->exists()){
                return back()->with('error','This item linked with other item!');
            }
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'city_delete') {
            $act    =  City::find($id);
            if($act->place()->exists()){
                return back()->with('error','This item linked with other item!');
            }
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'place_delete') {
            $act    =  Place::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
    }
    public function update(Request $r, $id, $type)
    {
        if($type == 'Activities_update') {
            $act    =  Activity::find($id);
            $act    -> city_id    = $r->  city_id;
            $act    -> state_id   = $r->  state_id;
            $act    -> title      = $r->  title;
            $act    ->save();
            return redirect(route('data-center','Activities'))->with('success','Updated Successfully!');
        }

        if($type == 'DayActivities_update') {
            if($r->image) {
                $img = cloudinary()->upload($r->file('image',["folder" => "VecationFeast","public_id" => "v1642953803"])->getRealPath())->getSecurePath(); 
            }
            $data   =    DayActivity::find($id);
            $data -> state_id   = $r->  state_id;
            $data -> city_id    = $r->  city_id;
            $data -> title      = $r->  title; 
            if($r->image) {
                $data -> image     = $img ;
            }
            $data -> content    = $r->  content;
            $data->save();
            return redirect(route('data-center','DayActivities'))->with('success','Updated Successfully!');
        }

        if($type == 'Hotel_update') {
            if($r->image) {
                $img = cloudinary()->upload($r->file('image',["folder" => "VecationFeast","public_id" => "v1642953803"])->getRealPath())->getSecurePath(); 
            }
            $data   =    HotelData::find($id);
            $data->city_id     = $r->city_id;
            $data->state_id    = $r->state_id;
            $data -> name      = $r->  name;
            $data -> location  = $r->  location;
           
            if($r->image) {
                $data -> image     = $img ;
            }
            $data->save();
            return redirect(route('data-center','Hotels'))->with('success','Updated Successfully!');
        }

        if($type == 'Flight_update') {
            if($r->image) {
                $img = cloudinary()->upload($r->file('image',["folder" => "VecationFeast","public_id" => "v1642953803"])->getRealPath())->getSecurePath(); 
            }
            $data   =    FlightData::find($id);
            $data -> name      = $r->  name;
            if($r->image) {
                $data -> image     = $img ;
            }
            $data->save();
            return back()->with('success','Updated Successfully!');
        }
        if($type == 'Pack_inclu_update') {
            $act    = PackageInclusions::find($id);
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Updated Successfully!');
        }
        if($type == 'Pack_exclu_update') {
            $act    = PackageExclusions::find($id);
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Updated Successfully!');
        }
        if($type == 'pay_pol_update') {
            $act    =  PaymentPolicy::find($id);
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Updated Successfully!');
        }
        if($type == 'Refound_Policy_update') {
            $act    =  RefoundPolicy::find($id);
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Updated Successfully!');
        }
        if($type == 'Cancel_Policy_update') {
            $act    =  CanclePolicy::find($id);
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Updated Successfully!');
        }
        if($type == 'state_update') {
            $state        = State::find($id);
            $state->state_name = $r->state_name;
            $state->save();
            return back()->with('success','Updated Successfully!');
        }
        if($type == 'city_update') {
            $act    =  City::find($id);
            $act->state_id = $r->state_id;
            $act->city_name = $r->city_name;
            $act->save();
            return back()->with('success','Updated Successfully!');
        }
        if($type == 'place_update') {
            $act    =  Place::find($id);
            $act->city_id = $r->city_id;
            $act->state_id = $r->state_id;
            $act->place_name = $r->place_name;
            $act->save();
            return redirect(route('data-center','Place'))->with('success','Updated Successfully!');
        }
        if($type == 'Configs_update') {
            $act    =  Configs::find($id);
            $act->bank_name = $r->bank_name;
            $act->account_holder_name = $r->account_holder_name;
            $act->account_number = $r->account_number;
            $act->branch_name = $r->branch_name;
            $act->ifsc_code = $r->ifsc_code;
            $act->save();
            return back()->with('success','Updated Successfully!');
        }
    }

    public function editDayActivity($id)
    {
       $dayActivity =  DayActivity::with(['state','city'])->find($id);
       return view('admin.data-center.modal.day-activity', compact('dayActivity'));
    }

    public function editActivity($id)
    {
       $activity =  Activity::with(['state', 'city'])->find($id);
       return view('admin.data-center.modal.activity', compact('activity'));
    }

    public function editPlace($id)
    {
       $place =  Place::with(['state', 'city'])->find($id);
       return view('admin.data-center.modal.place', compact('place'));
    }

    public function editHotel($id)
    {
       $hot =  HotelData::with(['state', 'city'])->find($id);
       return view('admin.data-center.modal.hotel', compact('hot'));
    }

    
}

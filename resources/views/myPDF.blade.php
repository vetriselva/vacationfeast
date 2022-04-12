    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://ejnarstudios.com/clients/VF-application/public/assets/css/style.css" id="main-style-link">
        {{-- <link href="https://ejnarstudios.com/clients/VF-application/public/css/print.css" rel="stylesheet">  --}}
        <link href="https://ejnarstudios.com/clients/VF-application/public/css/custom.css" rel="stylesheet"> 
        
        {{-- <link href="{{ asset('public//public/css/app.css') }}" rel="stylesheet"> 
        <link href="{{ asset('public//public/css/print.css') }}" rel="stylesheet"> 
        <link href="{{ asset('public//public/css/custom.css') }}" rel="stylesheet">  --}}
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            .li {
                line-height: 35px !important;
                text-align: left !important;
                font-size: 22px !important;
                text-decoration: none !important;
                text-decoration: unset !important
            }
            @page { 
                size: auto;
                margin-top: 150px !important;
                margin-bottom: 90px !important;
                margin-right:  0 !important;
                margin-left: 0 !important;
            
            }
            @media print {
                img {
                    object-fit:cover !important
                }
            }
            
            header { 
                position: fixed;
                left: 0px;
                right: 0px;
                height: 60px;
                margin-top: -150px;
                width:  100% !important
            }
            footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width:  100% !important;
                margin-bottom: -80px;
            }
            /* header, footer {
                border:red 1px solid !important
            } */
            .border-og {
                border-bottom: 2px solid #404142 !important;
                color: #404142 !important
            }
            .border-og-y {
                border-bottom: 2px solid #404142 !important;
                border-top: 2px solid #404142 !important;
                color: #404142 !important
            }
            .row {
                display:  flex !important;
                -webkit-display: flex;
                -moz-display: flex;
                -ms--display: flex;
            }
            .table-centered tr th,td {
                vertical-align: middle !important;
            }
            .heading-1 {
                font-size: 14px !important;
                font-weight: bold;
                color: #404143 !important;
                text-transform: uppercase !important;
            }
            .f-14 {
                font-size: 14px !important;
            }
            .heading-1 span  {
                color: #404143 !important;
            }
            main {
                padding: 0 100px !important
            }
            .text-upper {
                text-transform: uppercase !important
            }
            .heading-3, .li {
                font-size: 14px !important
            }
            .table-paddingless  tr th{
                padding:   0 !important;
                
            }
            .table-paddingless  tr td{
                padding:  10px 0 !important;
            }
            .border-dark{
                border: 1px solid #404142 !important
            }
            .perpage {
                min-height: 100vh   ;
                display: flex;
                justify-content: space-around;
                align-items: center;
                flex-direction: column;
            }
            .icon {
                width: 30px !important;
            }
            .box {
                min-width: 20%;
            }
        
            .flex-box {
                width: 100% !important;
            }

            #ul_o {
                display: inline-flex;
                background-color: gray;
                width: 100%;
                justify-content: space-around;
                flex-wrap: wrap;
            }
            #ul_o div {
                background-color: red;
                width: 30px;
            }
            * {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important
            }
            u {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important
            }
            body {
                background: white !important
            }
        </style>
    </head>
    <body>  
        <header class="w-100" style="margin-bottom: 200px">
            <img src="{{ public_path('images\header.png') }}" alt="header" class="w-100">
        </header> 

        <main>
            {{--================== Ropup Map Page ============== --}}
                <table class="table m-0">
                    <tr class="border-og-y">
                        <td>
                            <div class="heading-1 text-upper text-center"> {{ $data->packageName }}</div>
                        </td>
                    </tr>
                </table> 
                <table class="table table-centered m-0">
                    <tr> 
                        <td> 
                            <table class="table table-borderless m-0 ">
                                <tr>
                                    <td><strong class="text-uppercase heading-3">{!! date('d M y', strtotime($data->itDate)) !!} </strong></td>
                                    <td></td>
                                    <td class="text-right" style="text-align: right !important"><strong class="text-uppercase heading-3">Validity {!! date('d M y', strtotime($data->itValidDate)) !!} </strong></td>
                                </tr>
                                <tr>
                                    <td width="130px" style="color:#404142 !important;padding: 0 !important; font-weight:normal !important"  class="f-14 text-uppercase heading-3">Tour Name</td>
                                    <td style="padding: 0 !important">:</td>
                                    <td style="padding: 0 !important"><strong class="f-14 heading-3"> {{ $data->placeToVisit }}</strong></td>
                                </tr>
                                <tr>
                                    <td width="160px" style="color:#404142 !important;padding: 0 !important; font-weight:normal !important"  class="f-14 text-uppercase heading-3">Departure Date</td>
                                    <td style="padding: 0 !important">:</td>
                                    <td style="padding: 0 !important"><strong class="f-14 heading-3">{!! date('d M y', strtotime($data->departureDate)) !!}  </strong></td>
                                </tr>
                                <tr>
                                    <td width="130px" style="color:#404142 !important;padding: 0 !important; font-weight:normal !important"  class="f-14 text-uppercase heading-3">No.of Nights</td>
                                    <td style="padding: 0 !important">:</td>
                                    <td style="padding: 0 !important"><strong class="f-14 heading-3">{{ $data->numOfNights - 1 }} Night  | {{ $data->numOfNights }} Days</strong></td>
                                </tr>
                                <tr >
                                    <td width="130px" style="color:#404142 !important;padding: 0 !important; font-weight:normal !important" class="f-14 text-uppercase heading-3">Room Type</td>
                                    <td style="padding: 0 !important">:</td>
                                    <td style="padding: 0 !important"><strong class="f-14 heading-3">{{ $data->roomType }}</strong></td>
                                </tr>
                            </table>
                        </td>
                        
                    </tr>
                </table>
                <table class="table">
                    <tr class="border-og-y">
                        <td>
                            <div class="heading-1 text-upper text-center"> VISIT {{ $data->subTitle }}</div>
                        </td>
                    </tr>
                </table> 
                <div class="text-center w-100 p-0"> 
                    <h1 class="text-center my-3 h1 heading-1"><u>ROUTE MAP</u></h1>
                    
                    <div style="height:550px;width:100%;background:url('{{ $data->routeMap }}');background-size:cover;background-position:center center">

                    </div>
                </div> 
                <br>
                <br>
    
            {{--================== Ropup Map Page ============== --}}

            {{-- =========== Flights Deatils =============== --}}
                @if (  $data->FlightsDeatils->count() > 0)
                    <div class="perpage">
                        <div>
                            <div class="w-100 p-2 mb-3 ">
                                <div class="heading-1 text-center mb-3"><span class="border-og pb-2">FLIGHT DETAILS </span></div>
                                {{-- <div class="heading-1 text-center mb-3"><span class="border-og pb-2">FLIGHT DETAILS IN {{ $data->FlightData->name }}</span></div> --}}
                                <img src="{{ $data->FlightData->image }}" alt="routemap"class="w-100 p-2 py-3" style="height:400px!important;object-fit: cover">
                            </div>
                            <div class="text-center w-100 p-2">
                                <table class="table table-paddingless  m-0 table-bordered">
                                    <thead class="bg-green">
                                        <tr class="text-center">
                                            <th class="heading-3 p-2 border-dark text-center">FROM</th>
                                            <th class="heading-3 p-2 border-dark text-center">TO</th>
                                            <th class="heading-3 p-2 border-dark text-center">FLIGHT</th>
                                            <th class="heading-3 p-2 border-dark text-center">DATE</th>
                                            <th class="heading-3 p-2 border-dark text-center">DEP</th>
                                            <th class="heading-3 p-2 border-dark text-center">ARR</th>
                                            <th class="heading-3 p-2 border-dark text-center">BAG</th>
                                            <th class="heading-3 p-2 border-dark text-center">REF</th>
                                            <th class="heading-3 p-2 border-dark text-center"><small>MEALS</small></th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @foreach ($data->FlightsDeatils as $key => $it)
                                            <tr class="text-center">
                                                <td class="text-center p-0 border-dark" style="font-size: 13px !important">{{ $it->from }}</td>
                                                <td class="text-center p-0 border-dark" style="font-size: 13px !important">{{ $it->to }}</td>
                                                <td class="text-center p-0 border-dark" style="font-size: 13px !important">{{ $it->flight }}</td>
                                                <td class="text-center p-0 border-dark" style="font-size: 13px !important; text-transform:uppercase"> {!! date('d M y', strtotime($it->date)) !!} </td>
                                                <td class="text-center p-0 border-dark"><small style="font-size: 12px !important">{{ $it->dep }}</small></td>
                                                <td class="text-center p-0 border-dark"><small style="font-size: 12px !important">{{ $it->arr }}</small></td>
                                                <td class="text-center p-0 border-dark"><small style="font-size: 12px !important">{{ $it->bag }} <small>KG</small></small></td>
                                                <td class="text-center p-0 border-dark"> 
                                                    @if ($it->refound ==  '1')
                                                        <img src="{{ public_path('images\check.png') }}" style="width: 10px !important" alt="">
                                                        @else
                                                        <img src="{{ public_path('images\no.png') }}" style="width: 10px !important" alt="">
                                                    @endif
                                                </td>
                                                <td class="text-center p-0 border-dark">
                                                    @if ($it->meals ==  '1')
                                                        <img src="{{ public_path('images\check.png') }}" style="width: 10px !important" alt="">
                                                        @else
                                                        <img src="{{ public_path('images\no.png') }}" style="width: 10px !important" alt="">
                                                    @endif 
                                                </td>
                                            </tr> 
                                        @endforeach
                                    </tbody>
                                </table> 
                            </div>
                            <br>
                            <div style="display: block">
                                <div style="float: left">
                                    <small><strong>BAG</strong> - BAGGAGE</small><br>
                                    <small><strong>REF</strong> - REFUNDABLE</small><br>
                                </div>
                                <div style="float: right;text-align:right !important">
                                    <small> REFUNDABLE </small> <img src="{{ public_path('images\check.png') }}" style="width: 15px !important;margin-left:10px;margin-top:10px" alt=""><br>
                                    <small> NON REFUNDABLE </small><img src="{{ public_path('images\no.png') }}" style="width: 15px !important;margin-left:10px;margin-top:10px" alt=""> 
                                </div>
                            </div>
                        </div> 
                    </div>  
                @endif
            {{-- =========== Flights Deatils =============== --}}

            {{-- ============= Itnary Details ============== --}}
                <div class="perpage">
                    @foreach ($data->Leaditinary as $key  =>  $it)
                        <div  class="h-100">
                            <div class="w-100 p-2   "> 
                                
                                @if ($key == 0)
                                    <div class="text-center">
                                        <span class="border-og" style="text-transform: uppercase !important; font-weight:bold !important">Tour itinerary</span>
                                    </div>
                                    <br>
                                    <br>
                                @endif
                                @php
                                    $places_name    =   \DB::table('places')->where("id", $it->PlacesName)->first();
                                @endphp
                                <div>
                                    <strong  class="f-14 heading-3">DAY {{ $it->days }} | {{ $places_name->place_name }} </strong>
                                </div> 
                                <div>
                                    <strong  class="f-14 heading-3">DAY ACTIVITY : {{ $it->Activity->title }} </strong>
                                </div>
                                <br>
                            </div>
                        
                            <table class="table m-0">
                                <tr >
                                    @foreach ($it->itineraryDayActivities as $itineraryDay)
                                        <td class="p-2" style="width: 100% !important; vertical-align:start !important">
                                            {{-- <div class="text-center w-100p-0">
                                                <img src="{{ $itineraryDay->dayActivity->image }}" alt="routemap" class="w-100 rounded shadow" >
                                            </div>
                                            <p class="list-group-item" style="text-align: justify">{{ $itineraryDay->dayActivity->content }}</p> --}}
                                            <img src="{{ $itineraryDay->dayActivity->image }}" alt="routemap" class="w-100 rounded shadow">
                                            <div class="py-3" style="text-align: justify !important">
                                                {{ $itineraryDay->dayActivity->content }}
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                            </table>
                            <div class="w-100">
                                <div class="btn-group flex-box bg-light pt-3 text-center " style="box-shadow:0 0 10px gray !important">
                                    <div class="btn box">
                                        <div>
                                            <img src="{{ public_path('images\icons\food.png') }}"  class="icon">
                                        </div>
                                        <strong>                                    
                                            {{ $it->breack ? "Breakfast," : ""}}
                                            {{ $it->lunch ? " Lunch,  " : ""}}
                                            {{ $it->dinner ? " Dinner " : ""}}
                                        </strong>
                                    </div>
                                    @if ($it->Transfers != null)
                                        <div class="btn box">
                                            <div>
                                                <img src="{{ public_path('images\icons\van.png') }}"  class="icon">
                                            </div>
                                            <strong>
                                                Transfers
                                            </strong>
                                        </div>
                                    @endif
                                    @if ($it->Tickets != null)
                                        <div class="btn box">
                                            <div>
                                                <img src="{{ public_path('images\icons\ticket.png') }}"  class="icon">
                                            </div>
                                            <strong>
                                                Tickets
                                            </strong>
                                        </div>
                                    @endif                            
                                </div>  
                                @if (!empty($it->others))
                                    <div class="col-12 mt-3 p-0">
                                        <div class="heading-4"><b>Notes</b> : {{ $it->others }}</div>
                                    </div> 
                                @endif
                            </div> 
                        </div>
                    @endforeach 
                    {{-- <div class="heading-3">END OF SERVICE</div> --}}
                </div>
            {{-- ============= Itnary Details ============== --}}

            {{-- ================ Hotels Details ================== --}}
                <div class="perpage"> 
                    
                    <div class="heading-1 text-center mb-5"><span class="border-og pb-2">   Hotel Details </span></div>

                    @foreach ($hotelDetails  as $key => $hotels)
                        <div class="h-100x">
                            <h1 class="text-center mb-3 h1 f-16 heading-2">Option {{$key ?? ''}}</h1> 
                            <div class="btn-group w-100 m-0 my-2 text-center">
                                @foreach ($hotels as $key => $hot)
                                    <div style="width:280px" class="btn border-0 shadow-0 text-center p-0 m-1 mb-0">
                                        <div class="heading-3 text-center">{{$hot->HotelData->name}}</div>
                                        <div style="height: 220px;width:270px;background:url('{{ $hot->HotelData->image }}');background-size:cover"></div> 
                                    </div> 
                                @endforeach
                            </div> 
                            <div class="w-100">
                                <table class="table table-paddingless  m-0 table-bordered">
                                    <tr class="bg-green">
                                        <th class="heading-3  border-dark text-center">CITY</th>
                                        <th class="heading-3  border-dark text-center">HOTEL</th>
                                        <th class="heading-3  border-dark text-center">ROOM TYPE</th>
                                        <th class="heading-3  border-dark text-center">STAR</th>
                                        <th class="heading-3  border-dark text-center">NIGHTS</th>
                                    </tr>
                                    @foreach ($hotels as $hot)
                                        <tr>
                                            <td class="text-center border-dark content-2">{{ $hot->HotelData->name }}</td>
                                            <td class="text-center border-dark content-2">{{ $hot->city }}</td>
                                            <td class="text-center border-dark content-2">{{ $hot->hotal_room_type }}</td>
                                            <td class="text-center border-dark content-2">{{ $hot->hotal_night }}</td>
                                            <td class="text-center border-dark content-2">{{ $hot->star_ratings }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    @endforeach
                </div>
            {{-- ================ Hotels Details ================== --}}
        
            <div style="display: flex; justify-content:center;align-items:center;min-height:100vh;postion:relative">
                <div class="w-100" style="position: absolute;transform:translate(-50%,-50%);left:50%;top:50%">
                    <div class="heading-1 text-center mb-3"><span class="border-og pb-2">   Cost Details </span></div><br><br>
                    @foreach ($costDeatils as $key => $costDeatil)
                        <div class="w-100 my-4" >
                            <h1 class="text-center mb-3 h1 f-16 heading-2">Option {{$key ?? ''}}</h1> 
                            <div class="col-8 mx-auto">
                                <table class="table table-borderlessx my-2">
                                    @foreach ($costDeatil as $key => $cost)
                                        <tr>
                                            <td  class="text-centr py-2"> {{ $cost->costingFor }}  {{ $cost->members }} </td> 
                                            <td>- <span  class="text-danger"> {{ $cost->costTotals ?? 0 }} INR /- </span></td>
                                        </tr>
                                    @endforeach
                                    @php
                                        $totalCost = 0;
                                        foreach ($costDeatil as $key => $cost) {
                                            if($cost->costTotals != '' && !is_null($cost->costTotals)) {
                                                $totalCost += $cost->costTotals ;
                                            }
                                        }
                                    @endphp
                                     <tr>
                                        <td style="font-size: 18px !important"  class="text-centr py-2"> <b>TOTAL COST PER COUPLE</b> </td> 
                                        <td style="font-size: 18px !important">- <span  class="text-danger"><b> INR {{ $totalCost }}</b> /-</span></td>
                                    </tr>
                                </table> 
                            </div>
                            <br>
                            <br>
                            <br>
                        </div>
                    @endforeach
                </div>
               
            </div>

            
            <div class="perpage">
                <div class="heading-1 text-center  mb-3"><span class="border-og pb-2">Package Inclusions</span></div>

                    <ol>
                        @if (!empty($packInclusions))
                            @foreach ($packInclusions as $packInclusion)
                                    <li>{{ $packInclusion->point }}</li>
                            @endforeach 
                        @endif
                    </ol>

            
                    <div class="heading-1 text-center  mb-3"><span class="border-og pb-2">Package Exclusions</span></div>

                    <ol>
                        @if (!empty($packExclusions))
                            @foreach ($packExclusions as $packExclusion)
                                    <li>{{ $packExclusion->point }}</li>
                            @endforeach 
                        @endif
                    </ol>
            
                    <div class="heading-1 text-center  mb-3"><span class="border-og pb-2"> PAYMENT POLICY</span></div>

                    <ol>
                        @if (!empty($paymentPolicies))
                            @foreach ($paymentPolicies as $paymentPolicy)
                                    <li>{{ $packExclusion->point }}</li>
                            @endforeach 
                        @endif
                    </ol>

                
                    <div class="heading-1 text-center  mb-3"><span class="border-og pb-2"> REFUND POLICY</span></div>
                    <ol>
                        @if (!empty($refundPolicies))
                            @foreach ($refundPolicies as $refundPolicy)
                                <li>
                                        {{ $refundPolicy->point }}
                                </li>
                            @endforeach 
                        @endif
                    </ol> 

                    <div class="heading-1 text-center mb-3"><span class="border-og pb-2">  CANCELLATION POLICY</span></div>
                    <ol>
                        @if (!empty($cancelPolicies))
                            @foreach ($cancelPolicies as $cancelPolicy)
                            <li>{{ $cancelPolicy->point }}</li>
                            @endforeach 
                        @endif
                    </ol>  
            </div>
            

           <div class="perpage" style="display: flex; justify-content:center;align-items:center;min-height:100vh;postion:relative">
            <div style="position: absolute;transform:translate(-50%,-50%);left:50%;top:50%">
            <div class="w-100  p-3 border bg-lisght rounded ">
                <div>
                 @if ($configs)
                        <center>
                            <img src="{{ public_path('images\scanner.png') }}" class="mx-auto" style="width: 200px !important">
                        </center>
                    <br>
                    <br>
                     <div class="heading-1 mb-3"><span class="border-og pb-2"> Bank Details</span></div>
                         <table class="table m-0 table-bordered">
                             <tr>
                                 <td style="width: 250px;font-weight:bold !important">Bank Name</td>    
                                 <td style="width: 25px !important"> :</td>
                                 <td>{{$configs->bank_name}} </td>
                             </tr>
                             <tr>
                                 <td style="width: 250px;font-weight:bold !important">Account Holder Name</td>
                                 <td style="width: 25px !important"> :</td>
                                 <td>{{$configs->account_holder_name}}</td>
                             </tr>
                             <tr>
                                 <td style="width: 250px;font-weight:bold !important">Account Number</td>
                                 <td style="width: 25px !important"> :</td>
                                 <td>{{$configs->account_number}}</td>
                             </tr>
                             <tr>
                                 <td style="width: 250px;font-weight:bold !important"> Branch Name </td>
                                 <td style="width: 25px !important"> :</td>
                                 <td>{{$configs->branch_name}}</td>  
                             </tr>
                             <tr>
                                 <td style="width: 250px;font-weight:bold !important">IFSC Code </td>
                                 <td style="width: 25px !important"> :</td>
                                 <td>{{$configs->ifsc_code}}</td>
                             </tr>                                
                         </table>  
                     @endif
                </div>
             </div>
           </div>
        </div>

        
        </main>
    
        <footer class="w-100" id="footer">
            <img src="{{ public_path('images\footer.png') }}" alt="header" class="w-100">
        </footer>  
    </body>
    </html>
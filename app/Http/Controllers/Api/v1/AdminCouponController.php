<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\AdminCoupon;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



class AdminCouponController  extends Controller
{
    use ApiResponser;
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return List of AdminCoupons
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adminCoupons = AdminCoupon::all();
        
        return $this->successResponse($adminCoupons);
      
    }

    /**
     * Create one new AdminCoupon
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[

            'code'=>'required',
            'discount'=>'required',
            'value'=>'required|numeric',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'user_id'=>'required|integer',
        ]);
       
        $adminCoupon = AdminCoupon::create($request->all());          
        return $this->successResponse($adminCoupon,Response::HTTP_CREATED);
       
    }

    /**
     * get one AdminCoupon
     *
     * @return Illuminate\Http\Response
     */
    public function show($adminCoupon)
    {
        //

        $adminCoupon = AdminCoupon::findOrFail($adminCoupon);
        return $this->successResponse($adminCoupon);
        
    }

    /**
     * update an existing one AdminCoupon
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$adminCoupon)
    {

        $this->validate($request,[

            'value'=>'numeric',
            'start_date'=>'date',
            'end_date'=>'date',
            'user_id'=>'integer',
        ]);

        $adminCoupon = AdminCoupon::findOrFail($adminCoupon);
        $adminCoupon->fill($request->all());

        
        if($adminCoupon->isClean()){
            return $this->errorResponse("you didn't change any value",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $adminCoupon->save();
        return $this->successResponse($adminCoupon);
    }

     /**
     * remove an existing one AdminCoupon
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($adminCoupon)
    {
        $adminCoupon = AdminCoupon::findOrFail($adminCoupon);
        $adminCoupon->delete();
        return $this->successResponse($adminCoupon);
      
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\Portfolio\StorePortfolioRequest;
use App\Http\Requests\Admin\Portfolio\UpdatePortfolioRequest;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $port = Portfolio::all();
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Portfolio.List')
            ->with('port', $port)
            ->with('thongBaoMoi', $thongBaoMoi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Portfolio.Add')
        ->with('thongBaoMoi', $thongBaoMoi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfolioRequest $request)
    {
        $port = new Portfolio();
        $port->user_id = Auth::user()->id;
        $port->port_name = $request->name;
        $port->port_description = $request->description;
        $port->port_origin = $request->origin;
        $port->status = $request->status;
        $files = $request->file('avatar');

        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/image/portfolio/avatar'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['avatar'] = "$profileImage";
            // Save In Database
            $port->port_avatar = "$profileImage";
        }

        $files = $request->file('img');

        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/image/portfolio'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['img'] = "$profileImage";
            // Save In Database
            $port->port_img = "$profileImage";
        }
        // dd($port);   
        $port->save();
        if($port->save()){
            return response()->json([
                'status' => 'success',
                'message' => 'Th??m Nh?? Cung C???p Th??nh C??ng'
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => 'Th??m Nh?? Cung C???p Th???t B???i'
            ], 200);
        }
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $port = DB::table('tpl_portfolio')
            ->join('users', 'users.id', '=', 'tpl_portfolio.user_id')
            ->where('port_id', $id)->first();
            $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Portfolio.Show')
            ->with('port', $port)
            ->with('thongBaoMoi', $thongBaoMoi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')
            ->orderBy('id', 'desc')->get();
        $port = Portfolio::find($id);
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Portfolio.Edit')
            ->with('port', $port)
            ->with('user', $user)
            ->with('thongBaoMoi', $thongBaoMoi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioRequest $request, $id)
    {
        $port = Portfolio::find($id);
        $port->user_id = Auth::user()->id;
        $port->port_name = $request->name;
        $port->port_description = $request->description;
        $port->port_origin = $request->origin;
        $files = $request->file('avatar');

        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/image/portfolio/avatar'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['avatar'] = "$profileImage";
            // Save In Database
            $port->port_img = "$profileImage";
        }

        $files = $request->file('img');
        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/image/portfolio'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['img'] = "$profileImage";
            // Save In Database
            $port->port_img = "$profileImage";
        }
        $port->update();

        if ($port->update()) {
            return response()->json([
                'status' => 'success',
                'message' => 'C???p Nh???t Nh?? Cung C???p Th??nh C??ng'
            ] ,200);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => 'C???p Nh???t Nh?? Cung C???p Th???t B???i'
            ] ,200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Portfolio::find($id);
        $destroy->delete();
        if ($destroy->delete()) {
            $port = Portfolio::all();
            $giao_dien = view('pages.server.Portfolio.list-item', compact(['port']))->render();
            return response()->json([
                'status' => 'success',
                'message' => 'X??a Nh?? Cung C???p Th??nh C??ng',
                'giao_dien' => $giao_dien
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'X??a Nh?? Cung C???p Th???t B???i'
            ], 200);
        }
    }

    public function change_status($id)
    {
        $change = Portfolio::find($id);
        if ($change->status == 1) {
            $change->status = 0;
            $change->save();
            if ($change->save()) {
                $port = Portfolio::all();
                $giao_dien = view('pages.server.Portfolio.list-item', compact(['port']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => '???? ???n Nh?? Cung C???p',
                    'giao_dien' => $giao_dien
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Ch??a ???n ???????c Nh?? Cung C???p'
            ], 200);
        } else {
            $change->status = 1;
            $change->save();
            if ($change->save()) {
                $port = Portfolio::all();
                $giao_dien = view('pages.server.Portfolio.list-item', compact(['port']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => '???? Hi???n Th??? Nh?? Cung C???p',
                    'giao_dien' => $giao_dien
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Ch??a Hi???n Th??? ???????c Nh?? Cung C???p'
            ], 200);
        }
    }
}

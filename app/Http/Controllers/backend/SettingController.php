<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Auth;

class SettingController extends Controller
{

     // Define Default Settings ID
    private $id = 1;
    private $uploadPath = "uploads/settings/";

     /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

    public function edit()
    {
        $id = $this->getId();
        $Setting = Setting::find($id);
        if (!empty($Setting)) {
          return view('backend.setting',compact('Setting'));
        } else {
            return redirect()->route('backend.index');
        }

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id = 1 for default settings
     * @return \Illuminate\Http\Response
     */
    public function updateSiteInfo(Request $request)
    {
        //
        $id = $this->getId();
        $Setting = Setting::find($id);
        if (!empty($Setting)) {
            $Setting->update($request->except(['site_logo','site_icon']));
            $formFileName = "site_logo";
            $fileFinallogo = "";
            if ($request->$formFileName != "") {
                $fileFinallogo = time() . rand(1111,
                        9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
                $path = $this->getUploadPath();
                $request->file($formFileName)->move($path, $fileFinallogo);
            }

            $formFileName = "site_icon";
            $fileFinalicon = "";
            if ($request->$formFileName != "") {
                $fileFinalicon = time() . rand(
                    1111,
                    9999
                ) . '.' . $request->file($formFileName)->getClientOriginalExtension();
                $path = $this->getUploadPath();
                $request->file($formFileName)->move($path, $fileFinalicon);
            }

            if ($fileFinallogo != "") {
                $Setting->site_logo = $fileFinallogo;
            }

              if ($fileFinalicon != "") {
                $Setting->site_icon = $fileFinalicon;
            }
            $Setting->save();
           return redirect(route('backend.setting.edit'))->with('message','Setting updated successfully');
        }
        else {
            return redirect()->route('backend.index');
        }
    }



    // update tab of site status

    public function getUploadPath()
    {
        return $this->uploadPath;
    }


    // update tab of Style Settings

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

}

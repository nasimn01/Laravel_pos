<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Settings\Branch;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;
use App\Http\Requests\User\AddNewRequest;
use Illuminate\Support\Facades\Hash;
use Exception;

class ProfileController extends Controller
{
    use ResponseTrait,ImageHandleTraits;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ownerProfile()
    {
        
        $users=User::where(company(currentUserId()))->first();
        // dd(currentUserId());
        return view('settings.users.profile',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminProfile()
    {
        
        $users=User::where(company(currentUserId()))->first();
        // dd(currentUserId());
        return view('settings.adminusers.profile',compact('users'));
    }

}

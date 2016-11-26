<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Member;
use App\Profile;
use Session;
class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('members/list', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validationRules());
        $member = new Member;
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->email = $request->email;
        $member->age = $request->age;
        $member->save();

        $profile = new Profile;
        $profile->phone = $request->phone;
        $profile->address = $request->address; 
        $profile->company = $request->company; 
        $profile->notes = $request->notes; 

        $member->profile()->save($profile);

        Session::flash('message', 'New Member has been added successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members/edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $this->validate($request, $this->validationRules());
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->email = $request->email;
        $member->age = $request->age;
        $member->profile->phone = $request->phone;
        $member->profile->address = $request->address; 
        $member->profile->company = $request->company; 
        $member->profile->notes = $request->notes;  

        $member->push();
        Session::flash('message', 'Member has been updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::destroy($id);
        Session::flash('message', 'Member has been deleted successfully.');
        return redirect('members');
    }

    private function validationRules()
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'email' => 'required',
            'age' => 'required|integer'
        ];
    }
}
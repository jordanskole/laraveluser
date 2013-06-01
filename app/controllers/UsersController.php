<?php

class UsersController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {   
        
        // if the user is logged in
        if( Auth::check() ) {
        
            // snag our user variable so that its
            // easier to work with
            $user = Auth::user();
        
        } else {
        
            // if the user isn't logged in return false
            // for the user variable
            $user = false;
        }

        // also grab all of the users
        $users = User::all()->paginate(15);
        
        // okay cool, return the index view with our stuff
        return View::make('users.index')
            ->with('title', 'Users List - Laravel Gallery')
            ->with('user', $user)
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        // check if the user is logged in already
        if(!Auth::check()) {
            // if they are logged out show them the register form
            return View::make('users.create')
                ->with('title', 'Laravel Gallery - New User');
        } else {
            // if they are logged in already redirect them back to the home screen
            return View::make('home')
                ->with('user', false)
                ->with('title', 'Laravel Gallery');

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate the user attempting to be created
        $validation = Validator::make(Input::all(), User::$rules);

        // if validation passes... 
        if($validation->passes()) {

            // create the new user
            User::create(array(
                'email'=>Input::get('email'),
                'password'=>Hash::make(Input::get('password'))
            ));
            
            // log the user in 
            $user  = DB::table('users')->where('email', '=', Input::get('email'))->first();
            Auth::loginUsingId($user->id);
           

            // and redirect them to the dashboard screen
            return Redirect::route('home')
                ->with('message', 'Welcome to Laravel Gallery')
                ->with('message-class', 'alert-success');
        
        } else {
            
            // if they don't pass validation redirect them back to register page with errors
            return Redirect::route('users.create')

                // with validation errors 
                ->withErrors($validation)

                // and their input 
                ->withInput();
                
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Our special Login method just for users
     *
     * @return Response
     */
    public function login()
    {
        // login the user
        // create our user variable from the form fields
        $user = array(
            'email'=>Input::get('email'),
            'password'=>Input::get('password')
        );

        // if the user exists in our database
        if(Auth::attempt($user, true)) {
            // log the user in (happens automatically)
            // (the user is already logged in via l4)
            return Redirect::route('home');
        } else {
            // if she doesn't return to login with error & input 
            return Redirect::route('home')
                ->with('message', 'email/password error');   
        }

    }   

    /**
     * Our special Logout method just for users
     *
     * @return Response
     */
    public function logout()
    {
        // Logout the current user
        Auth::logout();
        // and redirect them back home
        return Redirect::route('home')
            ->with('message', 'You have successfully logged out.');
    }

}
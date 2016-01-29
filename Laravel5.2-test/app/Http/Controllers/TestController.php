<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;
use Parse\ParseClient;
class TestController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getIndex()
    {
        ParseClient::initialize( env('PARSE_APP_ID'), env('ARSE_REST_KEY'), env('PARSE_MASTER_KEY') );
        $user = new ParseUser();
        $user->setUsername("foo");
        $user->setPassword("Q2w#4!o)df");
        try {
            $user->signUp();
        dd(1112);
        } catch (ParseException $ex) {
            echo ($ex->getMessage())."<br>";
        }

        // Login
        try {
            $user = ParseUser::logIn("foo", "Q2w#4!o)df");
        } catch(ParseException $ex) {
            echo ($ex->getMessage());
        }

        // Current user
        $user = ParseUser::getCurrentUser();
        dd($user);
    }
}
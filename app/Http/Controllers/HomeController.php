<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Faq;
use App\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $title = 'Home';
        $contact = Contact::first();
        $teams = Team::all();
        $faqs = Faq::all();

        // Seet session 
        session([
            'link_telegram' => $contact->link_telegram,
            'link_twitter' => $contact->link_twitter,
            'link_facebook' => $contact->link_facebook,
            'link_instagram' => $contact->link_instagram,
            'link_youtube' => $contact->link_youtube,
        ]);

        return view('home', compact(
            'title',
            'contact',
            'teams',
            'faqs'
        ));
    }


    public function academy()
    {
        $title = 'Academy';
        return view('academy.index', compact(
            'title',
        ));
    }

    public function forum_qa()
    {
        $title = 'Forum Q&A';
        return view('forum-qa.index', compact(
            'title',
        ));
    }

    public function blog()
    {
        $title = 'Blog';
        return view('blog.index', compact(
            'title',
        ));
    }

    public function job()
    {
        $title = 'Job';
        return view('job.index', compact(
            'title',
        ));
    }

    public function event()
    {
        $title = 'Event';
        return view('event.index', compact(
            'title',
        ));
    }

    public function partnership()
    {
        $title = 'Partnership';
        return view('partnership.index', compact(
            'title',
        ));
    }
}

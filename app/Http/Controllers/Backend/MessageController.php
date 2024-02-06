<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // AdminMessage
    public function AdminMessage(){
        $messages = Contact::latest()->get();
        return view("backend.message.all_message",compact("messages"));
    }
}

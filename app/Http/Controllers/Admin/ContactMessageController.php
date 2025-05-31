<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.messages.index', compact('messages'));
    }
    
    public function show(ContactMessage $message)
    {
        // Mark message as read
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        
        return view('admin.messages.show', compact('message'));
    }
    
    public function destroy(ContactMessage $message)
    {
        $message->delete();
        
        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
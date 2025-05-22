<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    /**
     * Display a listing of contacts
     */
    public function index(Request $request)
    {
        $query = Contact::orderBy('created_at', 'desc');
        
        // Filter by status
        if ($request->has('status')) {
            if ($request->status == 'unread') {
                $query->where('is_read', false);
            } elseif ($request->status == 'read') {
                $query->where('is_read', true);
            }
        }
        
        // Search
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }
        
        $contacts = $query->paginate(10);
        
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show contact details
     */
    public function show(Contact $contact)
    {
        // Mark as read if not already
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }
        
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Mark contact as read
     */
    public function markAsRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);
        
        return redirect()->back()->with('success', 'Pesan ditandai sebagai dibaca');
    }

    /**
     * Remove the contact
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        
        return redirect()->route('admin.contacts.index')->with('success', 'Pesan berhasil dihapus');
    }
    
    /**
     * Process bulk actions on contacts
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:mark-read,delete',
            'ids' => 'required'
        ]);
        
        $ids = explode(',', $request->ids);
        
        if (empty($ids)) {
            return redirect()->back()->with('error', 'Tidak ada pesan yang dipilih');
        }
        
        if ($request->action == 'mark-read') {
            Contact::whereIn('id', $ids)->update(['is_read' => true]);
            return redirect()->back()->with('success', count($ids) . ' pesan berhasil ditandai sebagai dibaca');
        } elseif ($request->action == 'delete') {
            Contact::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', count($ids) . ' pesan berhasil dihapus');
        }
        
        return redirect()->back()->with('error', 'Tindakan tidak valid');
    }
}
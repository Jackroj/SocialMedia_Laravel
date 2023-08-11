<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    //
    public function store(){
        $validate = request()->validate([
            'content'=> 'required|min:5|max:240'
        ]);
        $validate['user_id'] = Auth::id();

        //store data like below type you need to add fillable array in target model file
            $idea = Idea::create($validate);
        // dump(request()->get('comment', ''));
        return redirect()->route('dashboard')->with('success', 'Idea form submitted successfully');
    }

    public function destroy(Idea $idea){
        //handle the null return id using firstOrFail method
        // $idea = Idea::where('id', $id)->firstOrFail()->delete();
        // $idea->delete();
        
        if (Auth::id() !== $idea->user_id) {
            abort(404, 'something went wrong try again');
        }

        // another short way of deleting
        $idea->delete();
        
        return redirect()->route('dashboard')->with('failure', 'Deleted successfully');
    }

    public function show(Idea $idea){

    // another method
        // compact('id')
        return view('idea.show', [
            'idea' => $idea
        ]);
    }

    public function edit(Idea $idea){
 
        if (Auth::id() !== $idea->user_id) {
            abort(404, 'something went wrong try again');
        }
        $editing = true;
        return view('idea.show',compact('idea', 'editing'));
    }

    public function update(Idea $idea){

        if (Auth::id() !== $idea->user_id) {
            abort(404, 'something went wrong try again');
        }

        $validate = request()->validate([
            'content'=> 'required|min:5|max:240'
        ]);
        $editing = true;

        $idea->update($validate);
        
        // another method to update data
        // $idea->content =  request()->get('content', '');
        // $idea->save();
        return view('idea.show',compact('idea'));
    }
}

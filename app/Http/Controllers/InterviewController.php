<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterviewRequest;
use App\Models\Interview;
use App\Services\InterviewService\InterviewService;

class InterviewController extends Controller
{
    public function index()
    {
        return view('pages.interview.index', [
            'interviews' => Interview::query()
                ->orderBy('created_at', 'DESC')
                ->paginate()
        ]);
    }
    
    public function create()
    {
        return view('pages.interview.create');
    }
    
    public function store(InterviewRequest $request, InterviewService $interviewService)
    {
        $interview = $interviewService->createInterview($request->validated());
        
        if($request->wantsJson()) {
            return response()->json($interview, 201);
        }

        return redirect(route('interview.edit',['interview' => $interview->id]))
            ->with('msg', __('Interview Created'));
    }
    
    public function show(Interview $interview)
    {
        return view('pages.interview.show', compact('interview'));
    }
    
    public function edit(Interview $interview)
    {
        return view('pages.interview.edit',compact('interview'));
    }
    
    public function update(InterviewRequest $request, Interview $interview)
    {
        dd($interview);
        $interview->update($request->validated());
        
        return \redirect()->back()->with('msg',"Interview updated");
    }
    
    public function destroy(Interview $interview)
    {
    }
}

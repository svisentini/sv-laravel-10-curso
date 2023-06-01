<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller{

    public function index(Support $support) 
    {
        $supports = $support->all();
        //dd($supports);

        return view('admin/supports/index', compact('supports'));
    }

    public function show (string|int $id){
        
        if(! $support = Support::where('id', '=', $id)->first()){
            return back(); // Redireciona para a página anterior
        }
        return view('admin/supports/show', compact('support'));

    }

    public function create ()
    {
        return view('admin/supports/create');
    }

    public function store(Request $request, Support $support)
    {
        // dd(' vou cadastrar ....');
        // dd($request->all()); 
        // dd($request->get('body1','valor default'));

        $data = $request->all();
        $data['status'] = 'a';

        $support = $support->create($data);
        // dd($support);

        return redirect()->route('supports.index');

    }

    public function edit(Support $support, string|int $id){
        if(! $support = $support->where('id', '=', $id)->first()){
            return back(); // Redireciona para a página anterior
        }
        return view ('admin/supports/edit', compact('support'));
    }

    public function update(Request $request, Support $support, string|int $id){
        if(! $support = $support->where('id', '=', $id)->first()){
            return back(); // Redireciona para a página anterior
        }
        
        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save();
        
        $support->update($request->only([
            'subject', 'body'
        ]));

        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id){
        if(!$support = Support::find($id)){
            return back();
        }

        $support->delete();
        return redirect()->route('supports.index');
    }
    
}

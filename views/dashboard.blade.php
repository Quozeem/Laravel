@extends('pages.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @guest
             
                <div class="card-header">{{ __('Wecome to Member Dashboard') }}</div>
                {{ Auth::guard('member')->user()->name }}
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                         
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
@if(session('thanks'))
  {{ session( 'thanks' )}}
@endif
                </div>
            </div>
            @endguest
        </div>
    </div>
</div>
<div class="card mb-3">
            <div class="card-body">
            <div class="table-responsive fs--1">
                <table   class="table table-striped border-bottom">
                  <thead class="bg-200 text-900">
                  
                    <tr>
                      <th class="border-0">S/N</th>
                      <th class="border-0 text-center">Name</th>
                      <th class="border-0 text-center">Email</th>
                      <th class="border-0 text-end">Amount</th>
                      <th class="border-0 text-end">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($select as $row)
                  <tr class="border-200">
                 
                      <td class="align-middle">{{ $row->id}} </td>
                      <td class="align-middle text-center">{{ $row->name}}</td>
                      <td class="align-middle text-center">{{ $row->email}}</td>
                      <td class="align-middle text-end">#{{ $row->price}}</td>
                      <td class="align-middle text-end"><a href="/delete/{{ $row->id}}">Delect</a>
                      <a href="/dashboardedit/{{ $row->id}}">Edit</a>
                    
                    </td>
                    
                    </tr> @endforeach</tbody></table>
                     
</div></div></div>
@endsection

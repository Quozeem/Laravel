@extends('pages.layout')
   @section('content')
        <div class="flex-center postion-ref full-heght">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else  
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
          
       <div class="content">
       {{ session('thanks') }}
         <table>
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
                  @foreach($pizza as $row)
                  <tr class="border-200">
                 
                      <td class="align-middle">{{ $row->id}} </td>
                      <td class="align-middle text-center">{{ $row->name}}</td>
                      <td class="align-middle text-center">{{ $row->email}}</td>
                      <td class="align-middle text-end">#{{ $row->price}}</td>
                      <td class="align-middle text-end"><a href="/delete/{{ $row->id}}">Delect</a>
                      <a href="/dashboardedit/{{ $row->id}}">Edit</a>
                    
                    </td>
                    
                    </tr> @endforeach</tbody></table>
        </div> 
        </div>
        
             
                     

           @endsection
 
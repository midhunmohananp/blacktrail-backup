@extends('layouts.master')

@section('title', 'Create An Account')

@section('content')

<section class="w-1/2 mt-4 text-center m-auto h-full">
  <form action="{{ route('register') }}" method="POST" class="bg-white p-10 ml-4 mt-4 font-basic font-normal w-4/5 inline-block">
   {{  csrf_field() }}
   <h3 class="mb-4 text-3xl font-basic tracking-normal">Create an account</h3>
   <div class="mb-6">
     <label for="full_name" class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2">Company Name / Organization Name / Pen Name / Your full name
     </label>

     <input type="text" class="w-full p-2 bg-grey-lighter leading-normal" id="name" name="display_name" autocomplete="display_name" placeholder="Display Name" value="{{ old('display_name') }}" required @keydown="errors.name = false">

     @if ($errors->has('display_name'))
     <span class="help-block text-red ">
       <strong>{{ $errors->first('display_name') }}</strong>
     </span> 
     @endif
   </div>

   <div class="mb-6">
     <label for="email" class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2">Email</label>
     <input type="email" class="w-full p-2 bg-grey-lighter leading-normal" id="email" name="email" autocomplete="email" placeholder="Email" value="{{ old('email') }}" required>
     @if ($errors->has('email'))
     <span class="help-block text-red ">
       <strong>{{ $errors->first('email') }}</strong>
     </span> 
     @endif
   </div>

   <div class="mb-6">
    <label for="email" class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2">Phone Number</label>
    <input type="phone" class="w-full p-2 bg-grey-lighter leading-normal" id="phone_number" name="phone_number" autocomplete="phone_number" placeholder="Mobile Number is accepted" value="{{ old('phone_number') }}" required>
    @if ($errors->has('phone_number'))
    <span class="help-block text-red ">
     <strong>{{ $errors->first('phone_number') }}</strong>
   </span> 
   @endif
 </div>



 <div class="mb-6">
   <label for="name" class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2">Password</label>
   <input type="password" class="w-full p-2 bg-grey-lighter leading-normal" id="password" name="password" autocomplete="password" placeholder="Password" value="{{ old('password') }}" required>
   @if ($errors->has('password'))
   <span class="help-block text-red ">
     <strong>{{ $errors->first('password') }}</strong>
   </span> 
   @endif

 </div>


 <div class="mb-6">
   <label for="name" class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2">Confirm Password</label>
   <input type="password" class="w-full p-2 bg-grey-lighter leading-normal" id="password" name="password" autocomplete="password" placeholder="Password" value="{{ old('password') }}" required>
   @if ($errors->has('password'))
   <span class="help-block text-red ">
     <strong>{{ $errors->first('password') }}</strong>
   </span> 
   @endif

 </div>


 <div class="mb-6">
   <label for="role_id" class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2">Country</label>
   <select class="w-full p-2 bg-grey-lighter leading-normal" name="country_id">
    @foreach ($countries as $country)
    <option value="{{ $country->id }}">{{  $country->name }}</option>
    @endforeach
  </select>
</div>



<div class="mb-6">
 <label for="role_id" class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2">Register as</label>
 <select class="w-full p-2 bg-grey-lighter leading-normal" name="role_id">
   @foreach ($roles as $role)
   <option value="{{ $role->id }}">{{  $role->role_title }}</option>
   @endforeach
 </select>
</div>

<div class="mb-6">
 <button class="bg-green-initial py-3 px-8 w-full text-white font-bold ">Submit
 </button>
</div>
</form>
</div>
</section>
@endsection

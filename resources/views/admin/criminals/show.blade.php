@extends('layouts.master')

@section('title', 'Criminal\'s Profile Page' )

@section('content')

<criminal-profile inline-template>
	<div class="init-row w-full ">
		<section class="item ml-2 font-basic" id="pageView">
			<div class="shadow-md bg-white p-2 mt-4">
				<div clafss="">	
					<div class="ml-4">	
						<p class="w-full font-basic ml-2 tracking-normal text-2xl mb-4 mt-4 font-normal text-black mr-2">
							Criminal Profile of {{ $criminal->full_name }} 
						</p>
						<div class="text-center">
							<div id="avatar" class="inline-block mb-6 w-full" >
								<img src="{{ asset('assets/images/'.$criminal->photo) }}" class="h-50 w-50 rounded-full border-orange border-2">
								<p class="font-normal font-display mt-2 text-black text-3xl">{{ $criminal->full_name }} aka <em class="font-bold"> {{  $criminal->alias }}</em></p>
								<p class="font-bold mt-2 text-orange text-2xl">{{  is_null($criminal->profile->bounty) ? 'Bounty not added yet' : $criminal->profile->bounty ." " .$criminal->profile->currency}}</p>

								@if (auth()->user()->isAdmin() && $criminal->posted_by === auth()->user()->id)
								<button class="hover:bg-blue-darker hover:text-white bg-blue rounded-full w-1/2 mt-4 h-12 ">
									<a class="text-white hover:text-blue-lighter" href="{{ route('admin.criminals.show',$criminal->id) }}">Edit Profile</a>
								</button>
								@endif
								
							</div>
						</div>

						<div class="init-row w-full">
							<div class="item w-1/2" id="basic-profile-section">
								<div class="row mb-3">
									<p class="text-md text-normal mr-4">First Name : <em class="font-bold roman">{{ $criminal->first_name }}</em></p>
								</div>

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Middle Name : <em class="font-bold roman">{{ $criminal->middle_name }}</em></p>
								</div>

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Last Name : <em class="font-bold roman">{{ $criminal->last_name }}</em></p>
								</div>

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Status : <em class="font-bold roman">{{  $criminal->status == 1 ? 'At Large' : 'Captured' }}</em></p>
								</div>

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Age : <em class="font-bold roman">{{  $criminal->profile->age }}</em></p>
								</div>		

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Country of Origin : <em class="font-bold roman">{{  $criminal->country->name }}</em></p>
								</div>


								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Last seen at : <em class="font-bold roman">{{  $criminal->profile->last_seen }}</em></p>
								</div>

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Birthdate : 
										<em class="font-bold roman">
											{{ \Carbon\Carbon::parse($criminal->profile->birthdate)->format('d-m-Y i') }}
										</em>
									</p>
								</div>
							</div>

							<div class="item" id="crimes-section">
								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Eye Color : <em class="font-bold roman">{{ ucwords($criminal->profile->eye_color) }}</em></p>
								</div>

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Weight(Kilos) : <em class="font-bold roman">{{ ucwords($criminal->profile->weight_in_kilos) }}</em>

									</p>
								</div>
								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Contact Number : <em class="font-bold roman">{{ $criminal->contact_number  }}</em></p>
								</div>

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Body Frame : <em class="font-bold roman">{{ ucwords($criminal->profile->body_frame ) }}</em></p>
								</div>

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Height (in feet and inches) : <em class="font-bold roman">{{ ucwords($criminal->profile->height_in_feet_and_inches) }}</em></p>
								</div>

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Respondent's Name <em class="font-bold roman">{{ ucwords($criminal->respondent->display_name) }}</em>
									</p>
								</div>
								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Birthplace: <em class="font-bold roman">{{ ucwords($criminal->profile->birthplace) }}</em>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="item col ml-2 font-basic h-full" id="pageView">
			<div class="shadow-md bg-white p-4 mt-4">
				<div class="">	
					<div class="ml-4">	
						<p class="font-basic ml-2 tracking-normal text-2xl mb-4 mt-4 font-normal text-black mr-2">
							Listed Crimes
						</p>

						<div class="text-center">
							<div id="avatar" class="inline-block mb-6 w-full" >
								<p class="font-normal font-display mt-2 text-black text-3xl">Listed Crimes</em></p>
							</div>
						</div>

						<div class="init-row w-full">
							<div class="item w-1/2" id="basic-profile-section">
								@forelse ($criminal->crimes as $crime)
								<p class="font-normal text-md"><em class="font-bold text-xl roman">{{ $crime->criminal_offense }}</em> - {{  $crime->pivot->crime_description }}</p>

								@empty
								<p>No crimes were listed..</p>
								@endforelse
							</div>

						</div>

					</div>
				</div>
			</div>

			<div class="shadow-md bg-white p-4 mt-4">
				<div class="">	
					<div class="ml-4">	
						<div v-html="`{{ $criminal->profile->complete_description }}`" class="font-basic ml-2 tracking-normal  mb-4 mt-4 font-normal mr-2">
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</criminal-profile>

@endsection
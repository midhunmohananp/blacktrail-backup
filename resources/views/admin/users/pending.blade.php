@extends('layouts.master')
@section('title', 'All Pending Users')
@section('content')
@auth
<pending-users inline-template>
	<div class="w-full mx-auto">
		<h3 class="text-3xl mt-4">Pending Users</h3>
		{{ $pending_users->links() }}
		<div class="bg-white shadow-md rounded my-6">
			<table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
				<thead>
					<tr>
						<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Display Name</th>
						<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Email</th>
						<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Phone Number</th>
						<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Country</th>
							<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Action</th>
					</tr>
				</thead>
				<tbody>

					@forelse ($pending_users as $user)
					<tr class="hover:bg-grey-lighter">
						<td class="py-4 px-6 border-b border-grey-light">{{ $user->display_name }}</td>
						<td class="py-4 px-6 border-b border-grey-light">{{ $user->email }}</td>
						<td class="py-4 px-6 border-b border-grey-light">{{ $user->phone_number }}</td>
						<td class="py-4 px-6 border-b border-grey-light">{{ $user->country->name }}</td>

						<td class="p-4 border-b border-grey-light">
							<a href="#" @click="activate_user({{ $user->id }})" class="text-grey-lighter font-bold p-4 rounded text-xs bg-green hover:bg-green-dark">Activate</a>
						<a href="#" @click="delete_user({{ $user->id }})"class="text-grey-lighter font-bold p-4 rounded text-xs bg-red-darker hover:bg-blue-dark">Delete</a>
						</td>
					</tr>
					@empty
					<h3>No pending users are available.</h3>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</pending-users>

@endauth

@stop
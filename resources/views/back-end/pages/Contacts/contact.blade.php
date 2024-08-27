@extends('back-end.layouts.app')
@section('backContent')
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Messages Recents</h6>
        @foreach ($contacts as $contact)
            <div class="media text-muted pt-3">

                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">{{ $contact->email }}</strong>
                    <strong class="d-block text-gray-dark">Nom : {{ $contact->nom . ' ' . $contact->prenom }}</strong>
                    <strong class="d-block text-gray-dark">Telephone : {{ $contact->telephone }}</strong>
                    {{ $contact->message }}
                </p>
            </div>
        @endforeach
    </div>
@endsection

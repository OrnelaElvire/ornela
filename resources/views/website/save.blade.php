{{--  pour afficher une variable dans un fichier blade=> {{ $nom_var }} --}}
@extends("layouts.template")

@section("titre")
Resultat du formulaire
@endsection

@section("contenu")
Votre nom est : {{ $request->nom }}
<br>
Votre prenom est : {{ $request->prenom }}
<br>
votre email est : {{ $request->email }}
<br>
votre message est :  {{ $request->message }}

@php
//variables internes
    $tva=20;
    $ht=$request->ht;
    $ttc=$ht * (1+$tva/100); // 1000 * 1.20
    $notes=[15,14.5,12];
@endphp

<hr>
Le montant TTC est : {{ $ttc }}euro TTC

<h1>liste des notes avec foreach</h1>
<table border="1">
    <tr>
@foreach($notes as $note)
<td>
    {{ $note }}
</td>
@endforeach
    </tr>
</table>
{{-- Forelse gere le cas ou le tableau est vide! --}}
<h1>liste des notes avec forelse</h1>
<table border="1">
    <tr>
@forelse($notes as $note)
<td>
    {{ $note }}
</td>
@empty
<td>Pas de note pour le moment!</td>
@endforelse
    </tr>
</table>

<h1>liste des notes avec for</h1>
<table border="1">
    <tr>
@for($i=0;$i<count($notes);$i++)
<td>
    {{ $notes[$i] }}
</td>
@endfor
    </tr>
</table>
@endsection


@extends('inscrire')

@section('content')


<fieldset>
	<form method='POST' action="{{ route("inscription") }}" enctype="multipart/form-data">
		@csrf
		<img src="{{asset('img/logo.png')}}" alt="charEvent" height="120px">

		<br />
		<h2>Inscription</h2>
		<br />

		<label for="nom">Nom *</label>
		<input type="text" name="nom" id="nom" placeholder="Nom" required="required" value="{{ old('nom') }}">
		<br />

		<label for="prenom">Prénom *</label>
		<input type="text" name="prenom" id="prenom" placeholder="Prénom" required="required" value="{{ old('prenom') }}">
		<br />

		<label for="birth">Date de naissance *</label>
		<input type="date" id="birth" name="birth" required="required" value="{{ old('birth') }}">
		<br />

		<label for="departement">Département *</label>
		<input type="number" name="departement" id="departement" placeholder="N° Département" required="required" value="{{ old('departement') }}">
		<br />

		<label for="ville">Ville *</label>
		<input type="text" name="ville" id="ville" placeholder="Ville" required="required" value="{{ old('ville') }}">
		<br />

		<label for="codeZIP">Code postale *</label>
		<input type="number" name="codeZIP" id="codeZIP" placeholder="Code ZIP" required="required" value="{{ old('codeZIP') }}">
		<br />

		<label for="email">Email *</label>
		<input type="email" name="email" id="email" placeholder="xxx@xxx.xx" required="required" value="{{ old('email') }}">
		<br />

		<label for="password">Mot de passe *</label>
		<input type="password" name="password" id="password" required="required">
		<br />

		<label for="password_confirmation">Confirmation *</label>
		<input type="password" name="password_confirmation" id="password_confirmation" required="required">
		<br />

		<label for="telephone">Téléphone </label>
		<input type="text" name="telephone" id="telephone" placeholder="Téléphone" value="{{ old('telephone') }}">
		<br />

		<label for="photo">Photo </label>
		<input name="photo" type="file" accept="image/png, image/jpeg">
		<br />

		<br />
		<input type="checkbox" id="notificationMail" name="notificationMail" value="true" {{ old('notificationMail') ? 'checked' : '' }}>
		<label for="notifMail"> Recevoir les notifications par mail</label><br>
		<br />


		<input type="submit" id="submit" value="S'inscrire">

	</form>

	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
</fieldset>


@endsection

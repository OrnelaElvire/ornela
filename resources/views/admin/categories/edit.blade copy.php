@extends("admin.layouts.template")


@section('contenu')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Modifier categorie</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="quickForm"  method="post" action="{{ route('categories.update',$category
        ->id )}}">
      @csrf
      @method ('put')
        <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nom categorie</label>
          <input type="texte" name="name" value="{{ $category->name}}" class="form-control @error=("name") border-danger @enderror" id="name" placeholder="Entrer le nom de la categorie">
        @error("name")
        <div class="text text-danger">{{ $message}}</div>
        @enderror
        </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <button type="reset" class="btn btn-secondary">Annuler</button>
    </div>
    </form>
  </div>

@endsection

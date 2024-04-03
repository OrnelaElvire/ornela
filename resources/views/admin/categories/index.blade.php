@extends("admin.layouts.template")


@section('contenu')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Liste des categories</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- afficher un message de success-->
        @if (Session::has("message"))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Name</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @forelse( $categories as $category)
            <tr>
                <td>{{ $category->name}}</td>

                <td>
                    <a href="{{ route('categories.edit', $categpry->id) }}"><button class="btn btn-success">Modifier</button></a>
                  <form class="d-inline" action="{{ route('categorires.destroy',$category->id) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" onclick=" return comfirm(' etes vous sure de supprimer?')" class="btn btn-danger">Delete</button>
                  </form>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="2"> No data found </td>
            </tr>

            @endforelse

        </tbody>
        <tfoot>
        <tr>
          <th>Name</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

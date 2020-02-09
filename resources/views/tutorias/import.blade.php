<form action="{{ route('alumnos.import.excel') }}" method="post" enctype="multipart/form-data">
    @csrf
    @if(Session::has('message'))
    <p>{{ Session::get('message') }}</p>
    @endif
    <input type="file" name="file">
    <button>Importar Alumnos</button>  
    </form>
    
<form action="{{ route('familiar.import.excel') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="filefamiliar">
    <button>Importar Familiares</button>  
    </form>

  
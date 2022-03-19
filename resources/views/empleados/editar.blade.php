
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            
            <form action="{{ route('empleados.update',$empleado->id) }}" method="POST" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre:</label>
                        <input name="nombre" value="{{ $empleado->nombre }}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                   
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellido:</label>
                        <input name="apellido" value="{{ $empleado->apellido }}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cedula:</label>
                        <input name="cedula" value="{{ $empleado->cedula }}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="number" required/>
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Dirección:</label>
                        <input name="direccion" value="{{ $empleado->direccion }}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                </div> 
                <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Telefono:</label>
                        <input name="telefono" value="{{$empleado->telefono}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="number" required/>
                </div> 
                <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Seleccione un pais:</label>
                     
                        <select   id="country"  class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                            <option selected>Seleccionar un pais</option>
                            @foreach($paises as $pais)
                            <option  value="{{$pais->id}}">{{$pais->name}}</option>
                            @endforeach
                        </select>
    
                </div>
                <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Seleccione una ciudad:</label>
                     
                        <select name="ciudad_nacimiento" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" id="city">
                        <option selected="selected">--Seleccionar Ciudad--</option>
                        </select>
                        
                </div>
           </div>
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <a href="{{ route('empleados.index') }}" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                    <button type="submit"  style="background:blue;" class='w-auto rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>
                </div>
            </form> 

            </div>
        </div>
    </div>
</x-app-layout>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $('select#country').change(function(){
        var countryId = $(this).val();
        $ciudaditems = $('.cityItems').remove();
        $.get('/ciudades/'+countryId, function(data){
            $.each(data, function(index, element){
                $('select#city').append('<option value="'+element.name+'" class="cityItems">'+element.name+'</option>')
            });
        }, 'json');
    });
</script>

     
   




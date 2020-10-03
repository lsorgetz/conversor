<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conversor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-hidden mb-8">
                <form class="w-full" action="{{ route('gravar')}}" method="POST">
                    @csrf
                    <div class="flex flex-wrap -mx- mb-4">
                        <div class="w-full md:w-1/6 px-3 mb-4 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-city">
                                Valor
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-city" type="text" placeholder="" name="valor_converter">
                        </div>
                        <div class="w-full md:w-1/6 px-3 mb-8 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-state">
                                Converter de
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state" name="moeda1">
                                    <option value="">Selecione</option>
                                    <option value="BRL">Real Brasileiro</option>
                                    <option value="USD">Dólar Americano</option>
                                    <option value="CAD">Dólar Canadense</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/6 px-3 mb-8 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-state">
                                Para
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state" name="moeda2">
                                    <option value="">Selecione</option>
                                    <option value="BRL">Real Brasileiro</option>
                                    <option value="USD">Dólar Americano</option>
                                    <option value="CAD">Dólar Canadense</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-end md:w-1/6 px-3 mb-8 md:mb-0">
                            <button class="converter bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                              Converter
                            </button>
                        </div>
                        <div class="w-full md:w-1/6 px-3 mb-8 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-zip">
                                Resultado
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-zip" name="valor_convertido" type="text" disabled placeholder="">
                        </div>
                        <div class="flex items-end md:w-1/6 px-3 mb-8 md:mb-0">
                            <button class="gravar bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                              Gravar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <table class="table-auto">
                    <thead>
                        <tr>
                            <th class="px-5 py-2">#</th>
                            <th class="w-1/5 px-4 py-2">Data</th>
                            <th class="w-1/5 px-4 py-2">Valor de conversão</th>
                            <th class="w-1/5 px-4 py-2">De</th>
                            <th class="w-1/5 px-4 py-2">Para</th>
                            <th class="w-1/5 px-4 py-2">Valor convertido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conversoes as $conversao)
                        @if ($loop->index % 2)
                        <tr>
                            @else
                        <tr class="bg-gray-100" >
                            @endif
                            <td class="border px-4 py-2">{{ $conversao->id }}</td>
                            <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($conversao->created_at )->format('d/m/Y H:m') }}</td>
                            <td class="border px-4 py-2">{{ number_format( $conversao->valor_converter, 2, ',', '')}}</td>
                            <td class="border px-4 py-2">{{ $conversao->moeda1 }}</td>
                            <td class="border px-4 py-2">{{ $conversao->moeda2 }}</td>
                            <td class="border px-4 py-2">{{ number_format( $conversao->valor_convertido, 2, ',', '')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $conversoes->links() }}
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".converter").click(function(e){
                e.preventDefault();
                var moeda1 = $("select[name='moeda1']").val();
                var moeda2 = $("select[name='moeda2']").val();
                var valor_converter = $("input[name='valor_converter']").val();
                if ((moeda1.length == 0 )|| (moeda2.length == 0 ) || (valor_converter.length == 0 )) {
                    alert("Por favor, preencha todos os campos para realizar a conversão.");
                }

                $.ajax({
                    url: "{{ route('converter') }}",
                    type:'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {moeda1:moeda1, moeda2:moeda2, valor_converter:valor_converter},
                    success: function(data) {
                        $("input[name='valor_convertido']").val(data);
                    }
                });
            });

        });
    </script>
</x-app-layout>

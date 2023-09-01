@seoTitle(__('Criar Currículo'))

<x-app-layout>
    <x-slot:header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Currículo') }}
        </h2>

    </x-slot:header>

    <x-splade-modal id="objetivos_modal" name="objetivos_modal">
        <x-modal.windows_modal title="Objetivos" id='1' />

    </x-splade-modal>

    <x-panel>
        <x-nav-resume id="{{$resume->id}}"></x-nav-resume>

       
            <x-splade-form :for="$form" />
            
            <div class="pt-6">
            <Link class="text-purple-600" href="#objetivos_modal">
                Exemplo de objetivos.
                </Link>
            </div>
    </x-panel>


    <script>
        function copyToClipboard(text, id) {
            var copyText = text;
            navigator.clipboard.writeText(copyText);
            document.getElementById("copia"+id).hidden = true;
            document.getElementById("copiado"+id).hidden = false;
            }
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
                    $('select[name="uf"]').on('change', function() {
                        var stateID = $(this).val();
                        console.log(stateID);
                        if(stateID) {
                            $.ajax({
                                url: '/api/cities/'+stateID,
                                type: "GET",
                                dataType: "json",
                                success:function(data) {   
                                      
                                    var city = "1";                
                                    $('select[name="cidade"]').empty();
                                    $.each(data, function(key, value) {
                                    $('select[name="cidade"]').append('<option value="'+ value['id'] +'">'+ value['name'] +'</option>');
                                    console.log(value);     
                                });
                                    
                                }
                                
                            });
                        }else{
                            $('select[name="cidade"]').empty();
                        }
                    });
                });
    </script>
</x-app-layout>
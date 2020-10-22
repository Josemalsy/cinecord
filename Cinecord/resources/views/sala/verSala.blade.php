@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">SALA</div>

                <div class="card-body">

                    <?php 

                    for($i=0;$i<$filas;$i++){
                        for($j=0;$j<$columnas;$j++){
                            
                            if($i>0 && $j==$pasillo){
                                
                                echo '0';
                              
                            }
                            else{
                              
                                echo '1';
                               
                            }
                            
                            if($j==4){

                                echo "<br>";
                            }
                           
                            
                        }
                        
                       
                    }
                    
                    
                    ?>
                
                    
               
                    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection